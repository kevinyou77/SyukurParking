<?php
    $serverName = "DESKTOP-MKTEBIE";  
    $connectionOptions = array(
        "Database"=>"SyukurParking",
        "ReturnDatesAsStrings" => true
    );  

    $conn = sqlsrv_connect($serverName, $connectionOptions); 

    if(!$conn)  { 
        die(print_r(sqlsrv_error(), true));
    }
?>