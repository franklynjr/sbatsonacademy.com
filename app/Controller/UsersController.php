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
class UsersController extends AppController {
    
    public $components = array('RequestHandler', 'Flash');
        
    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow(array('add', 'login', 'logout', 'update','reset', 'exists'));
    }
    
    public function index($id) {
        
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
                
                $token = $this->getToken();
                $this->response->expires('+1 day');
                $this->response->header("X-MediaManager-SBA", $token);
                $this->request->header("X-MediaManager-SBA", $token);
                $this->response->send();
                
                $this->Session->write('token', $token);
                
                return $this->redirect($this->Auth->redirectUrl());
            }
            else{
            $this->Flash->error(__('Invalid username or password'),$this->Auth->redirectUrl());
            }
        }
        
    }
    /***
     * Athenticate user
     */
    public function login()
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
        $reset_token = $this->ResetToken->find('all',['conditions' => ['ResetToken.token' => $token,
                                                                                                          'ResetToken.expires >' => date_format(new DateTime(), 'Y-m-d H: ')]
                                                                            ]);
        print_r($reset_token);
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
                            
                            if($user)
                            {
                                $hasher = new BlowfishPasswordHasher();
                                $user['Login']['password'] = $hasher->hash($data['password']);
                                if($this->User->Login->save($user) && $this->ResetToken->deleteAll(['ResetToken.user_id' => $user['User']['id']]))
                                {
                                    $this->Auth->logout();
                                    $this->redirect('/login');
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
                        if($this->User->reset($user))
                        {
                            
                        $this->Flash->success('Please check your email to reset your password');
                        }
                    }else
                    {
                        
                        $this->Flash->error('We didn\'t find a user associated with the email address you provided');
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
    
    
    public function profile(){
        
    }
    
   public function exists($username)
   {
       Controller::loadModel('Login');
       
       if($this->Login->findByUsername($username))
       {
//           $this->request->data['User']['exisits'] = true;
//           $this->response->body('exists:true');
           $this->set('exists', true);
           $this->set('_serialize', ['exists']);
//           return $this->response;
       }  else {
       
//           $this->request->data['User']['exisits'] = false;    
//           $this->response->type('application/json');
//           $this->response->body('exists:false');
           $this->set('exists', false);
           $this->set('_serialize', ['exists']);
//           return $this->response;
       }
       
   }
   
}
