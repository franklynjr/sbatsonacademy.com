<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP ApiController
 * @author Franklyn
 */
class ApiController extends AppController {

    
    public $components = array('RequestHandler');
    
 
    public function Categories() {
        Controller::loadModel('Categories');
        $categories = $this->Categories->find("all");
        
                
        $this->set(array(
            'categories' => $categories,
            '_serialize' => array('categories')
        ));
    }

}
