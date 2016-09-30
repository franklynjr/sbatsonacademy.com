<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP SubsriptionsController
 * @author Franklyn
 */
class SubscriptionsController extends AppController {

        public function beforeFilter() {
        parent::beforeFilter();
        
        //Get stripe settings
        Controller::loadModel('StripeConfig');
        Controller::loadModel('SubscriptionPlan');
        Controller::loadModel('Address');
        Controller::loadModel('Charge');
        Controller::loadModel('State');
        
        
        $stripeConfig = $this->StripeConfig->findByName("default");
        $states = $this->State->find('all');
        
        $this->set("stripe_config", $stripeConfig);
        $this->set('states', $states);
        //print_r($states);
    }
    
    
    public function admin_index($id) {
        
    }
    
    public function index($id=null) {
        
        $this->redirect('/subscriptions/purchase/1');
        
    }

    
    public function purchase($id=null) {
        
        
        if($id){
            
            $plan = $this->SubscriptionPlan->findByIdOrName($id, $id);
            $this->set('plan', $plan['SubscriptionPlan']);
            
            $this->Auth->login();
            $user = $this->Auth->user();
            if($plan)   
            {
                $this->set('valid_plan', true);
            
            
                if($this->request->is("post"))
                {
                    \Stripe\Stripe::setApiKey($this->StripeConfig->getSecretKey());
                    
                    $address = $this->request->data['Address'];
                    $token = $this->request->data['stripeToken'];


                    
                    
                    $address['user_id'] = $user['id'];
                    
                    if(!empty($user['Address'] && isset($address['Address']['id'])))
                    {
                        print_r($address);
                        $this->Address->save($address['Address']);
                    }else
                    {
                        
                        //print_r($address);
                        $user['Address'] = $address;
                        $this->Address->create();
                        $ref = $this->Address->save($user['Address']);
                        $user['address_id'] = $ref['Address']['id'];
                        if($this->User->save($user))
                        {
                            $this->Auth->login($user);
                            //$user = AuthComponent::user();
                            $this->set('user', $user);
                        }
                    }
                    
                    if($user)
                    {
                        try{
                            // if the customer does not exist in stripe create one
                            if(empty($user['Subscription']['stripe_cust_id']) | !\Stripe\Customer::retrieve($user['Subscription']['stripe_cust_id'])){

                                $customer = \Stripe\Customer::create(['description'=>($user['firstname'].' '.$user['lastname']),
                                                                  'source'=>$token,
                                                                  'email'=> $user['email']]);


                                $user['Subscription']['stripe_cust_id'] = $customer->id;   
                            }  else {
                                //update payment information if a new token was submitted
                                if($token)
                                {

                                        $customer = \Stripe\Customer::retrieve($user['Subscription']['stripe_cust_id']);
                                        $customer->source = $token;
                                        $customer->save();

                                }
                            }

                        } catch (Exception $ex) {
                            $this->Flash->set($ex->getMessage());
                            return;
                       }

                        try{

                        $charge = \Stripe\Charge::create(['amount'=> str_replace('.', '', $plan['SubscriptionPlan']['price']),
                                                'currency'=>'usd',
                                                'customer'=>$user['Subscription']['stripe_cust_id']]);
                        
                        //save charge response
                        $app_charge = $this->Charge->fromStripeCharge($charge);
                        
                        $this->Charge->create();
                        $this->Charge->save($app_charge);
                        
                        $user['Subscription']['start_date'] =  date_format(date_create(), 'Y-m-d');

                        // Add to subscription end date if the user is currently subscribed otherwise create a new subscription from todays date
                        if((new DateTime())->getTimestamp() > strtotime($user['Subscription']['end_date']))
                        {
                            $date = new DateTime();
                            $date = $date->add(new DateInterval($plan['SubscriptionPlan']['duration']));
                            $date = $date->setTime(23, 59, 59);                           
                            $user['Subscription']['end_date'] = date_format($date, 'Y-m-d H:i');
                        }
                        else {
                            $timestamp = strtotime($user['Subscription']['end_date']);
                            $date = new DateTime("@$timestamp");
                            $date = $date->add(new DateInterval($plan['SubscriptionPlan']['duration']));
                            $date = $date->setTime(23, 59, 59);
                            $user['Subscription']['end_date'] = date_format($date, 'Y-m-d H:i');
                        }


                         $user['Subscription']['subscription_plan_id'] = $plan['SubscriptionPlan']['id'];


                         if($this->Subscription->save($user['Subscription']))
                         {
                             //print_r($user);
                             //print 'thanks for subscribing <br />';
                             $this->Flash->success('Thanks for subscribing!');
                             //update the user object
                             $this->Auth->login($user);
                             //$user = AuthComponent::user();
                             $this->set('user', $user);
                             //print_r($user);
                             //$this->redirect('/courses');
                         }  else {
                             //print_r( $user['Subscription']);
                         }

                        }catch(\Stripe\Error\Card $e){
                            $this->Flash-set($e->getMessage());
                        }
                    }
                }  else {
                    $states = $this->State->find('all');
                    $options = array_column(array_column($states, 'State'), 'abbreviation');      
                    if(isset( $user['Address'])){
                        $this->request->data['Address'] = $user['Address'];
                        $this->request->data['Address']['state'] = array_search($user['Address']['state'], $options);
                    }
                                  
                   
                }
            }
        }
    }
    
    public function isAuthorized($user) {
        
        if(in_array($this->action, ['purchase']))
                return true;
        
        parent::isAuthorized($user);
    }
}
