<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register - SyukurParking</title>
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <script src="../../../assets/js/jquery-3.2.1.min.js"></script>
</head>
<body>
    <?php
        include "../../config/connect.php";
        session_start();

        if (isset($_SESSION['staff-email'])) {
            $query = "SELECT * FROM MsStaff WHERE StaffEmail = '".$_SESSION['staff-email']."'" ;
            $res = sqlsrv_query ($conn, $query, array(), array( "Scrollable" => 'static' ));
            
            if (sqlsrv_num_rows($res)) {
                while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
                    $name     = $row['StaffName'];
                    $email    = $row['StaffEmail'];
                    $address  = $row['StaffAddress'];
                    $phone    = $row['StaffPhone'];
                    $password = $row['StaffPassword'];
                    $ktp      = $row['StaffKTP'];
                }
            }
    ?>
    <div class="login">
    <h3>Edit Profile - Staff</h3>
        <form action="../../libraries/staff/updateStaff.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="email">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>">
            </div>    
        

            <div class="form-group">
                <label for="ktp">KTP</label>
                <input type="number" class="form-control" name="ktp" id="ktp" placeholder="KTP" value="<?php echo $ktp; ?>">
            </div>
            

            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" class="form-control" id="address" cols="30" rows="10"><?php echo $address ?></textarea>
            </div>
            

            <div class="form-group">
                <input type="radio" name="gender" value="male">Male<br>
                <input type="radio" name="gender" value="female" Female >Female<br>
            </div>
            

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth">  
            </div>
            

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $phone; ?>" placeholder="Phone Number">
            </div>
            

            <div class="form-group">
                <label for="dob">Join Date</label>
                <input type="date" class="form-control" name="join-date" id="join-date" placeholder="Join Date">
            </div>
            

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" placeholder="Email">
            </div>
            
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" value="<?php echo $password; ?>" placeholder="Password">
            </div>
            

            <div class="form-group">
                <label for="profile-picture">Profile Picture</label>
                <input type="file" class="form-control" name="profile-picture" id="profile-picture">   
            </div>

            <button id="register" name="register">Edit</button>
        </form>
    </div>
    
    <?php
        } else {
            echo "You don't have permission to open this page, login to continue";
        }
    ?>
</body>
</html>