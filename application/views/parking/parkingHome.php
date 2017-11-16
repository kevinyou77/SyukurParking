<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SyukurParking - Information</title>
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <script src="../../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../../assets/js/formValidation.js"></script>

    <script>
        setTimeout(() => {
            location.reload();
        }, 30000);
    </script>
</head>
<body>
    <h3>Parking Availability</h3>
    <?php
        include "../../config/connect.php";
        session_start();

        $query = "SELECT * FROM LtParkingLocation";

        $res = sqlsrv_query($conn, $query, array(), array( "Scrollable" => 'static' ));

        while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
            $locationName = $row['LocationName'];
            $ParkingSpace = $row['ParkingSpace'];
    ?>
        <div class="info">
            <p><?php echo $locationName ?></p>
            
            <p>Capacity : <?php echo $ParkingSpace ?></p>
            <p>Parking Available : </p>
            
        </div>

    <?php
        }
    ?>
</body>
</html>