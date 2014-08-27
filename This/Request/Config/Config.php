<?php

namespace This\Request\Config;

class Config{
    
    public $directory;
    public $what;
    public $action;
    
    public function __construct(){
        $this->directory = "";
        $this->what = "";
        $this->action = "";
    }
    
}