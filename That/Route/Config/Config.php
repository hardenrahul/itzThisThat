<?php

namespace That\Route\Config;

class Config{
    
    public $directory;
    public $what;
    public $action;
    
    public function __construct(){
        $this->directory = "";
        $this->what = "Controller";
        $this->action = "method";
    }
    
}