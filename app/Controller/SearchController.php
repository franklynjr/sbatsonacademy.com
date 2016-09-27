<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP SearchController
 * @author Franklyn
 */
class SearchController extends AppController {

    public function index() {
        
        Controller::loadModel('Course');
        Controller::loadModel('Video');
        Controller::loadModel('Topic');
        
        //print_r($params);
//        $conditions = [ 'name LIKE '=>"%{$params['terms']}%", 
//                                 "OR" => 
//                                ['description LIKE '=>"%{$params['terms']}%"]
//                                ];
        
        if($this->request->is('post'))
        {
            $terms = '';
            
            if( isset($this->request->data['Search']) && isset($this->request->data['Search']['q'])){
                $terms = $this->request->data['Search']['q'];
            }  else {
              $terms = $this->request->data['q'] ? $this->request->data['q'] : "";
            }
            
            $this->doSearch($terms);
            $this->set('terms', $terms);
        }else{
            $params = $this->request->query;
            if(sizeof($params) > 0 && (isset($params['q'])))
            {
                $this->doSearch($params['q']);
                $this->set('terms', $params['q']);
            }
        }
        
    }
    
   public function doSearch($terms)
   {
       
        $c_conditions = array("OR" => ["Course.name LIKE " => "%$terms%",
                                            "Course.description LIKE" => "%$terms%"]);
        
        $t_conditions = array("OR" => ["Topic.name LIKE " => "%$terms%",
                                            "Topic.description LIKE" => "%$terms%"]);
        
        $v_conditions = array("OR" => ["title LIKE " => "%$terms%",
                                            "Video.description LIKE" => "%$terms%"]);
        
       if(!($terms == "" || $terms == null))
        {
            $courses_results = $this->Course->find('all', ['conditions'=>$c_conditions]);
            $topics_results = $this->Topic->find('all', ['conditions'=>$t_conditions]);
            $videos_results = $this->Video->find('all', ['conditions'=>$v_conditions]);
            
            $this->set('courses', $courses_results);
            $this->set('topics', $topics_results);
            $this->set('videos', $videos_results);
        }
        
   }

}
