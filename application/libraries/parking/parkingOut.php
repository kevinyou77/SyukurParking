<?php
    include "../../config/connect.php";
    include '../../libraries/plugin/barcode128.php';

    $bookingNumber = $_POST['bookingNumber'];

    $selectQuery     = "SELECT TOP 1 * FROM TrParking WHERE ParkingID = '".$bookingNumber."'";
    $selectQueryRes  = sqlsrv_query($conn, $selectQuery);
    $selectQueryRow  = sqlsrv_fetch_array($selectQueryRes, SQLSRV_FETCH_ASSOC);

    if (sqlsrv_has_rows($selectQueryRes)) {
        $locationID      = $selectQueryRow['LocationID'];
        
        $utc          = new DateTimeZone("UTC");
        $inTime       = new DateTime($selectQueryRow['InTime'], new DateTimeZone("Asia/Jakarta"));
        $now          = new DateTime();
        $now->setTimeZone(new DateTimeZone("Asia/Jakarta"));
        // $now->format('Y-m-d H:i:s');
        $interval     = $now->diff($inTime);

        $totalCost = 0;
        if ($selectQueryRow['VehicleType'] == 'Car') {
            if (((int)$interval->format('%h')) == 1) {
                $totalCost += 5000;
            }

            if (((int)$interval->format('%h')) >= 2) {
                $totalCost += (((int)$interval->format('%h') - 1) * 5000);
            }
        } else if ($selectQueryRow['VehicleType'] == 'Motorcycle' ||$selectQueryRow['VehicleType'] == 'Motor') {
            if (((int)$interval->format('%h')) == 1) {
                $totalCost += 2000;
            }

            if (((int)$interval->format('%h')) >= 2) {
                $totalCost += (((int)$interval->format('%h') - 1) * 1000);
            }
        }
        
        $updateOutTimeQuery    = "UPDATE TrParking SET OutTime = '".$now->format('Y-m-d H:i:s')."'
                                    FROM TrBookingLocation a 
                                    INNER JOIN TrParking b 
                                    ON a.ID = b.ID
                                    WHERE b.ParkingID = '".$bookingNumber."'";
                                    
        $updateOutQueryRes        = sqlsrv_query($conn, $updateOutTimeQuery);

        $updateQuery       = "UPDATE TrBookingLocation 
                                SET Taken = 0
                                FROM TrBookingLocation a 
                                INNER JOIN TrParking b 
                                ON a.ID = b.ID
                                WHERE b.ParkingID = '".$bookingNumber."'";
                                
        $updateQueryRes    = sqlsrv_query($conn, $updateQuery);
        echo '<b>SyukurParking</b>';
        echo '<center><b>'.bar128(stripcslashes($_POST['bookingNumber'])).'</b></center>';  
        echo '<center><p>Total : Rp. ' . $totalCost . '</p></center>';
        echo '<center><p>Booking Code : '. $bookingNumber .'/ Parking Location: </p></center>';
        echo '<center><p>'.$interval->format('%h').' Hours '.$interval->format('%i').' Minutes</p></center>';
        echo '<center><p>IN: '. $selectQueryRow['InTime'] .'</p></center>';
        echo '<center><p>OUT: '. $now->format('Y-m-d H:i:s') . '</p></center>';
    } else {
        echo '<p>Booking not found</p>';
        die(print_r(sqlsrv_errors(), true));
    }
?>