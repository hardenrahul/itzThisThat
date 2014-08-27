<?php

namespace This\Load;

use This;

class Load{

    public $thisConfig;

    public function __construct(){
        $this->thisConfig = This\This::loadClass("This\Load\Config\Config", "", array(), \FALSE);
    }

    public function model($path, $parameters = array(), $assignToThis = \TRUE){
        This\This::loadClass($this->thisConfig->models . $path . ".php");
    }

    public function view($path, $data = "", $return = \FALSE){
        \ob_start();
        This\This::import($this->thisConfig->views . $path . ".php");
        if($return){
            $buffer = \ob_get_contents();
            @\ob_end_clean();
            return $buffer;
        }

        if(ob_get_level() > $this->thisConfig->obLevel + 1){
            \ob_end_flush();
        }else{
            This\Output\Output::set(\ob_get_contents());
            @\ob_end_clean();
        }
    }

}
