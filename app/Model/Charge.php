<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

/**
 * CakePHP Charge
 * @author Franklyn
 */
class Charge extends AppModel {
    
    public function fromStripeCharge(\Stripe\Charge $charge, $user_id = null){
        
       $app_charge = [];
        if($user_id == null){    $user_id = AuthComponent::user('id');        }
        
        $app_charge['id'] = $charge['id']; 
        $app_charge['user_id'] = $user_id;
        $app_charge['transaction_type'] = $charge['object'];
        $app_charge['amount'] = $charge['amount'];
        $app_charge['captured'] = $charge['captured'];
        
        $app_charge['currency'] = $charge['currency'];
        $app_charge['description'] = $charge['description'];
        $app_charge['url'] = $charge['url'];
        $app_charge['status'] = $charge['status'];
        $app_charge['mode'] = $charge['livemode'] ? "live" : "test";
        $app_charge['source_type'] = $charge['source']['object'];
        $app_charge['source_brand'] = $charge['source']['brand'];
        $app_charge['country'] = $charge['source']['country'];
        $app_charge['exp_month'] = $charge['source']['exp_month'];
        $app_charge['exp_year'] = $charge['source']['exp_year'];
        $app_charge['last4'] = $charge['source']['last4'];
        
        return $app_charge;
    }

}
