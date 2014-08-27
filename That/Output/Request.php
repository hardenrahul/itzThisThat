<?php

namespace This\Request;
use This;

class Request{

    private $request;

    public function __construct(){
        $defaults = This\This::loadClass("This\Request\Config\Config", array(), FALSE);
        print_r($defaults);
        $this->request = "";
        $this->request = $this->detectRequest();
        if(!empty($this->request)){
            $this->setRequest($this->request);
        }else{
            $this->setRequest($this->request);
        }
    }

    public function getRequest(){
        
    }

    private function setRequest($request){
        $this->request = $request;
    }

    private function detectRequest(){
        if(!isset($_SERVER['REQUEST_URI']) OR !isset($_SERVER['SCRIPT_NAME'])){
            return '';
        }

        $this->request = $_SERVER['REQUEST_URI'];
        if(strpos($this->request, $_SERVER['SCRIPT_NAME']) === 0){
            $this->request = substr($this->request, strlen($_SERVER['SCRIPT_NAME']));
        }elseif(strpos($this->request, dirname($_SERVER['SCRIPT_NAME'])) === 0){
            $this->request = substr($this->request, strlen(dirname($_SERVER['SCRIPT_NAME'])));
        }

        // This section ensures that even on servers that require the URI to be in the query string (Nginx) a correct
        // URI is found, and also fixes the QUERY_STRING server var and $_GET array.
        if(strncmp($this->request, '?/', 2) === 0){
            $this->request = substr($this->request, 2);
        }

        $parts = preg_split('#\?#i', $this->request, 2);
        $this->request = $parts[0];

        if(isset($parts[1])){
            $_SERVER['QUERY_STRING'] = $parts[1];
            parse_str($_SERVER['QUERY_STRING'], $_GET);
        }else{
            $_SERVER['QUERY_STRING'] = '';
            $_GET = array();
        }

        if($this->request == '/' || empty($this->request)){
            return '/';
        }

        $this->request = parse_url($this->request, PHP_URL_PATH);

        // Do some final cleaning of the URI and return it
        if($this->request = str_replace(array('//', '../'), '/', trim($this->request, '/'))){
            return $this->request;
        }

        // Is there a PATH_INFO variable?
        // Note: some servers seem to have trouble with getenv() so we'll test it two ways
        $path = (isset($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : @getenv('PATH_INFO');
        if(trim($path, '/') != '' && $path != "/" . SELF){
            return $path;
        }

        // No PATH_INFO?... What about QUERY_STRING?
        $path = (isset($_SERVER['QUERY_STRING'])) ? $_SERVER['QUERY_STRING'] : @getenv('QUERY_STRING');
        if(trim($path, '/') != ''){
            return $path;
        }

        // As a last ditch effort lets try using the $_GET array
        if(is_array($_GET) && count($_GET) == 1 && trim(key($_GET), '/') != ''){
            return key($_GET);
        }

        // We've exhausted all our options...
        $this->request = '';
        return;
    }

}
