<?php

$db = array( 

    "user"=>"root",
    "pass"=>""

);
   

spl_autoload_register(function($nameClass){//incluir classe de outros diretorios

   
    $filename = $nameClass . ".php";

    if (file_exists($filename)) {
        require_once $filename;
    }

});

?>