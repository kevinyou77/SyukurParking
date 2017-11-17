<?php
    include "../../config/connect.php";

    session_start();

    $email     = $_POST['email'];
    $password  = $_POST['password'];

    $query = "SELECT * FROM MsCustomer WHERE CustomerEmail = '".$email."' AND CustomerPassword = '".$password."'";
    $res   = sqlsrv_query($conn, $query, array(), array( "Scrollable" => 'static' ));

    $numRows = sqlsrv_num_rows($res);

    if ($numRows == 1) {    
        $_SESSION['login-user'] = true;
        $_SESSION['user-email'] = $email;
        header('Location: ../../views/parking/parkingHome.php');
    } else {
        echo "Wrong email or password!";
        session_destroy();
    }

?>