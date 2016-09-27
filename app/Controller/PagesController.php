<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
        
        // allow all except administrative CRUD
        $this->Auth->deny('admin_delete', 'admin_add', 'admin_view', 'admin_edit');
    }

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    public function display() {

        $this->set('token', $this->token);

        
        $path = func_get_args();

        $count = count($path);
        
        if (!$count) {
            
            return $this->redirect('/');
        }
        
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[0])) {
            $page = $path[0];
            
            if($this->render_view($path))
            {
                return;
            }
            
            
        }  
        
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        
        $this->set(compact('page', 'subpage', 'title_for_layout'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    
    public function home($name = null) {
        
        Controller::loadModel('Testimonial');
        $random1 = $this->Testimonial->Find("first");
        
        //          $this->layout = 'admin_default';
//          echo "Page name:". $page;


        if(isset($name)){
            $page = $this->Page->findByName($name);
//          print_r($page);
            if ($page) {
                $this->set('content', $page['Page']['content']);
            } else {

                $this->set('content', '404');
                $this->response->statusCode(404);
            }

            $this->set("random1", $random1);

            $this->layout = 'home';

            $this->render("view");
        }
        
        
    }

    
    public function admin_home() {
        $this->layout = 'admin_default';
        
    }
    

    public function admin_view() {
        $this->layout = 'admin_default';
        $pages = $this->Page->find('all');
        $this->set('pages', $pages);
    }
    
    
    public function admin_delete($id) {
        $this->layout = 'admin_default';
        
        if($this->request->is('post'))
        {
            //$page = $this->Page->findById($id);
            if($this->Page->delete($id))
            {
                $this->redirect('/admin/pages/view');
            }
        }
        
        $page = $this->Page->findById($id);
        
        if(!$page)
        {
                $this->redirect('/admin/pages/view');
        }
        $this->set('page', $page);
    }
    
    public function admin_add() {
        if($this->request->is("post"))
        {
            //  insert the page
            $this->Page->create();
            $page = $this->Page->save($this->request->data);
            //str_replace($page, $replace, $subject)
            if($page)
            {
                $this->Flash->success("pages was successfully created");
            }
        }
    }

        
    public function admin_edit($id) {
        if($this->request->is("put") || $this->request->is("post"))
        {
            //  insert the page
            $page = $this->Page->save($this->request->data);
            //str_replace($page, $replace, $subject)
            if($page)
            {
                $this->Flash->success("pages was successfully updated");
            }
        }
        
        $this->request->data = $this->Page->findById($id);
    }
    
    public function view($name) {
//          $this->layout = 'admin_default';
//          echo "Page name:". $page;

        $page = $this->Page->findByName($name);
//            print_r($page);
        if ($page) {
            $this->set('content', $page['Page']['content']);
        } else {

            $this->set('content', '404');
            $this->response->statusCode(404);
        }


        $this->render("view");
    }

    private function render_view($path)
    {
        
        if (is_array($path) && $path[0] == 'view') {
                //call_user_func_array($this->{$path[0]}, $path);
                if(isset($path[1])){
                    $this->view($path[1]);
                return true;
                
                }
            }else if(is_array($path) && $path[0] == 'home')
            {
                $this->home($path[0]);
            }
        return false;
    }
}
