<?php
include "connect.php";

if(isset($_POST['useid'])){
    $useid = $_POST['useid'];
    $sql05 = "DELETE FROM about WHERE id = $useid";
    $sql06 = "DELETE FROM services WHERE id = $useid";
    $sql07 = "DELETE FROM head_cv WHERE id = $useid";
    $sql08 = "DELETE FROM portfolio WHERE id = $useid";
    mysqli_query($con,$sql05);
    mysqli_query($con,$sql06);
    mysqli_query($con,$sql07);
    mysqli_query($con,$sql08);
    header("location: manageCV.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <form action="" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="useid" value="<?php echo trim($_GET["useid"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="manageCV.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>