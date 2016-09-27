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
        $stripeConfig = $this->StripeConfig->findByName("default");
        
        $this->set("stripe_config", $stripeConfig);
    }
    
    
    public function admin_index($id) {
        
    }
    
    public function index($id=null) {
        
        $this->redirect('/subscriptions/purchase');
        
        if($id){
            
            $plan = $this->SubscriptionPlan->findByIdOrName($id, $id);
            $this->set('plan', $plan['SubscriptionPlan']['name']);
            if($plan)   
            {
                 $this->set('valid_plan', true);
            
            
                if($this->request->is("post"))
                {
                    \Stripe\Stripe::setApiKey($this->StripeConfig->getSecretKey());

                    $token = $this->request->data['stripeToken'];

        //            $user['User']['firstname'] =  $this->request->data['User']['firstname'];
        //            $user['User']['firstname'] =  $this->request->data['User']['lastname'];

                    $user = $this->Auth->login();
                    if($user)
                    {
                        $customer = \Stripe\Customer::create(['description'=>($user['User']['firstname'].' '.$user['User']['lastname']),
                                                              'source'=>$token,
                                                              'email'=> $user['User']['email']]);

                        $user['Subscription']['stripe_cust_id'] = $customer->id;




                            try{
                            $charge = \Stripe\Charge::create(['amount'=> str_replace('.', '', $plan['SubscriptionPlan']['price']),
                                                    'currency'=>'usd',
                                                    'customer'=>$customer->id]);

                            $timestamp = strtotime($user['Subscription']['end_date']);
                            $date = new DateTime($timestamp);

                            $date = $date->add($plan['SubscriptionPlan']['duration']);

                             $user['Subscription']['end_date'] = $date;
                             $user['Subscription']['subscriptions_plan_id'] = $plan['SubscriptionPlan']['id'];
                             $user['Subscription']['stripe_cust_id'] = $customer->id;

                             if($this->Subscription->save($user['Subscription']))
                             {
                                 print 'thanks for subscribing <br />';
                                 //update the user object
                                 $this->Auth->login();
                                 $this->redirect('/courses');

                             }  else {
                                 print_r( $user['Subscription']);
                             }

                            }catch(\Stripe\Error\Card $e){
                                echo $e->getMessage();
                            }
                        }
                    }

            }
        }
    }

    
    public function purchase($id=null) {
        
        
        if($id){
            
            $plan = $this->SubscriptionPlan->findByIdOrName($id, $id);
            $this->set('plan', $plan['SubscriptionPlan']['name']);
            if($plan)   
            {
                 $this->set('valid_plan', true);
            
            
                if($this->request->is("post"))
                {
                    \Stripe\Stripe::setApiKey($this->StripeConfig->getSecretKey());

                    $token = $this->request->data['stripeToken'];

        //            $user['User']['firstname'] =  $this->request->data['User']['firstname'];
        //            $user['User']['firstname'] =  $this->request->data['User']['lastname'];

                    $this->Auth->login();
                    $user = $this->Auth->user();
                    
                    if($user)
                    {
                        if(empty($user['Subscription']['stripe_cust_id'])){
                        $customer = \Stripe\Customer::create(['description'=>($user['firstname'].' '.$user['lastname']),
                                                              'source'=>$token,
                                                              'email'=> $user['email']]);
                        
                        $user['Subscription']['stripe_cust_id'] = $customer->id;
                        }
                        //echo $customer->id;
                        



                            try{
                            $charge = \Stripe\Charge::create(['amount'=> str_replace('.', '', $plan['SubscriptionPlan']['price']),
                                                    'currency'=>'usd',
                                                    'customer'=>$user['Subscription']['stripe_cust_id']]);

                             //$user['subscription_id'] = $user['Subscription']['id'];
                             $user['Subscription']['start_date'] =  date_format(date_create(), 'Y-d-m');
                             
                             if(strtotime($user['Subscription']['end_date']) > (new DateTime())->getTimestamp())
                             {
                                 
                                $timestamp = strtotime($user['Subscription']['end_date']);
                                $date = new DateTime("@$timestamp");
                                $date = $date->add(new DateInterval($plan['SubscriptionPlan']['duration']));
                                $date = $date->setTime(23, 59, 59);
                                $user['Subscription']['end_date'] = date_format($date, 'Y-d-m H:i');
                                 
                             }  else {
                                 
                                $date = (new DateTime())->add(new DateInterval($plan['SubscriptionPlan']['duration']));
                                $date->setTime(23, 59, 59);
                                $user['Subscription']['end_date'] = date_format($date, 'Y-d-m H:i');
                             }
                             
                             $user['Subscription']['subscriptions_plan_id'] = $plan['SubscriptionPlan']['id'];
                             //$user['Subscription']['stripe_cust_id'] = $customer->id;
                             //print_r($user);
                             if($this->Subscription->save($user['Subscription']))
                             {
                                 //print_r($user);
                                 print 'thanks for subscribing <br />';
                                 //update the user object
                                 $this->Auth->login();
                                 //$this->redirect('/courses');
                                 print date_format($date, 'Y-d-m Y:m');
                                 
                                  print_r( $user['Subscription']);
                             }  else {
                                 print_r( $user['Subscription']);
                             }

                            }catch(\Stripe\Error\Card $e){
                                echo $e->getMessage();
                            }
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
