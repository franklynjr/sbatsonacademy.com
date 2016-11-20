<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

/**
 * CakePHP StripeConfig
 * @author Franklyn
 */
class StripeConfig extends AppModel {
    
    public function _default()
    {
        return $this->findByName("default");
    }
    
    public function getSecretKey()
    {
        $stripeConfig = $this->_default();
        return $stripeConfig['StripeConfig']['mode'] == 'test' ? 
                    $stripeConfig['StripeConfig']['test_secret_key'] : $stripeConfig['StripeConfig']['live_secret_key'];
    }
    
    public function getPublishableKey()
    {
        $stripeConfig = $this->_default();
        return $stripeConfig['StripeConfig']['mode'] == 'test' ? 
                    $stripeConfig['StripeConfig']['test_publishable_key'] : $stripeConfig['StripeConfig']['live_publishable_key'];
    }
}
