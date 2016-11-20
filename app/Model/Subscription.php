<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

/**
 * CakePHP Subscription
 * @author Franklyn
 */
class Subscription extends AppModel {
    
    public $hasOne = array(
                              'User',
                              );
    public $belongsTo = 'SubscriptionPlan';
}
