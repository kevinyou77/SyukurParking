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
        <!-- <script>
            function refresh() {
                $('button').click(() => {
                    let booking = $('#bookingNumber').val();
                    let locName = $('#locationName').val();
                    let locID   = $('#locationID').val();

                    let dataString = "booking=" + booking + "&locationName=" + locName + "&locationID=" + locID
                    $.ajax({
                        type: "POST",
                        url: "../../libraries/parking/parkingOut.php",
                        data: dataString,
                        success: (res) => {
                            alert("a");
                            $('#parkingOutInfo').html(res);
                        }
                    });
                });

                return false;
            }
        </script> -->

        <?php
            include "../../config/connect.php";
            session_start();

            // $selectQuery     = "SELECT TOP 1 * FROM TrParking WHERE ParkingID = '".$bookingNumber."'";
            // $selectQueryRes  = sqlsrv_query($conn, $selectQuery, array(), array("Scrollable" => "Static"));
            // $selectQueryRow  = sqlsrv_fetch_array($selectQueryRes, SQLSRV_FETCH_ASSOC);
            
            // if (isset($_POST['locationID'])) {
            //     $locationID      = $_POST['locationID'];
            //     $locationName    = $_POST['parking-location'];
            // }
            $locationID = $_POST['locationID']; 

            $queryLocationName  = "SELECT DISTINCT TOP 1 b.LocationName, b.LocationID FROM TrParking a 
                                    INNER JOIN LtParkingLocation b
                                    ON a.LocationID = b.ID
                                    WHERE a.LocationID = '".$locationID."'";
            $locationNameResult = sqlsrv_query($conn, $queryLocationName);
            $locationNameRow    = sqlsrv_fetch_array($locationNameResult, SQLSRV_FETCH_ASSOC);
            $locationName       = $locationNameRow['LocationName'];
            $locationID         = $locationNameRow['LocationID'];
        ?>

        <div class="login">
            <h3>SyukurParking - OUT</h3>
            <h6 id="locationName">Welcome to <?php echo $locationName; ?></h6>
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
                                <input type="hidden" name="locationID" id="locationID" value="<?php $locationID; ?>">
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