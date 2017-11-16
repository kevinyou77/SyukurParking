<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <script src="../../assets/js/jquery-3.2.1.min.js"></script>
    <title>Staff Login</title>
</head>
<body>
    
    <form action="../../libraries/customer/login.php" method="POST">
        <div class="login">
        <h3>SyukurParking - Customer Login</h3>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="password">

            </div>

            <button>Submit</button>
        </div>
        
        
       
    </form>
</body>
</html>