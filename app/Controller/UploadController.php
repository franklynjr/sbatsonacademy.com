<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP UploadController
 * @author franklyn
 */
class UploadController extends AppController {

    public function index($id) {
        
    }
    
    public function admin_image() {
        if($this->request->is("post"))
        {
            //
            $filename = $this->request->data['Image']["filename"]['tmp_name'];
            $name = $this->request->data['Image']["filename"]['name'];
            $destination = IMG_DIR.$name;
            
            if(move_uploaded_file($filename, $destination))
            {
                $fiendly_name = $this->request->data['Image']['name'];
                $image = ['Upload'=>['name'=>$fiendly_name,
                                    'type'=>'image',
                                    'filename'=>$name,
                                    'path' => $destination,
                                    'url' => '/img/'.$name]
                        ];
                $this->Upload->create();
                
                if($this->Upload->save($image)){
                    echo $this->Flash->success("Image was successfully uploaded");
                }
            }  else {
                echo $this->Flash->error("Upload failed");
            }
            
        }
    }
    
    public function admin_stylesheet() {
        if($this->request->is("post"))
        {
            
            $filename = $this->request->data['StyleSheet']["filename"]['tmp_name'];
            $name = $this->request->data['StyleSheet']["filename"]['name'];
            $destination = CSS_DIR.$name;
            
            if(move_uploaded_file($filename, $destination))
            {
                $fiendly_name = $this->request->data['StyleSheet']['name'];
                $image = ['Upload'=>['name'=>$fiendly_name,
                                    'type'=>'css',
                                    'filename'=>$name,
                                    'path' => $destination,
                                    'url' => '/css/'.$name]
                        ];
                $this->Upload->create();
                
                if($this->Upload->save($image)){
                    echo $this->Flash->success("Stylesheet was successfully uploaded");
                }
            }  else {
                echo $this->Flash->error("Upload failed");
            }
        }
    }

    
    public function script() {
        if($this->request->is("post"))
        {
            //
            $filename = $this->request->data["file"]['tmp_name'];
            $name = $this->request->data["file"]['name'];
            $destination = JS_DIR.$name;
            move_uploaded_file($filename, $destination);
        }
    }
    
}
