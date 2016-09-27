<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('CakeEmail', 'Network/Email');
/**
 * 
 */
/**
 * CakePHP Signup
 * @author Franklyn
 */
class SignupController extends AppController {

    public function index($id = null) {
        Controller::loadModel('User');
        Controller::loadModel('Login');
        
        if($this->request->is('post')){
            
          
            if( Login::userExists($this->data['Login']['username']))
            {
                $this->Flash->error('The username you entered is already taken. Try entering a different username.');
                
            }  else {
                
            
            
            $this->User->create();
            $this->Login->create();
            $data = $this->request->data;
            
            $hasher = new BlowfishPasswordHasher;
            $data['Login']['password'] = $hasher->hash($data['Login']['password']);
            
            $user = $this->User->save($data) ;
            //print_r($user['User']['id']);
             $data['Login']['user_id'] = $user['User']['id'];
             
            if($user &&  $this->Login->save($data)){
                //send email
                $this->redirect('/login');
                $this->Auth->login($data['User']);
            }
        }
        }
        
    }

}
