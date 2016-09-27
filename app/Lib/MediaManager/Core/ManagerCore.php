<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ManagerCore
 *
 * @author Franklyn
 */
require(dirname(__FILE__) .DS.'ManagerBase.php');

class ManagerCore {
    //put your code here
       public static function setup()
        {
            if(!file_exists(CONTENTS))
                mkdir(CONTENTS);
            
            if(!file_exists(VIDEOS))
                mkdir(VIDEOS);
            
            if(!file_exists(MM_IMAGES))
                mkdir(MM_IMAGES);
            
            if(!file_exists(MM_AUDIOS))
                mkdir(MM_AUDIOS);


        }
}
