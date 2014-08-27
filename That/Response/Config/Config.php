<?php

namespace This\Request\Config;

class Config{
    
    public $what;
    public $action;
    
    public function __construct(){
        $this->what = "dashboard";
        $this->action = "list";
    }
    
}