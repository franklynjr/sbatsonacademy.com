<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP VideosController
 * @author Franklyn
 */
class VideosController extends AppController {
    
    public function beforeFilter()
    {
        
        Cache::clear();
        
//        clear cache
        parent::beforeFilter();
        
        if (!$this->Auth->login()) {
            $this->set('var', '/'.$this->request->url);
            $this->Auth->redirectUrl('/'.$this->request->url);
            $this->redirect("/users/login");
        }

    }
//    
    public $components = array(
        'Flash',
        'Session',
        'Auth' => array(
            'authenticate' => array(
                'Form'=>array(
                    'passwordHasher' => 'Blowfish'
                ),
                
                'Basic'=>array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
            
        )
    );
        

    public function watch($id = null, $sid = null) {
   
        Controller::loadModel("User");
        
        if($id)
        {
            Controller::loadModel("Course");
            $video = $this->Video->findById($id);
            $file = MediaManager::fixPath($video['Video']['path']);


            //echo $_SERVER['HTTP_HOST'];

            //print $_REQUEST['sid'];
            //$this->set('videos', $videos);
            $this->set('file', APP.$file);
            $this->set('raw_path', "/videos/stream/".$video['Video']['hashed']);
            
            $this->set('path', "http://".$_SERVER['HTTP_HOST']. "/videos/stream/".$video['Video']['hashed'].'?sid='. $this->Session->read('token'));

            
            $this->set('courses', $this->Course->find('all'));
            $this->set('video', $video['Video']);
            
            $this->set('topic',$video['Topic']);
            
            $topic =  $this->Video->Topic->findById($video['Topic']['id']);
            
            
            $this->set('videos', $this->getPaths($topic['Video']));
            $this->set('topic2',$topic);
        }
        
    }
    
    
    public function getPaths($videos){
        $i = 0;
        $array = [];
        foreach($videos as $video)
        {
            //print_r($video);
            $path = "http://".$_SERVER['HTTP_HOST']. "/videos/stream/".$video['hashed'].'?sid='. $this->Session->read('token');
            $id = $video['id'];
            $name = $video['title'];
            $description = $video['description'];
            $duration = $video['length'];
            array_push($array, ['path'=>$path, 'name'=>$name, 'description'=>$description, 'duration'=>$duration, 'data-value'=>$i, 'id'=>$id]);
            
            $i++;
        }
        
        return $array;
    }
    
    public function stream($id, $sid=null)
    {
        //Controller::loadModel("Video");
        Controller::loadModel("User");
        
        
        $video = $this->Video->findByHashed($id);
        $file = MediaManager::fixPath($video['Video']['path']);
        $filename = realpath($file);
        
        //$stream = new VideoStream($filename);
        //$this->readfile_chunked($filename);
        if(isset($sid))
        {
            try{
                $sid = $this->request->query['sid'];
                 //echo $_SERVER['HTTP_HOST'];
                //print $this->request->query['sid']. '<br />';
               // print $this->Session->read('token');
            } catch (Exception $ex) {

            }
        }
//        if($sid === $this->Session->read('token'))
//        {
            //print $sid;
            $this->response->file($filename);
            //$this->Session->write('token', $this->getToken());
            
//            $stream->start();
            //$this->response->send();
//        }else
//        {
//            $this->response->statusCode(404);
//            $this->redirect($this->redirect(404));
//        }
            
        return $this->response;
        
        //$this->redirect('/users/login');
    }
    
    
     public function admin_edit($id = null){
     
        
        if($this->request->is('post') || $this->request->is('put')){
            if($this->Video->save($this->request->data))
            {
                $this->Flash->success(__('video was saved'));
            }  else {
                
                $this->Flash->error(__('unable to save video'));
            }
            if($id){
            $video = $this->Video->findById($id);
            $this->set('path', "/Videos/stream/".$video['Video']['hashed']);   
            }
        }  else {
        
            if($id){
            $video = $this->Video->findById($id);
            $this->set('video', $video);
            $topics =$this->Video->Topic->find('list');
            $this->set('topics', $topics);
            $this->request->data = $video;
            $this->set('path', "/Videos/stream/".$video['Video']['hashed']);    
            }  else {
                throw new NotFoundException(__('Id was not set'));
            }
        }
     }
     
    public function admin_delete($id = null){
     
        
        if($this->request->is('post') || $this->request->is('put')){
            if($this->Video->delete($id))
            {
                $this->redirect(['controller'=>'videos', 'action'=>'index']);
            }
            
        }
        $video = $this->Video->findById($id);
        
        $this->set('video', $video);
    }
        
     public function thumbnails($id){
     
        Controller::loadModel("Video");
        
        
        $video = $this->Video->findById($id);
        $filename =  $video['Video']['thumbnail'];
        
        //$file = MediaManager::fixPath($file);
        //$filename = realpath($file);
        
        $this->response->file($filename);
        
        return $this->response;
     }
     
    public function thumbnail($id){
        
        Controller::loadModel("Category");
        if(isset($id))
        {
            $this->set('id',$id);
        }
        $video = $this->Video->findById($id);
        
        if($this->request->is('post'))
        {
            $thumbnail = $this->request->data["image"];
            
            
            $video['Video']['thumbnail'] = $thumbnail;
            $this->Video->save($video);
        
        }
        
        
        $this->set('path', "/Videos/stream/".$video['Video']['hashed']);
            //print_r($this->request->data);
    }
     
    public function admin_thumbnail($id){
        
        Controller::loadModel("Category");
        if(isset($id))
        {
            $this->set('id',$id);
        }
        $video = $this->Video->findById($id);
        
        if($this->request->is('post'))
        {
            $thumbnail = $this->request->data["image"];
            
            
            $video['Video']['thumbnail'] = $thumbnail;
            $this->Video->save($video);
        
        }
        
        
        $this->set('path', "/Videos/stream/".$video['Video']['hashed']);
            //print_r($this->request->data);
    }
    
    
    
    public function admin_upload() {
        
        Controller::loadModel("Video");
        
        if($this->request->is('post'))
        {
            //print_r($this->request->data);
            $result = MediaManager::uploadVideo(array(
                'data'=>  $this->request->data,
                'video'=> $this->Video
            ));
            
            $result ? $this->Flash->success(__('video upload was successful')):$this->Flash->error(__('upload failed'));;
        }
        
        $this->set('topics', $this->Video->Topic->find('list'));
        
    }
    
    
    
      function readfile_chunked($filename, $retbytes = TRUE) {
            $buffer = '';
            $cnt =0;
            // $handle = fopen($filename, 'rb');
            $handle = fopen($filename, 'rb');
            if ($handle === false) {
              return false;
            }
            while (!feof($handle)) {
              $buffer = fread($handle, CHUNK_SIZE);
              echo $buffer;
              ob_flush();
              flush();
              if ($retbytes) {
                $cnt += strlen($buffer);
              }
            }
            $status = fclose($handle);
            if ($retbytes && $status) {
              return $cnt; // return num. bytes delivered like readfile() does.
            }
            return $status;
  }
  
  
  
  public function admin_index($id = null)
  {
    Controller::loadModel('Topic');
    $topics = $this->Topic->find('all');

    $this->set('topics', $topics);
  }
  
    public function isAuthorized($usr) {
        
        //return true;
        // allow users with a subscrption 
        global $user;
        
        if(isset($usr) && $usr['user_id']=$user['User']['id']){
        Controller::loadModel('User');
        if(in_array($this->action, array('watch','stream','progress')))
        {
            if($user['Role']['name'] == 'admin'){
                return true;
            }
            
            if($this->User->isSubscribed($user))
            {
                $this->set('is_subscribed', true);
                return true;
            }else
            {
                $this->set('is_subscribed', false);
                
                //$this->redirect('/subscriptions/');
                return false;
            }
        }
        }
        return parent::isAuthorized($usr);
    }
    

  function progress($user_id, $video_id, $progress)
  {
      Controller::loadModel('UserVideoProgress');
      echo 'user: '.$user_id .' prog: '. $progress;
      $current = $this->UserVideoProgress->find('first',['conditions'=>['UserVideoProgress.user_id'=>$user_id, 'UserVideoProgress.video_id'=>$video_id]]);
      
      print_r($current);
      if($current)
      {
          if($progress > $current['UserVideoProgress']['longest'])
          {
              $current['UserVideoProgress']['longest'] = ceil($progress);
          }
          
        $current['UserVideoProgress']['progress'] =  ceil($progress);
          //update
          $this->UserVideoProgress->save($current);
      }  else {
          $current = ['UserVideoProgress'=>['user_id'=>$user_id,
                                              'video_id'=>$video_id,
                                              'progress'=>ceil($progress),
                                              'longest'=>ceil($progress)]];
          //create
          $this->UserVideoProgress->create();
          $this->UserVideoProgress->save($current);
          
          return $this->response->statusCode(200);
      }
  }
  
}
