<?php
    include "../../config/connect.php";

    $name           = $_POST['name'];
    $password       = $_POST['password'];
    $address        = $_POST['address'];
    $phone          = $_POST['phone'];
    $email          = $_POST['email'];
    $ktp            = $_POST['ktp'];
    $dob            = $_POST['dob'];
    $joinDate       = $_POST['join-date'];
    
    $targetDir      = "/assets/media/staff";
    $ppName         = $_FILES['profile-picture']['name'];
    $tmpName        = $_FILES['profile-picture']['tmp_name'];
    $fileSize       = $_FILES['profile-picture']['size'];    
    $fileExtension  = substr($ppName, strrpos($ppName, '.'));
    $filePath       = $targetDir.'/'.$ppName;
    
    $uploadSuccess  = true;

    if ($fileSize > 2000000) {
        echo "File too large";
        $uploadSuccess = false;
    }

    if ($_FILES['profile-picture']['name'] == '') {
        $uploadSuccess = false;
    }
    
    if ($uploadSuccess) {
        move_uploaded_file($tmpName, '../../../assets/media/staff/'.$ppName);
        
        $query = "INSERT INTO MsStaff (StaffName, StaffPassword, StaffPhone, StaffAddress, StaffEmail, StaffProfilePicture, StaffKTP, StaffJoinDate, StaffDob, StaffRole) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $params = array($name, $password, $phone, $address, $email, $filePath, $ktp, $joinDate, $dob, 'employee');
        
        $res = sqlsrv_query($conn, $query, $params);
            
        if ($res) {
            header('location: ../../views/parking/parkingOutHome.php');
        } else {
            echo "nope";
            die(print_r(sqlsrv_errors(), true));
        }
    } else {
        echo "Failed to upload file";
    }
    
?>