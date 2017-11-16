<?php
    $serverName = "DESKTOP-MKTEBIE";  
    $connectionOptions = array("Database"=>"SyukurParking");  

    $conn = sqlsrv_connect($serverName, $connectionOptions); 

    if(!$conn)  { 
        echo "something is wrong";
    } else {
        echo "Yas!";
    }
?>