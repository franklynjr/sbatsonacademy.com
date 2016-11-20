<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP SubscriptionPlansController
 * @author Franklyn
 */
class SubscriptionPlansController extends AppController {
    
    public function admin_index($id = null) {
        
    }
    
    public function admin_add($id = null) {
        
//        $duration = ['P1D'=>'1 day', 'P7D'=>'7 days', 'P14D'=>'14 days', 
//                     'P1M'=>'1 month', 'P3M'=>'3 months', 'P6M'=>'6 months', 
//                     'P1Y'=>'1 year', 'P2Y'=>'2 years', 'P3Y'=>'3 years', 
//                     'P4Y'=>'4 years', 'P5Y'=>'5 years', 'P10Y'=>'10 years'];
        
        
        if($this->request->is('post'))
        {
            $data = $this->request->data;
            //
            //print_r($data['SubscriptionPlan']   );
            
            if($this->SubscriptionPlan->save($data)){
                $this->Flash->success(__('Subscription plan was successfully created.'));
            }
        }
        
    }
     
    public function admin_view($id = null) {

        if($id == null){
            $data = $this->SubscriptionPlan->find('all', array("order"=>"name"));
        }else
        {
            
        }
        
        $this->set('subscription_plans', $data);
        
    }
    
    
   
    public function admin_delete($id) {
        
        if($this->request->is("post"))
        {
            $item = $this->request->data;
            
            if($this->SubscriptionPlan->delete($id)){
                $this->Flash->set("Subscription Plan was deleted");
                header("refresh:3;url=/admin/subscriptionplans/view");
            }
            
            //$this->redirect('/admin/courses/view');
        }
         $subscription_plan = $this->SubscriptionPlan->findById($id);
         
         if($subscription_plan)
            $this->set('subscription_plan',$subscription_plan);
         else
         {
             //$this->redirect()
         }
        
        
        
    }
    
    
      
    public function admin_edit($id=null) {
        
        if(!$this->SubscriptionPlan->exists($id))
        {
            throw new NotFoundException(__('Invalid topic id'));
        }
        
        if($this->request->is("post") || $this->request->is("put"))
        {
            $data = $this->request->data;
            
            if($this->SubscriptionPlan->save($data))
            {
               // $this->set("item", $item);
               $this->redirect('/admin/subscriptionplans/view');
            }
        }
        
        $this->request->data = $this->SubscriptionPlan->findById($id);
    }
    
    

}
