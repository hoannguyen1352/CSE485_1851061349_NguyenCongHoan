<?php
    session_start();
    require "connect.php";
    $id = $_SESSION['id'];

    $a1 = "";
    $a2 = "";

    if(isset($_POST['post-about']) && isset($_POST['a1'])){
        $a1 = $_POST['a1'];
        $a2 = $_POST['a2'];
        $sql = "INSERT INTO about(title_about,content_about,id) VALUES('$a1','$a2','$id')";
        $rs = mysqli_query($con,$sql);
    }

    if(isset($_POST['change-about'])){
        $a0 = $_POST['a0'];
        $a1 = $_POST['a1'];
        $a2 = $_POST['a2'];
        $sql03 = "UPDATE about SET title_about='$a1',content_about='$a2' WHERE id='$id' and id_about='$a0'";
        $rs02 = mysqli_query($con,$sql03);
    }

    if(isset($_POST['delete-about'])){
        $a0 = $_POST['a0'];
        $sql06 = "DELETE FROM about WHERE id_about='$a0'";
        $rs06 = mysqli_query($con,$sql06);
    }


    if(isset($_POST['post-service']) && isset($_POST['a3'])){
        $a3 = $_POST['a3'];
        $a4 = $_POST['a4'];
        $a5 = $_POST['a5'];
        $sql02 = "INSERT INTO services(name_service,content_service,img,id) VALUES('$a3','$a4','$a5','$id')";
        $rs01 = mysqli_query($con,$sql02);
    }


    if(isset($_POST['post-portfolio']) && isset($_POST['a6'])){
        $a6 = $_POST['a6'];
        $a7 = $_POST['a7'];
        $a8 = $_POST['a8'];
        $sql04 = "INSERT INTO portfolio(title_portfolio,content_portfolio,img,id) VALUES('$a6','$a7','$a8','$id')";
        $rs04 = mysqli_query($con,$sql04);
    }

    if(isset($_POST['post-content']) && isset($_POST['a10'])){
        $a9 = $_POST['a9'];
        $a10 = $_POST['a10'];
        $sql05 = "INSERT INTO head_cv(id_head_cv,content_head_cv,id) VALUES('$a9','$a10','$id')";
        $rs05 = mysqli_query($con,$sql05);
    }
?>
