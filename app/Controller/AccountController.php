<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP AccountController
 * @author franklyn
 */
class AccountController extends AppController {

    public function index() {
        
        Controller::loadModel('User');
        Controller::loadModel('Subscription');
        $account_user = $this->User->findById($this->Auth->user()['User']['id']);
        $account_subscription = $this->Subscription->findByUserId($this->Auth->user()['User']['id']);
        unset($account_user['Login']['password']);
        $this->set('account_user', $account_user);
        $this->set('account_subscription', $account_subscription);
    }

}
