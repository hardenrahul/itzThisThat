<?php

namespace This\Database\Config;

class Config{
    
    public $hostName;
    public $databaseName;
    public $userName;
    public $password;
    
    public function __construct(){
        $this->hostName = "localhost";
        $this->databaseName = "webcontx_lpad";
        $this->userName = "root";
        $this->password = "";
    }
    
    
    
}