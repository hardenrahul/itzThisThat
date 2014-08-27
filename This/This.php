<?php

namespace This;

class This{

    public static $loaded = array();

    public static function loadClass($path, $alias, $parameters = array(), $assignToThis = \TRUE){
        if(isset(self::$loaded[$path])){
            return self::$loaded[$path]["reference"];
        }

        if(self::import($path . ".php")){
            $reference = new $path(implode(", ", $parameters));
            if($assignToThis){
                if($alias){
                    self::$loaded[$alias] = array("path" => $path, "reference" => $reference);
                }else{
                    self::$loaded[$path] = array("path" => $path, "reference" => $reference);
                }
            }
            return $reference;
        }else{
            return \FALSE;
        }
    }

    public static function import($path){
        $path = str_replace("\\", DIRECTORY_SEPARATOR, $path);
        if(file_exists($path)){
            require($path);
            return \TRUE;
        }else{
            exit("Can't load file:- " . $path);
            return \FALSE;
        }
    }

}
