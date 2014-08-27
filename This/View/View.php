<?php

namespace This;

use This;

class View{

    public $thisConfig;

    public function __construct(){
        $this->thisConfig = This\This::loadClass("This\View\Config\Config", "", array(), FALSE);
    }

    public function load($path){
        return This\This::import("That" . DIRECTORY_SEPARATOR  . "Views" . DIRECTORY_SEPARATOR .  $path);
    }

}
