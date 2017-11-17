<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SyukurParking - Book</title>
</head>
<body>
    <?php
        include "../../config/connect.php";

        $parkingLocation = $_POST['parking-location'];
    ?>
    <div class="login">
        <form action="../../libraries/booking/book.php" method="POST">
            <h2>Fill your credentials before you can continue</h2>
            <p>Booking for <?php echo $parkingLocation; ?></p>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>

            <div class="form-group">
                <label for="phone">CustomerPhone</label>
                <input type="text" name="phone" id="phone">
            </div>

            <div class="form-group">
                <label for="licensePlate">License Plate</label>
                <input type="text" name="licensePlate" id="licensePlate">
            </div> 

            <input type="hidden" name="parkingLocation" id="parkingLocation" value="<?php echo $parkingLocation; ?>">

            <button>Book</button>
        </form>
    </div>
        

</body>
</html>