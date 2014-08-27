<?php

namespace This;

/**
 * 
 * 
 * 
 * 
 */
class Config{

    /**
     *
     * @var array
     */
    public static $loaded = array();

    public function __construct(){
        foreach(self::$loaded as $className => $settings){
            $this->$className = $settings["reference"];
        }
    }

    /**
     *
     * @param string $className
     * @param string $location
     * @param array $parameters
     * @param boolena $assignToProcessor
     * @return class reference
     */
    public static function loadClass($path, $parameters, $assignToThis = \TRUE){
        //echo $fileLocation . $classPath . $assignToThis . "<br />";
        
        if(isset(self::$loaded[$path])){
            return self::$loaded[$path]["reference"];
        }

        if(self::import($path)){
            $reference = new $path(implode(", ", $parameters));
            if($assignToThis){
                self::$loaded[$path] = array("path" => $path, "reference" => $reference);
            }
            return $reference;
        }else{    
            return FALSE;
        }
    }

    public static function import($path){
        if(file_exists($path . ".php")){
            require_once($path . ".php");
            return \TRUE;
        }else{
            return \FALSE;
        }
    }

}