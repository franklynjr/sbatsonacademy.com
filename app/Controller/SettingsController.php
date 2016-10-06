<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP SettingsController
 * @author Franklyn
 */
class SettingsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        
        //Get stripe settings
        Controller::loadModel('StripeConfig');
        $stripeConfig = $this->StripeConfig->findByName("default");
        
        $this->request->data = $stripeConfig;
        
//        $this->set("stripe_config", $stripeConfig);
    }
    
    
    public function index($id) {
        
    }
    
    
    public function admin_payments() {
        
        Controller::loadModel('StripeConfig');
        
        
            
        if($this->request->is("post") || $this->request->is("put"))
        {
            if($this->request->is("put") || $this->StripeConfig->_default()){
                if($this->StripeConfig->save($this->request->data)){
                    
                    $stripeConfig = $this->StripeConfig->findByName("default");
                    $this->set("stripe_config", $stripeConfig);
                }  else {
                    echo 'error updating';
                }
                
            }  else {
                 $this->StripeConfig->create();
                 $conf = $this->request->data;
                 
                if($this->StripeConfig->save($conf)){
                    $this->Flash->set(__("Settings Saved"));
                    $stripeConfig = $this->StripeConfig->findByName("default");
                    $this->set("stripe_config", $stripeConfig);
                    
                }else{
                    echo 'error saving';
                    $this->Flash->error(__('Unable to save'));
                }
            }
        }
    }

}
