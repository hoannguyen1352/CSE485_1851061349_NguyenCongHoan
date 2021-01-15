<?php
    session_start();
    require_once "connect.php";

    $id = $_SESSION['id'];

    if(isset($_POST['name'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $phonenumber = $_POST['phonenumber'];
    $yourcountry = $_POST['yourcountry'];

    $sql06 = "UPDATE imformation SET name='$name',Age='$age',Sex='$sex',PhoneNumber='$phonenumber',YourCountry='$yourcountry' WHERE id='$id'";
    mysqli_query($con,$sql06);
    }

    if(isset($_POST["save-user"]))
    {
        $profileImageName = time().'_'. $_FILES['profileImage']['name'];
        $target = 'images/' . $profileImageName;
        
    if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)){
        $sql = "UPDATE imformation SET avatar='$profileImageName' WHERE id='$id'";
        mysqli_query($con,$sql);
        }
    }
?>