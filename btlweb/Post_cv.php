<?php
	require_once "change.php";
	if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
	}else{
        $id='';
	}
	require_once "connect.php";
		$sql = "SELECT * FROM users,imformation WHERE imformation.id=users.id and imformation.id = '$id'";
		$rs = mysqli_query($con,$sql);
		$fetch = mysqli_fetch_array($rs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="./css/stylechangepro.css" >
</head>
<!------ Include the above in your HEAD tag ---------->

<!--

-->
<body>
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<form action="change-pro.php" method="post" enctype="multipart/form-data">
				<div class="profile-userpic">
					<input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;"> 
					<?php
					if($fetch['avatar'] != ''){
					?>
						<img src="images/<?php echo $fetch['avatar'] ?>" width="80" onClick="triggerClick()" id="profileDisplay" style="margin-left:70px">    
					<?php
					}else{
					?>
					<img src="https://static.change.org/profile-img/default-user-profile.svg" class="img-responsive" onClick="triggerClick()" id="profileDisplay">
					<?php
					}
					?>
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
					<?php echo $fetch['name'] ?>
					</div>
					<div class="profile-usertitle-job">
						Developer
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="submit" name="save-user" class="btn btn-success btn-sm">ChangeAvatar</button>
					<button type="button" class="btn btn-danger btn-sm"><a href="change-pro.php">Cancer</a></button>
				</div>
				</form>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							 About</a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Services</a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Portfolio</a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>

		<form method="POST" name="change-pro">
			<div class="col-md-8">
				<div class="profile-content">
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $fetch['name'] ?>">
					<label for="">Age</label>
					<input type="date" name="age" class="form-control" placeholder="Age" value="<?php echo $fetch['Age'] ?>">
					<label for="">Sex</label>
					<input type="text" name="sex" class="form-control" placeholder="Male/Female" value="<?php echo $fetch['Sex'] ?>">
					<label for="">PhoneNumber</label>
					<input type="text" name="phonenumber" class="form-control" placeholder="PhoneNumber" value="<?php echo $fetch['PhoneNumber'] ?>">
					<label for="">YourCountry</label>
					<input type="text" name="yourcountry" class="form-control" placeholder="YourCountry" value="<?php echo $fetch['YourCountry'] ?>">
				</div>
				<div class="form-group">
				<button type="submit" class="btn btn-primary" id="btn">Change</button>
				<button type="button" class="btn btn-secondary" id="btn"><a href="change-pro.php">Close</a></button>
				</div>
				</div>
			</div>
		</form>
	</div>
</div>
<center>
<strong>Powered by HoanNguyen <a href="" target="_blank"></a></strong>
</center>
<br>
<br>
	<script src="./js/js.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>