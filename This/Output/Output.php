<?php

namespace This\Output;

use This;

class Output{

    private static $output;
    
    public function __construct(){
    }

    public static function set($content){
        self::$output = $content;
    }
    
    public function append($content){
        $this->output .= $content;
    }
    
    public static function get(){
        echo self::$output;
    }
}
