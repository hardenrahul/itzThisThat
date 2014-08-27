<?php

namespace This\Helpers;
use This;

class Helpers{

    public function __construct(){
        $defaults = This\This::loadClass("This\Request\Config\Config", "", array(), FALSE);
        print_r($defaults);
        $this->request = "";
        $this->request = $this->detectRequest();
        if(!empty($this->request)){
            $this->setRequest($this->request);
        }else{
            $this->setRequest($this->request);
        }
    }

}
