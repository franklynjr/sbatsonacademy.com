<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');
/**
 * CakePHP AdminController
 * @author Franklyn
 */
class AdminController extends AppController {


    public function index() {
        
    }

    public function upload() {
        
        Controller::loadModel("Video");
        
        if($this->request->is('post'))
        {
            MediaManager::uploadVideo(array(
                'data'=>  $this->request->data,
                'video'=> $this->Video
            ));
            
            
        }
        
        $this->set('categories', $this->Video->Category->find('list'));
        $this->set('parent', $this->Video->Category->find('list'));
        
    }
    
}
