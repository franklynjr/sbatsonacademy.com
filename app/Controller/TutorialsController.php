<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP TutorialsController
 * @author Franklyn
 */
class TutorialsController extends AppController {

    public function index() {
        $testimonials = $this->Testimonials->find('all');
        
        
        $this->set('$testimonials', $testimonials);
    }
    
        public function view($id) {
        $testimonial = $this->Testimonials->findById($id);
        
        
        $this->set('$testimonial', $testimonial);
    }
    
    public function add() {
        
    }   
    
    public function admin_add() {
        if($this->request->is('post'))
        {
            $this->Testimonial->create();
            if($this->Testimonial->save($this->request->data))
            {
                $this->Flash->success("Testimonial was successfully added");
                $this->redirect('/admin/testimonials');
            }
        }
    }
    
    public function admin_delete($id) {
        
    }

}
