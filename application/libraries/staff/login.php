<?php
    include "../../config/connect.php";

    session_start();

    $email     = $_POST['email'];
    $password  = $_POST['password'];

    $query = "SELECT * FROM MsStaff WHERE StaffEmail = '".$email."' AND StaffPassword = '".$password."'";
    $res   = sqlsrv_query($conn, $query, array(), array( "Scrollable" => 'static' ));

    $numRows = sqlsrv_num_rows($res);

    if ($numRows == 1) {    
        $_SESSION['login-staff'] = true;
        $_SESSION['staff-email'] = $email;
        //header('Location: http://www.google.com');
    } else {
        echo "Ooops, something is wrong";
        session_destroy();
    }

?>