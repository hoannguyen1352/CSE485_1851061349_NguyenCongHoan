<?php
    require_once "connect.php";
    $current_page = 1;
    if(isset($_GET['page'])){
        $current_page = $_GET['page'];
    }
    $index = ($current_page-1)*5;
    $data = [];
    $sql05 = "SELECT * FROM users limit $index ,5";
    $result = mysqli_query($con,$sql05);
    $data = mysqli_fetch_array($result);
?>