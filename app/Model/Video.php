<?php
require('../Lib/MediaManager/Media/Media.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Video
 *
 * @author Franklyn
 */
class Video extends AppModel{
    //put your code here
    public $belongsTo = array('Category', 'Topic');
}
