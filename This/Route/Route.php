<?php

namespace This\Route;

use This;

class Route{

    private $request;
    private $thisConfig;
    private $thatConfig;
    private $thatRoute;
    private $directory;
    private $what;
    private $action;

    public function __construct(){
        
        $this->thisConfig = This\This::loadClass("This\Route\Config\Config", "", array(), FALSE);
        $this->request = This\This::loadClass("This\Request\Request", "", array(), FALSE);

        
        $this->thatConfig = This\This::loadClass("That\Route\Config\Config", "", array(), FALSE);
        $this->thatRoute = This\This::loadClass("That\Route\Route", "", array(), FALSE);
        
        if(is_array($this->thatRoute->routes) && !empty($this->thatRoute->routes)){
            $this->setRouting($this->thatRoute->routes);
        }
        
        $this->detectDirectory();
        $this->detectWhat();
        $this->detectAction();
    }

    private function detectDirectory(){
        $requestParts = explode("/", $this->request->getRequest());
        $nestedDirectory = "";
        
        foreach($requestParts as $requestPart){
            if(empty($requestPart)){
                break;
            }

            if(is_dir(THAT . "Controllers" . DIRECTORY_SEPARATOR . $nestedDirectory . ucfirst($requestPart) . DIRECTORY_SEPARATOR)){
                $nestedDirectory .= ucfirst($requestPart) . DIRECTORY_SEPARATOR;
                array_shift($requestParts);
            }
        }

        $this->request->setRequest(implode("/", $requestParts));
        if(!empty($nestedDirectory)){
            $this->setDirectory($nestedDirectory);
        }else{
            $this->setDirectory($this->thisConfig->directory);
        }
    }

    private function setDirectory($directory){
        $this->directory = $directory;
    }

    public function getDirectory(){
        return $this->directory;
    }

    private function detectWhat(){
        $requestParts = explode("/", $this->request->getRequest());
        $nestedWhat = "";

        if(is_file(THAT . "Controllers" . DIRECTORY_SEPARATOR . $this->getDirectory() . $requestParts[0] . ".php")){
            $nestedWhat = $requestParts[0];
            array_shift($requestParts);
        }else{
            $requestParts = array();
        }

        $this->request->setRequest(implode("/", $requestParts));
        if(!empty($nestedWhat)){
            $this->setWhat(ucfirst($nestedWhat));
        }else{
            $this->setWhat($this->thatConfig->what);
        }
    }

    private function setWhat($what){
        $this->what = $what;
    }

    public function getWhat(){
        return $this->what;
    }

    private function detectAction(){
        $requestParts = explode("/", $this->request->getRequest());

        $nestedAction = $requestParts[0];
        array_shift($requestParts);


        $this->request->setRequest(implode("/", $requestParts));
        if(!empty($nestedAction)){
            $this->setAction($nestedAction);
        }else{
            $this->setAction($this->thatConfig->action);
        }
    }

    private function setAction($action){
        $this->action = $action;
    }

    public function getAction(){
        return $this->action;
    }
    
    public function setRouting($routes){
        foreach($routes as $key=>$route){
            if($key == $this->request->getRequest()){
                return $this->request->setRequest($route);
            }
        }
    }

}
