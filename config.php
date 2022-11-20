<?php

$db = array( 

    "user"=>"root",
    "pass"=>""

);
   

spl_autoload_register(function($nameClass){//incluir classe de outros diretorios

    $dirClass = "class";
    $filename = $dirClass . DIRECTORY_SEPARATOR . $nameClass . ".php";

    if (file_exists($filename)) {
        require_once $filename;
    }

});

?>