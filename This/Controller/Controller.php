<?php

namespace This\Controller;
use This;

class Controller{

    public function __construct(){
        foreach(This\This::$loaded as $className => $settings){
            $classDetails = explode(DIRECTORY_SEPARATOR, $className);
            $class = end($classDetails);
            $this->$class = $settings["reference"];
        }
    }

}
