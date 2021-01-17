<?php
require_once "controllerUserData.php";
if (isset($_SESSION['status'])) {
} else {
	$_SESSION['status'] = 'notverified';
}

if (isset($_SESSION['id'])) {
	$id = $_SESSION['id'];
} else {
	$id = '';
}
$sql07 = "SELECT * FROM users WHERE id='$id'";
$rs01 = mysqli_query($con, $sql07);
$fetch05 = mysqli_fetch_all($rs01);
?>
<!doctype html>
<html lang="en">

<head>
	<title>Title</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="shortcut icon" href="images/icon.png">
	<link rel="stylesheet" type="text/css" href="./css/stylehome.css" />
	<link rel="stylesheet" href="./style.css">
	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<body>
	<section id="main">
		<!--navigation-------------------------------->
		<nav>
			<!--logo--->
			<?php
			if (($_SESSION['status'] == 'notverified')) {
			?>
				<a href="#" class="logo">WEBCV</a>
			<?php
			} else {
			?>
				<a href="#" class="logo" style="margin-left: 50px;"><?php echo $_SESSION['name'] ?></a>
			<?php
			}
			?>
			<!--menu--------->
			<div class="toggle"></div>
			<ul class="menu">
				<!-- <li class="active"><a href="#main" >Home</a></li>	 -->
				<!-- <li><a href="#about">About</a></li>	
            <li><a href="#services">Services</a></li>	
			<li><a href="#portfolio">Portfolio</a></li>	 -->
				<?php
				if ($_SESSION['status'] == 'notverified') {
				?>
					<li><a href="login-user.php">Login</a></li>
					<li><a href="signup-user.php">SignUp</a></li>
					<li><a href="watchcv.php">Watch CV</a></li>
				<?php
				} else {
				?>
					<?php
					if ($_SESSION['email'] != 'echmattrang@gmail.com') {
					?>
						<li><a href="test2.php">ChangeCV</a></li>
					<?php
					}
					?>
					<?php
					if (($_SESSION['email'] == 'echmattrang@gmail.com')) {
					?>
						<li><a href="member.php">Members</a></li>
					<?php
					}
					?>
					<li><a href="edit_pro.php">Change Profile</a></li>
					<li><a href="logout-user.php">Logout</a></li>
				<?php
				}
				?>
			</ul>
			<!--language-->
			<a href="#" class="lang">En</a>
		</nav>
		<!--name--------------------------->
		<div class="name">
			<!--hello------->
			<p>Hello</p>
			<!--name--->
			<h1>Create <font color="#17d1ac">a beautifull cv</font>
			</h1>
			<!--details--------------->
			<p class="details">if you want to create a new beautifull Curriculum Vitae.CV is also an important factor to help employers assess the suitability of candidates with the job they are recruiting or not.</p>
			<!--cv button-------------------->
			<?php
			if (isset($_SESSION['email']) && $_SESSION['email'] != 'echmattrang@gmail.com') {
			?>
				<?php
				if ($_SESSION['status'] != 'notverified') {
				?>
					<a href="form-cv.php" class="cv-btn">Go to CV</a>
				<?php
				}
				?>
			<?php
			}
			?>
		</div>
		<!--down arrow-------------->
		<div class="black-line"></div>
		<!--social---------------->
		<div class="social">
			<a href="#"><i class="fab fa-facebook-f"></i></a>
			<a href="#"><i class="fab fa-twitter"></i></a>
			<a href="#"><i class="fab fa-instagram"></i></a>
			<a href="#"><i class="fab fa-youtube"></i></a>
		</div>
	</section>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script type="text/javascript" src="js/JQuery3.3.1.js"></script>
	<script type="text/javascript">
		/*Responsive Navigation*/
		$(document).ready(function() {
			$('.toggle').click(function() {
				$('.toggle').toggleClass('active')

				$('nav ul').toggleClass('active-menu')
			})
		});
	</script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>