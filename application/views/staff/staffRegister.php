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
    <div class="login">
        <h3>SyukurParking - Staff Register</h3>
        <form action="../../libraries/staff/insertStaff.php" method="POST" onsubmit="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="email">Name</label>
            <input type="text" class="form-control"name="name" id="name" placeholder="Name">
        </div>
        

        <div class="form-group">
            <label for="ktp">KTP</label>
            <input type="number" class="form-control"name="ktp" id="ktp" placeholder="KTP">
        </div>
        

        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" class="form-control"id="address" cols="30" rows="10"></textarea>
        </div>
        

        <div class="form-group">
            <input type="radio" name="gender" value="male">Male<br>
            <input type="radio" name="gender" value="female">Female<br> 
        </div>
        

        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control"name="dob" id="dob" placeholder="Date of Birth">
        </div>
        

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control"name="phone" id="phone" placeholder="Phone Number">
        </div>

        <div class="form-group">
            <label for="dob">Join Date</label>
            <input type="date" class="form-control" name="join-date" id="join-date" placeholder="Join Date">
        </div>
        

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control"name="email" id="email" placeholder="Email">
        </div>
        
        
        <div class="form-group">
            <label for="password">Password</label>
         <input type="password" class="form-control"name="password" id="password" placeholder="Password">
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