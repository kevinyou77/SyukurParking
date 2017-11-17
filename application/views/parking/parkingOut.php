<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parking System - OUT</title>
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <script src="../../assets/js/jquery-3.2.1.min.js"></script>
</head>
<body>
    <script>
        $('button').click(
            $.ajax({
                type: "POST",
                url: "../../libraries/parking/parkingOut.php",
                data: 'json',
                success: (res) => {
                    $('#parkingOutInfo').html(res);
                }
            });
        );
    </script>

    <?php
        include "../../config/connect.php";
        session_start();

        // $selectQuery     = "SELECT TOP 1 * FROM TrParking WHERE ParkingID = '".$bookingNumber."'";
        // $selectQueryRes  = sqlsrv_query($conn, $selectQuery, array(), array("Scrollable" => "Static"));
        // $selectQueryRow  = sqlsrv_fetch_array($selectQueryRes, SQLSRV_FETCH_ASSOC);
        
        $locationID      = $_POST['locationID'];
        $locationName    = $_POST['parking-location'];

        // $queryLocationName  = "SELECT DISTINCT b.LocationName FROM TrParking a 
        // INNER JOIN LtParkingLocation b
        // ON a.LocationID = b.ID
        // WHERE a.LocationID = '".$locationID."'";
        // $locationNameResult = sqlsrv_query($conn, $queryLocationName, array(), array("Scrollable" => "Static"));
        // $locationNameRow    = sqlsrv_fetch_array($locationNameResult, MSSQL_FETCH_ASSOC);
        // $locationName       = $locationNameRow['LocationName'];
    ?>

    <div class="login">
        <h3>SyukurParking - OUT</h3>
        <h6>Welcome to <?php echo $locationName; ?></h6>
        <h3>
            <?php 
                // if (isset($_POST['parking-location'])) {
                //     $parkingLocation = $_POST['parking-location'];
                //     echo $parkingLocation; 
            ?>
        </h3>
                    <form action="../../libraries/parking/parkingOut.php" method="POST">
                        <div class="form-group">
                            <label for="bookingNumber">Booking Number</label>
                            <input type="text" class="form-control" name="bookingNumber" id="bookingNumber" placeholder="Booking Number" required>
                        
                            <button>Generate Bill</button>
                        </div>      
                    </form>
                    <p>Date<?php date("d M Y H:i:s") ?></p>

                    <div id="parkingOutInfo">
                        
                    </div>
            <!-- <?php
                // } else {
                //     header('location: parkingHome.php');
                // }
            ?> -->
    </div>
    
</body>
</html>