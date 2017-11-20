<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <script src="../../assets/js/jquery-3.2.1.min.js"></script>

    <script>
        setTimeout(() => {
            location.reload();
        }, 10000);
    </script>
</head>
<body>
        <h1>SyukurParking - Booking</h1>
        <div class="login">
            <?php
                include "../../config/connect.php";
                session_start();

                $query = "SELECT * FROM TrBookingLocation a LEFT JOIN TrParking b
                            ON a.ID = b.ID";
                $res   = sqlsrv_query($conn, $query, array(), array("Scrollable" => "Static"));

                while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
                    $parkingLocation = $row['ParkingLocation'];
                    $taken           = $row['Taken'];
                    $parkingID       = $row['ParkingID'];

                    
            ?>
                    <div class="parking">
                        <p><?php echo $parkingLocation; ?></p>

            <?php
                    if ($taken == 1) {
                        echo '<p>Occupied</p>';
                        echo '<p>' . $parkingID . '</p>';
                    } else {
                        echo '<p>Empty</p>';
                    }
            
            ?>      
                        <form action="bookPage.php" method="POST">
                            <div class="form-group">
                                <label for="parking-location">Parking Location</label>
                                <input type="hidden" name="parking-location" id="parking-location" value="<?php echo $parkingLocation; ?>">
                            </div>
                            
                            <button>Book</button>
                        </form>
                    
                    </div>
            <?php
                }
            ?>
            </div>
            
</body>
</html>