<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SyukurParking - Information</title>
</head>
<body>
    <h3>Parking Availability</h3>
    <?php
        include "../../config/connect.php";
        session_start();

        $query = "SELECT * FROM LtParkingLocation";

        $res = sqlsrv_query($conn, $query, array(), array( "Scrollable" => 'static' ));

        while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
            $locationID   = $row['LocationID'];
            $locationName = $row['LocationName'];
            $ParkingSpace = $row['ParkingSpace'];
    ?>
        <div class="info">
            <p><?php echo $locationName ?></p>
            
            <p>Capacity : <?php echo $ParkingSpace ?></p>
            <p>Parking Available : </p>
            <form action="../parking/parkingOut.php" method="POST">
                <input type="hidden" name="locationID" value="<?php echo $locationID; ?>">
                <input type="hidden" name="parking-location" value="<?php echo $locationName; ?>">
                <button type="submit">Open</button>
            </form>
        </div>

    <?php
        }
    ?>
</body>
</html>