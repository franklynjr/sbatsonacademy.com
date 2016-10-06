<?php
$this->layout = null;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->response->header('Content-Type','application/json');
header('Content-Type: application/json');

echo json_encode($this->Session->read('token'));

