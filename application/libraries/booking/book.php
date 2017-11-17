<?php
    include "../../config/connect.php";

    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $licensePlate = $_POST['licensePlate'];
    $parkingLocation = $_POST['parkingLocation'];

    echo $email;
    echo $phone;
    echo $parkingLocation;
    echo $licensePlate;

    //find another way (temp solution)
    $parkingID = 'PK' . (string) rand(0, 10000);
    echo $parkingID;

    $query  = "INSERT INTO TrParking (ParkingID, CustomerEmail, CustomerPhoneNumber, LicensePlate) 
                    VALUES (?, ?, ?, ?)";
    $params = array($parkingID, $email, $phone, $licensePlate); 
    $res   = sqlsrv_query($conn, $query, $params);

    // $query  = "UPDATE TrParking SET CustomerEmail = '".$email."', CustomerPhoneNumber = '".$phone."', LicensePlate = '".$licensePlate."' WHERE ParkingLocation = '".$parkingLocation."'";
    // $params = array($email, $phone, $licensePlate); 
    // $res   = sqlsrv_query($conn, $query);

    $updateTaken = "UPDATE TrBookingLocation SET Taken = 1 
                        FROM TrBookingLocation a 
                        LEFT JOIN TrParking b
                        ON a.ID = b.ID
                        WHERE a.ParkingLocation = '".$parkingLocation."'";
    $updateRes   = sqlsrv_query($conn, $updateTaken);

    if ($res) {
        echo "Booking success!";
    
    } else {
        echo "nope";
        //die(print_r(sqlsrv_errors(), true));
    }
?>