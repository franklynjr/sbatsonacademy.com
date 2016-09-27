<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

/**
 * CakePHP SystemConfig
 * @author franklyn
 */
class SystemConfig{
    
    public  $config;
    
    public  function get($key){
        
        return (isset($this->config) && isset($this->config[$key])) ? $this->config[$key]: '';
    }
    
    public  function set($key, $value)
    {
        
        $this->config[$key] = $value;
        return $this->$config;
    }
    
    public function __construct() {
        
        $this->config = ['mail' => ['name'=>'Franklyn',
                                    'from'=>'everol4u@gmail.com',
                                    'host'=>'smtpout.secureserver.net',
                                    'port'=>'80',
                                    'username'=>'fpinnock@marburn.com',
                                    'password'=>'fpmcwcorp2',
                                    'transport'=>'Smtp',
                                    'tls'=>false],
                           'default'=>array(
                                    'transport' => 'Mail',
                                    'from' => 'test@fpsoftwares.com',
                                    //'charset' => 'utf-8',
                                    //'headerCharset' => 'utf-8',
                                    ),

//            'gmail' => ['name'=>'Franklyn',
//                                    'from'=>'everol4u@gmail.com',
//                                    'host'=>'smtp.gmail.com',
//                                    'port'=>587,
//                                    'username'=>'everol4u@gmail.com',
//                                    'password'=>'0w3n@ndj0y',
//                                    'transport'=>'Smtp',
//                                    'tls'=>true],
                         'contact_us_email'=>'franklynjr@outlook.com',
                         'next_setting'=>'value'];
    }
    
}
