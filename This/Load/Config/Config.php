<?php

namespace This\Load\Config;

class Config{

    public $models;
    public $views;
    public $obLevel;
    
    public function __construct(){
        $this->obLevel = ob_get_level();
        $this->models = THAT . "Models" . DIRECTORY_SEPARATOR;
        $this->views = THAT . "Views" . DIRECTORY_SEPARATOR;
        
    }

}
