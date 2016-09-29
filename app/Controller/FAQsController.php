<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP FAQsController
 * @author Franklyn
 */
class FAQsController extends AppController {

    public function index($id = null) {
        if($id == null)
        {
            $faqs = $this->FAQ->find('all');
            
            $this->set('faqs', $faqs);
            
        }else
        {
            // todo create a page for each FAQ
        }
            
    }
    
    public function admin_add() {
        if($this->request->is('post') || $this->request->is('put'))
        {
            $faq = $this->request->data;
            if( $this->request->is('put'))
            {
                 if($this->FAQ->update($faq))
                {
                    $this->Flash->success('You frequently asked question was successfully updated.');
                }else
                {

                    $this->Flash->error('An error occurred.');
                }
            }
            else if($this->FAQ->save($faq))
            {
                
                $this->Flash->success('You frequently asked question was successfully saved.');
            }else
            {
                
                $this->Flash->error('An error occurred.');
            }
        }
    }
    
    public function admin_edit($id = null) {
        if($this->request->is('put'))
        {
                $faq = $this->request->data;
                
                 if($this->FAQ->save($faq))
                {
                    $this->Flash->success('You frequently asked question was successfully updated.');
                }else
                {

                    $this->Flash->error('An error occurred.');
                }
            }else
            {
                $faq = $this->FAQ->findById($id);
                $this->request->data = $faq;
            }
    }
}
