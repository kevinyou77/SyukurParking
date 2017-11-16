<?php    
    include "../../config/connect.php";

    session_start();

    $name           = $_POST['name'];
    $password       = $_POST['password'];
    $address        = $_POST['address'];
    $phone          = $_POST['phone'];
    $email          = $_POST['email'];

    $userEmail      = $_SESSION['user-email'];

    $targetDir      = "/assets/media/customer";
    $ppName         = $_FILES['profile-picture']['name'];
    $tmpName        = $_FILES['profile-picture']['tmp_name'];
    $fileSize       = $_FILES['profile-picture']['size'];    
    $fileExtension  = substr($ppName, strrpos($ppName, '.'));
    $filePath       = $targetDir.'/'.$ppName;

    $allowedFileType = array('.jpg', '.png', '.JPG', '.jpeg');
    
    $uploadSuccess  = true;

    if ($fileSize > 2000000) {
        echo "File too large";
        $uploadSuccess = false;
    }
    
    if ($uploadSuccess) {
        if ($ppName) {  
            move_uploaded_file($tmpName, '../../../assets/media/customer/'.$ppName);
            $query = "UPDATE MsCustomer SET CustomerName = '".$name."', CustomerPassword = '".$password."', CustomerPhone = '".$phone."', CustomerAddress = '".$address."', CustomerEmail = '".$email."',CustomerProfilePicture = '".$filePath."' WHERE CustomerEmail = '".$userEmail."'";
        }
        
        $query = "UPDATE MsCustomer SET CustomerName = '".$name."', CustomerPassword = '".$password."', CustomerPhone = '".$phone."', CustomerAddress = '".$address."', CustomerEmail = '".$email."' WHERE CustomerEmail = '".$userEmail."'";
        
        $params = array($name, $password, $phone, $address, $email, $filePath);
        
        $res = sqlsrv_query($conn, $query, $params);
            
        if ($res) {
            echo "Success";
            // header("Location: ../../views/customerRegister.php");
        } else {
            echo "nope";
            die(print_r(sqlsrv_errors(), true));
        }        
    } else {
        echo "Failed to upload file";
    }
?>