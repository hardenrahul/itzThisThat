<?php

namespace This\Route\Config;

class Config{
    
    public $directory;
    public $what;
    public $action;
    
    public function __construct(){
        $this->directory = "";
        $this->what = "That";
        $this->action = "that";
    }
    
}