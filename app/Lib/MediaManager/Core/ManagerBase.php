<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ManagerBase
 *
 * @author Franklyn
 */
if(!defined('DS'))
    define('DS', DIRECTORY_SEPARATOR);


if(!defined('CONTENTS'))
    define('CONTENTS','..'.DS.'Contents'.DS);

if(!defined('WEBROOT'))
    define('WEBROOT','..'.DS.'webroot'.DS);

if(!defined('CSS_DIR'))
    define('CSS_DIR', WEBROOT.'css'.DS);

if(!defined('JS_DIR'))
    define('JS_DIR', WEBROOT.'js'.DS);

if(!defined('IMG_DIR'))
    define('IMG_DIR', WEBROOT.'img'.DS);

if(!defined('VIDEOS'))
    define('VIDEOS', CONTENTS.'Videos'.DS);

if(!defined('MM_AUDIOS'))
    define('MM_AUDIOS', CONTENTS.'Audios'.DS);

if(!defined('MM_IMAGES'))
    define('MM_IMAGES', CONTENTS.'Images'.DS);


if(!defined('FFMPEG_LIN'))
    define('FFMPEG_LIN', '../Lib/MediaManager/Bin/OS/LINUX/ffmpeg');

if(!defined('FFMPEG_WINNT'))
    define('FFMPEG_WINNT', '..\\Lib\\MediaManager\\Bin\\OS\\WIN32\\bin\\ffmpeg.exe');

if(!defined('FFMPEG_OSX'))
    define('FFMPEG_OSX', '../Lib/MediaManager/Bin/OS/UNIX/ffmpeg');

define('CHUNK_SIZE', 1024*1024);