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
class CoursesController extends AppController {

    
    public function index() {
//        if($id == null){
            Controller::loadModel('Video');
            
            $data = $this->Course->find('all');
            //$topic = $this->Topic->find('all');
            
            for($i = 0; $i < count($data); $i++){
                for($x = 0; $x < count($data[$i]["Topic"]); $x++){

                    //print $data[$i]["Subcategory"][$x]['id'];
                    //add video count property
                    $data[$i]["Topic"][$x]['video_length'] = $this->getVideoLength($data[$i]["Topic"][$x]) ;
                    $data[$i]["Topic"][$x]['video_count'] =  $this->Video->find("count", array("conditions"=>"Video.topic_id = ".$data[$i]["Topic"][$x]['id']));
                }
            }
            
            $this->set("courses", $data);
        
        }
    
        
    public function admin_index($id=null) {
       
        if($id == null){
            $data = $this->Course->find('all', array("order"=>"name"));
        }else
        {
            
        }
        
        $this->set('courses', $data);
        
    }
    
    
    public function view($id = null) {

        if($id == null){
            $data = $this->Course->find('all', array("order"=>"name"));
        }else
        {

            Controller::loadModel('Topic');
            Controller::loadModel('Video');
            
            // Find the tipic
            $data = $this->Course->findByIdOrName($id, $id);

            // Find topics
            $data2 = $this->Topic->findAllByCourseId($data["Course"]["id"]);
            
            // Add Video count for each topic
            for($i = 0; $i < count($data2); $i++){
                    $data2[$i]["Topic"]['video_length'] = $this->getVideoLength($data2[$i]["Topic"]) ;
                    $data2[$i]["Topic"]['video_count'] =  $this->Video->find("count", array("conditions"=>"Video.topic_id = ".$data2[$i]["Topic"]['id']));
            }


            if(!empty($data)){
                $this->set("course", $data);
                $this->set("topics",$data2);
            }
            else{
                throw new NotFoundException(_('Category not found.'));
            }
        }    

    }
    
    
    public function admin_view($id = null) {

        if($id == null){
            $data = $this->Course->find('all', array("order"=>"name"));
        }else
        {
            
        }
        
        $this->set('courses', $data);
        
    }
    
    
    public function admin_add() {
        
        if($this->request->is("post"))
        {
            $data = $this->request->data;
            
            
//            $image = MediaManager::uploadImg($item['Course']);
//            
//            if($image){
//                $item['Course']['image'] = $image;
//            }
            
            
            //$this->Course->create();
            $image = MediaManager::uploadImg($data['Course']);
            $banner = MediaManager::uploadImg($data['Course'], 'banner_filename');
            
            if($image){
                $data['Course']['image'] = $image;
            }
            
            if($banner){
                $data['Course']['banner'] = $banner;
            }
            
            $this->Course->create();
            if($this->Course->save($data))
            {
                $message = __("Course was saved");
                $this->set("message", $message);
                $this->set("item", $data);
            }
            
        }
        
        
        //$this->set('parents', $this->Course->Topics->find('list'));
    }

    public function admin_delete($id) {
        
        if($this->request->is("post"))
        {
            $item = $this->request->data;
            
            if($this->Course->delete($id)){
                $this->Flash->set("Course was deleted");
                header("refresh:3;url=/admin/courses/view");
            }
            
            //$this->redirect('/admin/courses/view');
        }
         $course = $this->Course->findById($id);
         
         if($course)
            $this->set('course',$course);
         else
         {
             //$this->redirect()
         }
        
        
        
    }
        
    public function admin_edit($id){
        
        if($this->request->is("post") || $this->request->is("put"))
        {
            
            $item = $this->request->data;
            
            $image = MediaManager::uploadImg($item['Course']);
            
            if($image){
                $item['Course']['image'] = $image;
            }
            
            if($this->Course->save($item))
            {
                //$message = "category was saved";
                
            $this->Flash->success("Course was saved");
            
            header("location: /admin/courses/edit".$id, 5);
            
//                $this->set("message", $message);
//                $this->set("item", $item);
            }
        }
        
        $this->request->data = $this->Course->findById($id);  
        
    }
    
    public function getVideoLength($topic = null)
    {
        if(!$topic)
        {
            $topic = "";
        }  else {
//                print($topic['name'] .'<br>');
//                echo $topic['id'];
                $videos = $this->Video->findAllByTopicId($topic['id']);
//               print_r($videos);
                
                $h = $m  = $s = 0;
                //2h 3m 4s
                foreach($videos as $video)
                {
//                    print_r($video);
                    //echo $video["length"]. "<br>";
                    $times = explode(' ', $video['Video']['length']);
                    if(sizeof($times) == 2)
                    {
                        //print((int)$times[1]);
                        $m += (int)$times[0];
                        $s  +=  (int)$times[1];
                    }
                    else if(sizeof($times) > 2){
                     
                        $h += $times[0];
                        $m += $times[1];
                        $s  +=  $times[2];
                    }
               
                 }
                 
                 
                    $m += (int)$s / 60;
                    $h += (int)($m / 60);
                    $m = (int)($m >= 60 ? (int)($m % 60) : $m);                    
                    $s = (int)($s >= 60 ? (int)($s % 60) : $s);
                    
                    
        }
        return  $h < 1 ? "{$m}m {$s}s":"{$h}h {$m}m {$s}s";
    }
}
