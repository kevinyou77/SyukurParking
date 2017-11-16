<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parking System - IN</title>
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <script src="../../assets/js/jquery-3.2.1.min.js"></script>
</head>
<body>
    <?php
        include "../../config/connect.php";
        session_start();

        $query = "SELECT TOP 1 ParkingLocation FROM TrBookingLocation WHERE Taken = 0";

        $res = sqlsrv_query($conn, $query, array(), array("Scrollable" => 'static'));

        $row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC);

        $parkingLocationRow = $row['ParkingLocation']; 
    ?>
    <div class="login">
        <h3>SyukurParking - IN</h3>
        <h6>Welcome to</h6>
        <h3>
            <?php 
                if (isset($_POST['parking-location'])) {
                    $parkingLocation = $_POST['parking-location'];
                    echo $parkingLocation; 
            ?>
        </h3>
                    <form action="../../libraries/plugin/barcode.php" method="POST">
                        <div class="form-group">
                            <label for="bookingNumber">Booking Number</label>
                            <input type="text" class="form-control" name="bookingNumber" id="bookingNumber" placeholder="Booking Number">
                            
                            <select name="vehicleType" id="vehicleType">
                                <option value="Car">Car</option>
                                <option value="Motorcycle">Motorcycle</option>
                            </select>

                            <input type="hidden" name="parkingLocationRow" value="<?php echo $parkingLocationRow; ?>">
                            <input type="hidden" name="parkingLocation" value="<?php echo $parkingLocation; ?>">
                            <button>GENERATE TICKET</button>
                        </div>      
                    </form>

                    <p>Booking Available : 3</p>
                    <p>Parking Available : 293</p>
                    <p>Date</p>
            <?php
                } else {
                    header('location: parkingHome.php');
                }
            ?>
    </div>
    
</body>
</html>