<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

/**
 * CakePHP Login
 * @author Franklyn
 */
class Login extends AppModel {
    public $belongsTo = 'User';
    
    public static function userExists($username)
    {
        
        return (new Login())->findByUsername($username);
    }
}


