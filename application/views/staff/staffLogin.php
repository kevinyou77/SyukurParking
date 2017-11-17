<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <script src="../../../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../../../assets/js/formValidation.js"></script>
    <title>Staff Login</title>
</head>
<body>
    <?php
        include "../../config/connect.php";
        session_start();
        
        if (isset($_SESSION['login-staff'])) {
            header('location: ../../parking/parkingOutHome.php');
        } else if (isset($_SESSION['login-user'])) {
            header('location: ../../booking/parkingBooking.php');
        } else {
    ?>
    <div class="login">
        <h3>SyukurParking - Staff</h3>
        <form action="../../libraries/staff/login.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>      
        
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>  

            <button>Login</button>
        </form>
    </div>
        

    <?php
        }
    ?>
</body>
</html>