<?php

namespace This\Database;
use This;

class Database extends \PDO{

    function __construct(){
        $databaseSettings = This\This::loadClass("This\Database\Config\Config", array(), \FALSE);
        
        parent::__construct("mysql:host=" . $databaseSettings->hostName . ";dbname=" . $databaseSettings->databaseName . "", $databaseSettings->userName, $databaseSettings->password);
        //$this->setAttribute(PDO::ATTR_STATEMENT_CLASS, array('DBStatement', array($this)));
    }

    public function foundRows($query){
        $rows = $this->prepare($query, array(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => \TRUE));
        $rows->execute();
        print_r($rows->fetchAll());
        print_r($rows);
    }

    public function insert(){
        
    }
    
    public function query($query){
        $rows = $this->prepare($query, array(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => \TRUE));
        $rows->execute();
    }

    public function add(){
        
    }

    public function update(){
        
    }
    
    public function edit(){
        
    }

    public function read($query){
        $this->select($query);
    }
    
    public function listAll($query){
        $this->select($query);
    }    
    
    public function view($query){
        $this->select($query);
    }    

    public function select($query){
        $rows = $this->prepare($query, array(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => \TRUE));
        $rows->execute();
        print_r($rows->fetchAll());
        print_r($rows);
    }

    public function delete(){
        
    }

    public function remove(){
        
    }

}
