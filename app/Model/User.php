<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');
App::uses('ResetToken', 'Model');
App::uses('SystemConfig', 'Model');
App::uses('CakeEmail', 'Network/Email');

/**
 * CakePHP User
 * @author Franklyn
 */
class User extends AppModel {
    
    public $belongsTo = array(
                              'UserGroup',
                              'Role',
                              'Address',
                              'Subscription'
                        );
    
    //for now we will allow the user to have only one address
//    public $hasOne = array('Subscription');
    
    
      public function isSubscribed($user){
    
         date_default_timezone_set('America/New_York');
        if(isset($user) && strtotime($user['Subscription']['end_date']) > (new DateTime())->getTimestamp())
        {
            return true;
            
        }
        
        return false;
    }
    
        
    
      public function isAdmin($user){
          
        return $user['Role']['name'] == 'admin';
    }
    
    
    public function reset($user){
        $token = $this->getToken();
        $Token = new ResetToken();
        
        $resetToken = [];
        
        //populate the token
        $resetToken['user_id'] = $user['User']['id'];
        $resetToken['token'] = $token;
        $resetToken['expires'] = date_format((new DateTime())->add(new DateInterval('PT10M')), 'Y-m-d H:i');
        
        $Token->create();
        $Token->save($resetToken);
        
        $emlConf = new SystemConfig();
        
        //
        $email = new CakeEmail();
        $email->to($user['User']['email']);
        $email->config($emlConf->get('mail'));
//        $email->message(CakeEmail::MESSAGE_HTML);
        $email->subject('Reset Password - Seon Batson Tutoring');
        $email->template('reset_password', 'default');
        
        $email->viewVars(['firstname'=> $user['User']['firstname'],
                          'token'=> $token
                         ]);
        
        $email->emailFormat('html');
        $email->send();
    }
    
    
    public function updatePassword($token, $pwd){
        
        $Token = new ResetToken();
        
        $resetToken = [];
        
        //populate the token
        $resetToken['user_id'] = $user['id'];
        $resetToken['token'] = $token;
        $resetToken['expires'] = (new DateTime())->add(new DateInterval('PT10M'));
        
        $_token = $Token->findByToken($token);
        $user = $_token['User'];
        
        $this->save($user);
    }
    
    
}

    
