<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP CategoryController
 * @author Franklyn
 */
class CategoriesController extends AppController {

    public function index() {
//        if($id == null){
            Controller::loadModel('Video');
            
            $data = $this->Category->find('all', array("order"=>"name",
                                                 'conditions'=>array("Category.parent_id = 0")));
            
            for($i = 0; $i < count($data); $i++){
                for($x = 0; $x < count($data[$i]["Subcategory"]); $x++){

                    //print $data[$i]["Subcategory"][$x]['id'];
                    //add video count property
                    $data[$i]["Subcategory"][$x]['video_count'] = $subcategory= $this->Video->find("count", array("conditions"=>"Video.category_id = ".$data[$i]["Subcategory"][$x]['id']));
                }
            }
//        }else
//        {
//            
//            $data = $this->Category->findByIdOrName($id, $id);
//            
//            if($data)
//                $this->set("category", $data);
//            else{
//                throw new NotFoundException(_('Category not found.'));
//            }
//        }    
        
        $this->set("categories", $data);
        
    }
    
        public function admin_index() {
//        if($id == null){
            $data = $this->Category->find('all', array("order"=>"name",
                                                 'conditions'=>array("Category.parent_id = 0")));
    
        
        $this->set("categories", $data);
        
    }
    
        public function view($id = null) {
        if($id == null){
            $data = $this->Category->find('all', array("order"=>"name"));
        }else
        {
            
            $data = $this->Category->findByIdOrName($id, $id);
           
            // Find subcategories
            $data2 = $this->Category->findAllByParentId($data["Category"]["id"]);
            // Get the parent category
            
            $parent = $this->Category->findById($data["Category"]["parent_id"]);
                
            Controller::loadModel('Video');
            for($i = 0; $i < count($data2); $i++){
                    //add video count property
                   
                    $data2[$i]["Category"]['video_count'] =  $this->Video->find("count", array("conditions"=>"Video.category_id = ".$data2[$i]["Category"]['id']));
                    //print $data2[$i]["Category"]['video_count'];
                }
                
            
            if(!empty($data)){
                $this->set("subcategories", $data2);
                $this->set("parent",$parent);
                $this->set("category", $data);
            }
            else{
                throw new NotFoundException(_('Category not found.'));
            }
        }    
        
        $categories = $this->Category->find('all', array("order"=>"name",
                                                 'conditions'=>array("Category.parent_id = 0")));
        
        $this->set("categories", $categories);
        //$this->set("category_videos", $this->Category->findAllByIdOrName($id, $id));
        
    }
    
    public function admin_add() {
        
        if($this->request->is("post"))
        {
            $item = $this->request->data;
            
            $this->Category->create();
            if($this->Category->save($item))
            {
                $message = "category was saved";
                $this->set("message", $message);
                $this->set("item", $item);
            }
        }
        
        
        $this->set('parents', $this->Category->Subcategory->find('list'));
    }

        
    public function admin_edit($id) {
        
        if($this->request->is("post"))
        {
            $item = $this->request->data;
            
            $this->Category->delete($id);
            
            $this->Flash->set("Category was deleted");
        }
        
        
        $this->set('parents', $this->Category->Subcategory->find('list'));
    }
        
    public function admin_delete() {
        
        if($this->request->is("post"))
        {
            $item = $this->request->data;
            
            $this->Category->create();
            if($this->Category->save($item))
            {
                $message = "category was saved";
                $this->set("message", $message);
                $this->set("item", $item);
            }
        }
        
        
        $this->set('parents', $this->Category->Subcategory->find('list'));
    }
}
