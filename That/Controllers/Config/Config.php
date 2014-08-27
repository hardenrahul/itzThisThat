<?php

namespace That\Controllers;

class Config{
    
    public $what;
    public $action;
    
    public function __construct(){
        $this->what = "Controller";
        $this->action = "method";
    }
    
}