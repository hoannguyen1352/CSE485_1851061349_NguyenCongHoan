<?php
    include "connect.php";
    $sql04 = "SELECT count(id) as sophantu FROM users ";
    $result = mysqli_query($con,$sql04);
    while($row = mysqli_fetch_array($result)){
        $data[] = $row;
    }
    $num = 0;
    if($data!= null && count($data)>0){
        $num = $data[0]['sophantu'];
    }
    $pages = ceil($num / 5);
?>