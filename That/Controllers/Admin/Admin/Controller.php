<?php

namespace That\Controllers\Admin\Admin;

use This;
use This\Controller\Controller as c;

class Controller extends c{

    public function __construct(){
        parent::__construct();
    }

    public function __call($action, $arguments){
        echo "12131313";
        $this->Load->view("That");
    }

}
