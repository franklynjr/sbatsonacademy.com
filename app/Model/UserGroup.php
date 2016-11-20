<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

/**
 * CakePHP UserGroup
 * @author Franklyn
 */
class UserGroup extends AppModel {
    public $belongsTo = 'Role';
}
