<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('AuthComponent', 'Controller/Component');
require('../Lib/MediaManager/Core/MediaManager.php');
require('../Lib/MediaManager/Media/Stream.php');
require('../Lib/stripe-php/init.php');
require_once "../Lib/random_compat/random_compat.phar";
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $user;
    
    public $components = array(
        "Flash",
        'Auth' => array(
            'authenticate' => array(
                'Form'=>array(
                    'passwordHasher' => 'Blowfish'
                ),
                AuthComponent::ALL => ['userModel'=>'Login'],
            ),
            'loginAction'=>'/login',
            'authorize' => array('Controller')
        ),
        'Session'
    );
    
    public function getToken()
    {
        $token = bin2hex(random_bytes(32));
        return $token;        
    }
     
    
    public function beforeFilter() {
        parent::beforeFilter();
        
        global $user;
        
        if(isset($this->request->params['admin']))
        {
            $this->layout = 'admin_default';
        
        }
        
        date_default_timezone_set('America/New_York');
         
        $this->Auth->allow(array('home','index', 'view', 'login', 'logout'));
        
        $login = AuthComponent::user();
        if($login){
            Controller::loadModel('User');
            $user = $this->User->findById($login['user_id']);
            
            $this->set('user',$user);
//            $this->set('user_o', $this->User);
            $this->set('is_admin', $this->User->isAdmin($user));
        }

    }
    
    public function isAuthorized($usr){
    
        global $user;
        if(isset($this->request->params['admin']))
        {
            //return true;
            if(isset($user) && isset($usr) && $user['Role']['name'] == 'admin')
            {
                return true;
            }
        }
        
        return false;
    }
    
   
}
