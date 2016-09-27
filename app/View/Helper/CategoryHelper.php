<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


App::uses('Helper', 'View');

App::uses('AppController', 'Controller');

Class CategoryHelper extends Helper{
    public function countVideos($categories)
    {
        //Controller::loadModel('Vodeo');
        $count = 0;
        foreach($categories as $subcategory)
        {
            //print $subcategory['video_count'];
            $count += $subcategory['video_count'];
        }
        return $count;
    }
    
}