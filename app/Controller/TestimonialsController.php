<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP TestimonialsController
 * @author Franklyn
 */


class TestimonialsController extends AppController {
    
    public function beforeFilter()
    {
        parent::beforeFilter();

        Controller::loadModel('Course');
    }
    
    public function index() {
        $testimonials = $this->Testimonial->find('all');
        
        
        //
        $this->set('testimonials', $testimonials);
        
    }
    
    public function view($id=null) {

        if($id == null)
        {
            $this->redirect('/testimonials/');
        }else
        {
            $testimonial = $this->Testimonial->findById($id);

            $this->set('testimonial', $testimonial);
        }
    }
    
    public function admin_view() {
        $this->set('testimonials', $this->Testimonial->find('all'));
    }
    
    public function admin_add() {
        // 
        if($this->request->is('post'))
        {
            $this->Testimonial->create();
            if($this->Testimonial->save($this->request->data))
            {
                $this->Flash->success("Testimonial was successfully saved");
                $this->redirect('/admin/testimonials/view');
            }
        }
        // 
        $this->set('courses', $this->Course->find('list'));
    }
    
    public function admin_edit($id = null) {
        
        if($this->request->is('post') || $this->request->is('put'))
        {
            if($this->Testimonial->save($this->request->data))
            {
                $this->Flash->success("Testimonial was successfully updated");
                $this->redirect('/admin/testimonials/view');
            }
        }
        
        $this->set('courses', $this->Course->find('list'));
        
        $testimonial = $this->Testimonial->findById($id);
        
        $this->request->data = $testimonial;        
        $this->set('courses', $this->Course->find('list'));
    }
    
    public function admin_delete($id) {
        if($this->request->is('post')){
            if($this->Testimonial->delete($id))
            {
                
                $this->Flash->success("Testimonial was successfully deleted");
                $this->redirect('/admin/testimonials/view');
            }
        }
        
        $this->set('testimonial', $this->Testimonial->findById($id));
    }
    
}
