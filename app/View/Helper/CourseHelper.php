<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


App::uses('Helper', 'View');


Class CourseHelper extends Helper{
    public function countVideos($topics)
    {
        //Controller::loadModel('Vodeo');
        $count = 0;
        foreach($topics as $topic)
        {
            //print $subcategory['video_count'];
            $count += $topic['video_count'];
        }
        return $count;
    }
    
}