<?php 
    require_once "controllerUserData.php"; 
    require_once "connect.php";
	if(isset($_SESSION['status'])){
	}else{
		$_SESSION['status'] = 'notverified';
    }
    
    // if(isset($_SESSION['email'])){
    //     $email = $_SESSION['email'];
	// }else{
    //     $email='';
	// }

	if(isset($_GET['useid'])){
        $id = $_GET['useid'];
	}else{
        $id='';
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Perosnal Portfolio Website</title>
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--title-icon--------->
<link rel="shortcut icon" href="images/icon.png">
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<!--using FontAwesome---------------->
<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<body>
	<!--main------------------------>
	<section id="main">
	<!--navigation-------------------------------->
	<nav>
	<!--logo--->
	<!--logo--->
	<?php
		if(($_SESSION['status'] == 'notverified')){
	?>
		<a href="index.php" class="logo">LOGO</a>
	<?php
		}else{
	?>
		<a href="index.php" class="logo"><?php echo $_SESSION['name'] ?></a>
	<?php
	}
	?>
	<!--menu--------->
	<div class="toggle"></div>
	<ul class="menu">
        <li class="active"><a href="index.php" >Home</a></li>	
        <?php
		if($_SESSION['status'] == 'notverified'){
		?>
			<li><a href="login-user.php">Login</a></li>		
            <li><a href="signup-user.php">SignUp</a></li>
		<?php
		}else{
		?>
			<li><a href="#about">About</a></li>	
			<li><a href="#services">Services</a></li>	
			<li><a href="#portfolio">Portfolio</a></li>		
			<li><a href="#contact-form">Contact</a></li>
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
    <!--name--->
    <?php 
		$sql01 = "SELECT * FROM users,head_cv WHERE head_cv.id = users.id and head_cv.id = '$id'"; 
		$res_head_cv = mysqli_query($con,$sql01);
		$fetch_info = mysqli_fetch_assoc($res_head_cv);
        if($res_head_cv && isset($fetch_info['content_head_cv'])){
            $content_head_cv = $fetch_info['content_head_cv'];
    ?>
    <?php
         $sql07 = "SELECT * FROM users WHERE users.id='$id'";
         $rs07 = mysqli_query($con,$sql07);
         $fet = mysqli_fetch_assoc($rs07);
         if($rs07){
    ?>
    <p>Hello</p>
    <h1>I'm <font color="#17d1ac"><?php echo $fet['name'] ?></font></h1>
    <?php
        }
    ?>
	<!--details--------------->
	<p class="details"><?php echo $fetch_info['content_head_cv'] ?></p>
	<!--cv button-------------------->
	<a href="#" class="cv-btn">Download Cv</a>
    <?php
        }else{
    ?>
        <p>Hello</p>
        <h1>I'm <font color="#17d1ac">Hoan</font>Nguyen</h1>
        <p class="details">if you want to create a new beautifull Curriculum Vitae.CV is also an important factor to help employers assess the suitability of candidates with the job they are recruiting or not.</p>
        <!-- <a href="#" class="cv-btn">Edit cv</a> -->
    <?php
        }
    ?>
	</div>
		<!--down arrow-------------->
	<div class="black-line" ></div>
	<!--social---------------->
	<div class="social">
	<a href="#"><i class="fab fa-facebook-f"></i></a>	
	<a href="#"><i class="fab fa-twitter"></i></a>
	<a href="#"><i class="fab fa-instagram"></i></a>
	<a href="#"><i class="fab fa-youtube"></i></a>	
	</div>
	
	</section>
	<!--about----------------------->
		
    <!--text---------------------->
    <?php 
        $sql = "SELECT * FROM users,about WHERE about.id = users.id and about.id = '$id'"; 
        $res_about = mysqli_query($con,$sql);
        if($res_about){
			$fetch_info = mysqli_fetch_assoc($res_about);
			if(isset($fetch_info['content_about'])){
            $title_about = $fetch_info['title_about'];
            $content_about = $fetch_info['content_about'];
    ?>
    <section id="about">
        <div class="about-text">
        <h1>About Us</h1>
        <h2><?php echo $fetch_info['title_about'] ?></h2>
        <p>Enjoy the ultimate web design editor. Divi is like Photoshop or Sketch for the web. It brings an advanced design interface to WordPress that both beginners and experts will fall in love with. It's incredibly smart, super flexible, amazingly powerful and visual by nature. This is how designing for the web is meant to be done.</p>
        <button>View More Details</button>
        </div>
        <!--about-model----------------->
        <div class="about-model">
        <img src="images/about-model.png" alt="model"/>	
        </div>
    </section>
    <?php
	}
	}
    ?>
	<?php 
        $sql = "SELECT * FROM users,services WHERE services.id = users.id and services.id = '$id'"; 
        $res_service = mysqli_query($con,$sql);
        if($res_service){
			$fetch_service = mysqli_fetch_assoc($res_service);
			if(isset($fetch_service['content_service'])){
    ?>
	<!--services-------------------->
	<section id="services">
	<!--heading-------------->
	<div class="s-heading">
	<h1>Services</h1>
	<p>Here Is The Some Servies Which We Provide You.</p>
	</div>
	<div class="b-container">
    <!--services-box-container--------->
    <?php
        foreach($res_service as $a){
    ?>
        <!--box-1---------------->
        <div class="s-box">
        <!--img------------->
        <div class="s-b-img">
            <!--type----------->
            <div class="s-type"><?php echo $a['name_service']?></div>
            <!--name------->
            <img src="images/<?php echo $a['img']?>">
        </div>
        <!--text----------------->
        <div class="s-b-text">
        <a href="#"><?php echo $a['content_service']?></a>	
        </div>
        </div>
    <?php
        }
    ?>
	</div>
    </section>
    <?php
			}
        }
    ?>
	<?php 
		$sql = "SELECT * FROM users,portfolio WHERE portfolio.id = users.id and portfolio.id = '$id'"; 
        $res_portfolio = mysqli_query($con,$sql);
        if($res_portfolio){
			$fetch_portfolio = mysqli_fetch_assoc($res_portfolio);
			if(isset($fetch_portfolio['content_portfolio'])){
	?>
	<!--portfolio------------------->
	<section id="portfolio">
	<!--heading----------->
	<h1 class="p-headind">Portfolio</h1>
	<div class="p-container">
	<?php 
		foreach($res_portfolio as $b){
	?>
		<!--portfolio-box-1-------->
		<div class="p-box">
		<!--text--------->
		<div class="overlay-text">
		<h1><?php echo $b['title_portfolio'] ?></h1>
		<p><?php echo $b['content_portfolio'] ?></p>	
		</div>
		<!--bg-img------------->
		<img src="images/<?php echo $b['img'] ?>">
		</div>
	<?php
		}
	?>
	</div>
	</section>
	<?php
		}
	}
	?>
	<!--Contact-btn------------------>
	<section id="contact-btn">
	<!--heading-------------->
	<h1 class="c-b-heading">If You Have Any Project In Your Mind ?</h1>
	<!--btn-------->
		<button >Contact Me</button>
	</section>
	<!--contact-form------------------->
	<section id="contact-form">
	<form method="POST">
		<!--left--------------------------------------->
		<div class="contact-left">
		<h1 class="c-l-heading"><font style="border-bottom: 3px solid #1ED98B;">Writ</font>e us</h1>
		<!--name-------->
		<div class="f-name">
		<font>Name</font>
		<input name="sent-name" type="text" placeholder="Full Name"/>
		</div>
		<!--email-------->
		<div class="f-email">
		<font >Email</font>
		<input name="sent-email" type="email" placeholder="Example@gmail.com"/>
		</div>
		</div>
		<!--right------------------------------------------->
		<div class="contact-right">
		<!--message-------->
		<div class="message">
		<font >Message</font>
		<textarea name="message" rows="5" cols="20" placeholder="Write Message..."></textarea>
		</div>
		<!--submit-btn------------>
		<button name="sent-message">submit</button>
		</div>
	</form>
	
	</section>
	
	<script type="text/javascript" src="js/JQuery3.3.1.js"></script>
	<script type="text/javascript">
	
		  /*Responsive Navigation*/
	  $(document).ready(function(){
	 $('.toggle').click(function(){
		 $('.toggle').toggleClass('active')
		 
		 $('nav ul').toggleClass('active-menu')
		
		 
	 })
 });
	
	</script>
</body>
</html>
