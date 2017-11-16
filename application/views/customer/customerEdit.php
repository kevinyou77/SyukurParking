<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register - SyukurParking</title>
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <script src="../../assets/js/jquery-3.2.1.min.js"></script>
</head>
<body>

    <?php
        include "../../config/connect.php";
        session_start();

        if (isset($_SESSION['user-email'])) {
            $query = "SELECT * FROM MsCustomer WHERE CustomerEmail = '".$_SESSION['user-email']."'" ;
            $res = sqlsrv_query ($conn, $query, array(), array( "Scrollable" => 'static' ));
            
            if (sqlsrv_num_rows($res) == 1) {
                while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
                    $name      = $row['CustomerName'];
                    $email     = $row['CustomerEmail'];
                    $address   = $row['CustomerAddress'];
                    $phone     = $row['CustomerPhone'];
                    $password  = $row['CustomerPassword'];
                }
            }
    ?>
        <div class="login">
            <h3>Edit Profile - Customer</h3>
                <form action="../../libraries/customer/updateCustomer.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="email">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $name; ?>">
                    </div>
                   
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" id="address" cols="30" rows="10"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" value="<?php echo $phone; ?>">
                    
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $email; ?>">
                   
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php echo $password; ?>">
                    </div>

                    <label for="profile-picture">Profile Picture</label>
                    <input type="file" name="profile-picture" class="form-control" id="profile-picture">

                    <button id="register" name="register" class="btn btn-default">Register</button>
            </form>
        </div>
        
    <?php
        } else {
            echo "You don't have permission to open this page";
        }
    ?>
</body>
</html>