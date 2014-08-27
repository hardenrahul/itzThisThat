<?php

namespace That\Route;

class Route{

    public $routes;

    public function __construct(){

        $this->routes = array(
            "default" => "What/Action",
            "error" => "errors/404",
        );
    }

}
