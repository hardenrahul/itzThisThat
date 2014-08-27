<?php

namespace This\Model;

use This;

class Model{

    public function __construct(){
        foreach(This\This::$loaded as $className => $settings){
            $classDetails = explode(DIRECTORY_SEPARATOR, $className);
            $class = end($classDetails);
            $this->$class = $settings["reference"];
        }
    }

}
