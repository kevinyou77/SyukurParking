<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <title>Syukur Parking</title>
</head>
    <body>
        <div class="login col-md-6">
            <?php
                session_start();
                
                if (isset($_SESSION['user-email'])) {
                    header('location: application/views/parking/parkingHome.php');
                } else if (isset($_SESSION['staff-email'])) {
                    header('location: application/views/parking/parkingOutHome.php');
                } else {
            ?>
            <h3>Syukur Parking</h3>
            <form action="application/libraries/customer/login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" placeholder="Email">
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                </div>
                
                <label for="remember-me">Remember Me</label>
                <input type="checkbox" name="remember-me" id="remember-me">

                <button id="sign-in" name="sign-in" class="btn btn-default">Sign in</button>

                <a href="application/views/staff/staffLogin.php">Login as Staff</a>
                <a href="#">I forgot my password</a>
                <a href="application/views/resetPassword.php">Reset my password</a>
                <a href="application/views/customer/customerRegister.php">Register a new membership</a>
            </form>

            <?php
                }
            ?>
        </div>
        
    </body>
</html>