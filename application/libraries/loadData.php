<?php
    session_start();

    function getCustomerData() {
        // $tableName = "";
        // $email = "";
        // $field = "";

        // $resultSet = array();

        // if ($role === 'staff') {
        //     $tableName = "MsStaff";
        //     $field = "StaffEmail";
        //     $email = $_SESSION['staff-email'];
        // } else if ($role === "customer") {
        //     $tableName = "MsCustomer";
        //     $field = "CustomerEmail";
        //     $email = $_SESSION['user-email'];
        // }

        //$query = 'SELECT * FROM '"$tableName"' WHERE .'".$field."'. = .'".$email."';
        $name = "";
        $email = "";
        $address = "";
        $phone = "";
        $password = "";
        
        $loggedIn = $_SESSION['user-email'];

        $query = "SELECT * FROM MsCustomer WHERE CustomerEmail = '".$loggedIn."'" ;
        $res = sqlsrv_query ($query);
        
        if (sqlsrv_has_rows($res)) {
            while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC) {
                $data = array(
                    'CustomerName' => $row['CustomerName'];
                    'CustomerEmail' => $row['CustomerEmail'];
                    'CustomerAddress' => $row['CustomerAddress'];
                    'CustomerPhone' => $row['CustomerPhone'];
                    'CustomerPassword' => $row['CustomerPassword'];
                )
            }
            
            return $data;
        }

        return false;
    }

?>