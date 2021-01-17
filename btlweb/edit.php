<?php
    session_start();
    require_once "connect.php";

    $id = $_SESSION['id'];

    $sql01 = "SELECT * FROM imformation WHERE id='$id'";
    $rs = mysqli_query($con,$sql01);
    $fetch = mysqli_fetch_array($rs);

    if((isset($_POST['change-info'])) && (isset($fetch['name']))){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $phonenumber = $_POST['phonenumber'];
    $yourcountry = $_POST['yourcountry'];

    $sql06 = "UPDATE imformation SET name='$name',Age='$age',Sex='$sex',PhoneNumber='$phonenumber',YourCountry='$yourcountry' WHERE id='$id'";
    mysqli_query($con,$sql06);
    }


    if(isset($_POST['change-info']) && (!isset($fetch['name']))){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $phonenumber = $_POST['phonenumber'];
        $yourcountry = $_POST['yourcountry'];

        $sql06 = "INSERT INTO imformation (name,Age,Sex,PhoneNumber,YourCountry,id) VALUES('$name','$age','$sex','$phonenumber','$yourcountry','$id')";
        mysqli_query($con,$sql06);
    }

    if(isset($_POST["save-user"]) && (isset($fetch['avatar'])))
    {
        $profileImageName = time().'_'. $_FILES['profileImage']['name'];
        $target = 'images/' . $profileImageName;
        
    if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)){
        $sql = "UPDATE imformation SET avatar='$profileImageName' WHERE id='$id'";
        mysqli_query($con,$sql);
        }
    }
    
    if(isset($_POST["save-user"]) && (!isset($fetch['avatar']))){
        $profileImageName = time().'_'. $_FILES['profileImage']['name'];
        $target = 'images/' . $profileImageName;
        
    if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)){
        $sql = "INSERT INTO imformation(avatar,id) VALUES('$profileImageName','$id')";
        mysqli_query($con,$sql);
        }
    }    
?>