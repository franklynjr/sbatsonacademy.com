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
 * CakePHP UserController
 * @author Franklyn
 */
class LoginController extends AppController {
    
    public function beforeFilter()
    {
        parent::beforeFilter();
        
        $this->Auth->allow(array('add', 'login','admin_login', 'logout', 'update','reset'));
    }
    
    
    
    
    
    public function admin_edit($id=null) {
        if($id == null){
            throw new NotFoundException(__('User not found or ID was not set'));
        }else
        {
            if($this->request->is('post') || $this->request->is('put'))
            {
                if($this->User->save($this->request->data)){
                    $this->Flash->success(__('User information was successfully updated'));
                }
            }
            
            // Find the topic
            $data = $this->User->findById($id);
            $roles = $this->User->Role->find('list');
            
            $this->set('roles', $roles);
            unset($data['User']['Password']);
            
            $this->request->data = $data;
        }   
    }
    
    
    public function admin_delete($id = null)
    {
        $user = $this->User->findById($id);
        
        if(!isset($id) || $user == null)
        {
            throw new NotFoundException(__('User not found or Id not set'));
        }
        
        if($this->request->is('post'))
        {
            if($this->User->delete($id))
            {
                $this->redirect('/admin/users/view');
            }
        }
        unset($user['User']['Password']);
        
        $this->set('user_account', $user);
    }
    
    
    public function admin_index($id=null) {
        if($id == null){
            $data = $this->User->find('all', array("order"=>"firstname"));
            $this->set('users', $data);
        }else
        {
            
            // Find the topic
            $data = $this->User->findByIdOrName($id, $id);


            if(!empty($data) ){
                $this->set("users", $data);
            }
            else{
                throw new NotFoundException(_('User not found.'));
            }
        }   
    }
    
    public function admin_view($id = null) {
        if($id == null){
            $data = $this->User->find('all', array("order"=>"firstname"));
            $this->set('users', $data);
        }else
        {
            
            // Find the topic
            $data = $this->User->findByIdOrName($id, $id);


            if(!empty($data) ){
                $this->set("users", $data);
            }
            else{
                throw new NotFoundException(_('User not found.'));
            }
        }   
 

    }
    
    public function add()
    {
        if($this->request->is('post')){
            $this->User->create();
            $data = $this->request->data;
            
            $hasher = new BlowfishPasswordHasher;
            $data['User']['password'] = $hasher->hash($data['User']['password']);
            
            $this->User->save($data);
        }
    }
       
    public function admin_add()
    {
        if($this->request->is('post')){
            $this->User->create();
            $data = $this->request->data;
            
            $hasher = new BlowfishPasswordHasher;
            $data['User']['password'] = $hasher->hash($data['User']['password']);
            
            $this->User->save($data);
        }
    }
    
    public function admin_login()
    {
        if($this->request->is('post'))
        {
            //
            if($this->Auth->login()){
                return $this->redirect($this->Auth->redirectUrl());
            }
            
            $this->Flash(__('Invalid username or password'));
        }
        
    }
    /***
     * Athenticate user
     */
    public function index()
    {
        if($this->request->is('post'))
        {
            if($this->Auth->login())
            {
                $token = $this->getToken();
                $this->response->expires('+1 day');
                $this->response->header("X-MediaManager-SBA", $token);
                $this->request->header("X-MediaManager-SBA", $token);
                $this->response->send();
                
                $this->Session->write('token', $token);
                
                
                return $this->redirect($this->request->data['App']['redirect']);
                
            }
            $this->Flash->error(__('Invalid username or password'),$this->Auth->redirectUrl());
        }
        
         $redirect = $this->Auth->redirectUrl();
         
         if($redirect === "/"){
            $redirect = '/courses';
         }
        
        $this->request->data['App']['redirect'] = $redirect;
//        echo $this->Auth->redirectUrl();
        
    }
    
        
    public function logout()
    {
        $this->Auth->logout();
        $this->Session->destroy();
        
        $this->redirect('/login');
        //return $this->redirect($this->Auth->logout());
    }
    
    public function update($id, $token=null){
//      Controller::render();
        
        Controller::loadModel('ResetToken');
        $reset_token = $this->ResetToken->find('all', ['condition'=>["ResetToken.token = $token and ResetToken.expires > ". date_format(new DateTime(), 'Y-m-d H: ')]]);
        
        switch ($id){
            case 'password':
                //$this->set('action', 'password');
                
                if($this->request->is('post')){
                    
                    if(!empty($reset_token))
                    {
                        $data = $this->request->data;
                        
                        if($data['password'] == $data['confirm_password'])
                        {
//                            print_r($reset_token[0]['ResetToken']['id']);
                            $user = $this->User->findById($reset_token[0]['ResetToken']['user_id']);
                            print_r($user);
                            
                            if($user)
                            {
                                $hasher = new BlowfishPasswordHasher;
                                $user['User']['password'] = $hasher->hash($data['password']);
                                if($this->User->save($user) &&
                                $this->ResetToken->delete($reset_token[0]['ResetToken']['id']))
                                {
                                    $this->Auth->logout();
                                    $this->redirect('/users/login');
                                }
                            }
                        }
                        $this->view = 'password_change';
                    }else
                    {
                        $this->redirect('/users/reset/password?message=password expired');
                    }
                }
                else
                {
                    if(!empty($reset_token))
                    {
                        $this->set('token', $token);
                        //$this->set('token', $token);
                        
                        $this->view = 'password_change';
                    }else
                    {
                        //print_r($this->request->params);
                        
                        $this->redirect('/users/reset/password?message=email has expired');
                        
//                        $this->redirect('/users/reset/password?message=passwordexpired');
                    }
                }
                break;
            case 'address':
                $this->set('action', 'address');
                break;
            case 'account';
                $this->set('action', 'account');
                break;
        }
        
        
    }
    
    public function reset($id, $token=null){
        
        if($token)
        {
            
        }
        
        switch ($id){
            case 'password':
                $this->set('action', 'password');
                
                if($this->request->is('post')){
                    
                    $this->view = 'password_request';
                    $user = $this->User->findByEmail($this->request->data['email']);
                    
                    if($user)
                    {
                        $this->User->reset($user);
                    }
                }
                else
                {
                    $this->view = 'password_request';
                    
                    if(isset($this->request->query['message']))
                    {

                        $this->Flash->error($this->request->query('message'));
                    }
                    Controller::render();
                }
                break;
            case 'username':
                $this->set('action', 'address');
                break;
        }
    }
    
    public function password()
    {
        
    }
    
    public function address(){
        
    }
    
    public function account(){
        
    }

}
