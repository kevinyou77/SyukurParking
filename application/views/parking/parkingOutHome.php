<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SyukurParking - Information</title>
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <script src="../../../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../../../assets/js/formValidation.js"></script>
</head>
<body>
    
    <?php
        include "../../config/connect.php";
        session_start();

        $username = $_SESSION['staff-email'];

        $query = "SELECT * FROM LtParkingLocation";

        $res = sqlsrv_query($conn, $query, array(), array( "Scrollable" => 'static' ));
    ?>
    
    <center><h3>Parking Availability</h3></center>
    <center><p>Welcome, <?php echo $username; ?></p></center>
    <center><a href="../../views/logout.php">Logout</a></center>

    <?php
        while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
            $locationID   = $row['ID'];
            $locationName = $row['LocationName'];
            $ParkingSpace = $row['ParkingSpace'];
    ?>
        <div class="login">
            <p><?php echo $locationName ?></p>
            
            <p>Capacity : <?php echo $ParkingSpace ?></p>
            <p>Parking Available : </p>
            <form action="../parking/parkingOut.php" method="POST">
                <input type="hidden" name="locationID" value="<?php echo $locationID; ?>">
                <input type="hidden" name="parking-location" value="<?php echo $locationName; ?>">
                <button>Open</button>
            </form>
        </div>

    <?php
        }
    ?>
</body>
</html>