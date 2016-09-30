<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MediaManager
 *
 * @author Franklyn
 */

require(dirname(__FILE__) .DS.'ManagerCore.php');
//require(realpath('..'.DS.'Lib'.DS.'Media'.DS.'Stream.php'));

class MediaManager {
    //put your code here
    public static function uploadVideo($args){
        
        if($args)
        {
            if(isset($args["data"]) && isset($args["video"]))
            {
                $video = $args["video"];
                $data = $args["data"];
                
                
                $temp = $data['Video']['filename']['tmp_name'];
                $ext = pathinfo($data['Video']['filename']['name'], PATHINFO_EXTENSION);
                $hashed_filename = md5($data['Video']['filename']['name'] . time());
                $filename =VIDEOS.$hashed_filename.".$ext";
                
                
                if(!file_exists(VIDEOS))
                {
                    ManagerCore::setup();
                }
                
                //rename file and save on fs
                if(move_uploaded_file($temp, $filename))
                {
                        
                    //print_r($data);
                    
                    //create video object
                    $video->create();
                    $video->set("hashed",  $hashed_filename);
                    $video->set("path",  $filename);

                    $video->set("extension", $ext);

                    //save in db
                    $saved_video = $video->save($data);
                    
                    if($saved_video)
                    {
                        return true;
                    }
                    else {
                        return false;
                    }
                    //print_r($saved_video);
                }
            }
        }
        
    }
    
        //put your code here
    public static function uploadImage($args){
        
        if($args)
        {
            if(!isset($args["filename"]))
            {
                $filename= 'filename';
            }
                
            if(isset($args["data"]) && isset($args["model"]))
            {
                $model = $args["model"];
                $data = $args["data"];
                
                if(!isset($filename)){
                    $filename = $args['filename'];
                }
                
                $var_name = get_class($model);
                //echo $var_name;
                
                $temp = $data[$var_name]['filename']['tmp_name'];
                $ext = pathinfo($data[$var_name]['filename']['name'], PATHINFO_EXTENSION);
                $hashed_filename = md5($data[$var_name]['filename']['name'] . time());
                $image_filename =IMAGES_URL.$hashed_filename.".$ext";
                
                
                if(!file_exists(VIDEOS))
                {
                    ManagerCore::setup();
                }
                
                //rename file and save on fs
                if(move_uploaded_file($temp, $image_filename))
                {
                        
                    //print_r($data);
                    
                    //create video object
                    $model->create();
                    
                    //
                    $data[$var_name]['image'] = '/'.$image_filename;
                    
                    //save in db
                    $model = $model->save($data);
//                    print_r($model);
                    return $image_filename;
                }
            }
        }
        
    }
    
            //put your code here
    public static function uploadImg($data, $filename=null){
        if($filename == null){
            $filename = 'filename';
        }
        if(!empty($data[$filename]))
        {
            $temp = $data[$filename]['tmp_name'];
            $ext = pathinfo($data[$filename]['name'], PATHINFO_EXTENSION);
            $hashed_filename = md5($data[$filename]['name'] . time());
            $image_filename =IMAGES_URL.$hashed_filename.".$ext";


            //rename file and save on fs
            if(move_uploaded_file($temp, $image_filename))
            {
                //print_r($model);
                return '/'.$image_filename;
            }
            else {
                return false;
            }
        }
        
        return false;
    }
    
    public static function fixPath($string)
    {
        if(substr_compare($string, "/",0) && DIRECTORY_SEPARATOR !== "/")
        {
            $string = str_replace('/', DIRECTORY_SEPARATOR, $string);
        }else if (substr_compare($string, "\\",0) && DIRECTORY_SEPARATOR !== "\\")
        {
            
            $string = str_replace('\\', DIRECTORY_SEPARATOR, $string);
        }
        
        return $string;
    }
    
     public function removeVideo($args){
        
        //create video object
        
        //rename file and save on fs
        
        
        //save in db
        
    }
    //creates a video thumbnail using ffmpeg
    public static function create_thumbnail($seconds=NULL, $video=null)
    {
        if($seconds == null){$seconds = 5;}
        
        if($video== null)
        {
            $video = 'E:\\OneDrive\\Apps\\MediaManager\\app\\Contents\\Videos\\19de849dfb0c71e98e6ff59c337c09b1.mp4';
        }
        
        $date = new DateTime();
        $name = md5(rand() . $date->getTimestamp());
        
        $filename = "";
        if(PHP_OS == 'WINNT'){
            
            $filename = realpath(FFMPEG_WINNT);
        }  else if(PHP_OS == 'Linux'){
            
            $filename = realpath(FFMPEG_LIN);
            
        }  else {
            
            $filename = realpath(FFMPEG_LIN);
        }
        
        $output_filename = realpath(MM_IMAGES).DS.$name.'.jpeg';
        
        //print 'converting '. $video.'<br />';
        
        $ffmpeg = $filename . " -i ".$video." -r 1 -t 1 -ss ".$seconds."  -s 640x480 -f image2 ".$output_filename;
        $output = [];
        print $ffmpeg;
        $result = exec($ffmpeg, $output);
        print $result;
        return $output_filename;
    }
    
}
