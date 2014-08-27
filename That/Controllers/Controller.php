<?php

namespace That\Controllers;

use This\Controller\Controller as c;

class Controller extends c{

    public function __construct(){
        parent::__construct();
    }

    public function __call($action, $arguments){
        $this->Load->view("That");
    }

}
