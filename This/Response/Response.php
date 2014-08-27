<?php

namespace This\Response;

use This\Output\Output as Output;

class Response{

    public function __construct(){
        
    }
    
    public function send(){
        echo Output::get();
    }

}
