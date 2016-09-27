<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP TopicsController
 * @author Franklyn
 */
class TopicsController extends AppController {

    
    public function beforeFilter() {
        
        
        parent::beforeFilter();
        
        Controller::loadModel('User');
        $this->set('is_subscribed', 'false');
        global $user;
        
        //$user = AuthComponent::user();
         if($this->User->isSubscribed($user))
            {
                $this->set('is_subscribed', true);
            }else
            {
                $this->set('is_subscribed', false);
                
            }
            
    }
    
    public $components = array('Paginator');
    public $paginate = array(
        'limit'=>3
        //order => sort_id
    );
    
    public function index($id = null) {
        
        $this->view($id);
    }
    

     public function view($id = null) {

        if($id == null){
            $data = $this->Topic->find('all', array("order"=>"Topic.name"));
        }else
        {

            Controller::loadModel('Video');
            
            // Find the topic
            $data = $this->Topic->findByIdOrName($id, $id);
            $this->Paginator->settings = array(
                'Video' => array ('limit' => 5,
                    'conditions' => 'Topic.name = \''. $id . '\' or Topic.id = \'' . $id . '\'',),
            );
            
            $video = $this->Paginator->paginate('Video');
            
            
            if(!empty($data)){
                $this->set("topic", $data);
                $this->set("Video",$video);
            }
            else{
                throw new NotFoundException(_('Category not found.'));
            }
        }    

    }
    
    public function admin_index($id = null){
          if($id == null){
            $data = $this->Topic->find('all', array("order"=>"Topic.name"));
            $this->set('topics', $data);
        }else
        {

            Controller::loadModel('Course');
            Controller::loadModel('Video');
            
            // Find the topic
            $data = $this->Topic->findByIdOrName($id, $id);

            // Get the parent category
            $parent = $this->Course->findById($data["Topic"]["course_id"]);


            if(!empty($data) && !empty($parent) ){
                $this->set("topics", $data);
                $this->set("course",$parent);
            }
            else{
                throw new NotFoundException(_('Category not found.'));
            }
        }    
    }
    
    
    public function admin_view($id = null) {

        if($id == null){
            $data = $this->Topic->find('all', array("order"=>"Topic.name"));
            $this->set('topics', $data);
        }else
        {

            Controller::loadModel('Course');
            Controller::loadModel('Video');
            
            // Find the topic
            $data = $this->Topic->findByIdOrName($id, $id);

            // Get the parent category
            $parent = $this->Course->findById($data["Topic"]["course_id"]);


            if(!empty($data) && !empty($parent) ){
                $this->set("topics", $data);
                $this->set("course",$parent);
            }
            else{
                throw new NotFoundException(_('Topic not found.'));
            }
        }    

    }
    
    
    public function admin_add() {
        
        if($this->request->is("post"))
        {
            $data = $this->request->data;
             
            $image = MediaManager::uploadImg($data['Topic']);
            $banner = MediaManager::uploadImg($data['Topic'], 'banner_filename');
            
            if($image){
                $data['Topic']['image'] = $image;
            }
            
            if($banner){
                $data['Topic']['banner'] = $banner;
            }
            
            $this->Topic->create();
            if($this->Topic->save($data))
            {
                $message = __("Topic was saved");
                $this->set("message", $message);
               // $this->set("item", $item);
                $this->redirect('/admin/topics/view');
            }
        }
        
        $this->set('courses', $this->Topic->Course->find('list'));
    }

    
    public function admin_edit($id=null) {
        
        if(!$this->Topic->exists($id))
        {
            throw new NotFoundException(__('Invalid topic id'));
        }
        
        if($this->request->is("post") || $this->request->is("put"))
        {
            $data = $this->request->data;
            
            $image = MediaManager::uploadImg($data['Topic']);
            
            if($image){
                $data['Topic']['image'] = $image;
            }
            
            if($this->Topic->save($data))
            {
               // $this->set("item", $item);
               $this->redirect('/admin/topics/view');
            }
        }
        
        $this->set('courses', $this->Topic->Course->find('list'));
        $this->request->data = $this->Topic->findById($id);
    }
    
    
    public function admin_delete($id) {
        
        if($this->request->is("post"))
        {
            $item = $this->request->data;
            
            if($this->Topic->delete($id)){
                $this->Flash->set("Topic was deleted");
                header("refresh:3;url=/admin/topics/view");
            }
            
            //$this->redirect('/admin/courses/view');
        }
         $topic = $this->Topic->findById($id);
         
         if($topic)
            $this->set('topic',$topic);
         else
         {
             //$this->redirect()
         }
        
        
        
    }
}
