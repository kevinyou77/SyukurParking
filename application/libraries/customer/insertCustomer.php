<?php
    include "../../config/connect.php";

    $name           = $_POST['name'];
    $password       = $_POST['password'];
    $address        = $_POST['address'];
    $phone          = $_POST['phone'];
    $email          = $_POST['email'];
    
    $targetDir      = "/assets/media";
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
        move_uploaded_file($tmpName, '../../../assets/media/customer/'.$ppName);

        $query  = "INSERT INTO MsCustomer (CustomerName, CustomerPassword, CustomerPhone, CustomerAddress,CustomerEmail,CustomerProfilePicture) VALUES (?, ?, ?, ?, ?, ?)";
        $params = array($name, $password, $phone, $address, $email, $filePath);
        $res    = sqlsrv_query($conn, $query, $params);

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