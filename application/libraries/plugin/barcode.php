<?php
    /*
        TODO : MAKE THE PARKINGIN FIELD MANDATORY TO ENTER
    */
    include "../../config/connect.php";
    include 'barcode128.php';
    
    date_default_timezone_set("Asia/Jakarta");
    $parkingLocation    = $_POST['parkingLocation'];
    $parkingLocationRow = $_POST['parkingLocationRow'];
    $vehicleType        = $_POST['vehicleType'];

    $day         = date('l');
    $fullDate    =  date("d M Y H:i:s");

    echo '<center><h4>SyukurParking</h4></center>';
    echo '<center>'.$parkingLocation.'</center>';
    echo '<center><div style="height: 30%; width: 50%;">';
    echo '<b>'.bar128(stripcslashes($_POST['bookingNumber'])).'</b>';    
    echo '<b>'.$vehicleType.'</b><br>';
    echo $day . ', ' . $fullDate;
    echo '</div></center>';

    //Select and join two tables to get the locationID
    $queryLocationID = "SELECT TOP 1 a.LocationID FROM TrBookingLocation a INNER JOIN LtParkingLocation b ON a.LocationID = b.ID";
    $resLocation     = sqlsrv_query($conn, $queryLocationID, array(), array("Scrollable" => "Static"));
    $locationRow     = sqlsrv_fetch_array($resLocation, SQLSRV_FETCH_ASSOC);
    $locationID      = $locationRow['LocationID'];

    //Insert into list of Parking List
    $query  = "INSERT INTO TrParking (ParkingID, LocationID, InTime, VehicleType) VALUES (?, ?, ?, ?)";
    $params = array($parkingID, $locationID, $fullDate, $vehicleType);
    $res    = sqlsrv_query($conn, $query, $params); 

    //Set taken to 1, means that the parking position is already taken
    $queryParkingPositionTaken = "UPDATE TrBookingLocation SET a.Taken = '1' FROM TrBookingLocation a INNER JOIN TrParking b ON a.ID = b.LocationID";
    $updateRes = sqlsrv_query($conn, $queryParkingPositionTaken);
?>