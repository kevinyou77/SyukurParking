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
    <div class="login">
        <form action="../../libraries/customer/insertCustomer.php" onsubmit="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Name">
            </div>
            
            <div class="form-group">
                <label for="address">Address</label><br>
                <textarea name="address" id="address" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone" placeholder="Phone Number">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="profile-picture">Profile Picture</label>
                <input type="file" name="profile-picture" id="profile-picture">
            </div>
            <button id="register" name="register">Register</button>
        </form>
    </div>
</body>
</html>