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
    <link rel="stylesheet" type="text/css" href="./css/stylewatchcv.css" />
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
                        <li><a href="test2.php">Change CV</a></li>
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
                    <li><a href="Change-Pro.php">Change Profile</a></li>
                    <li><a href="logout-user.php">Logout</a></li>
                <?php
                }
                ?>
            </ul>
            <!--language-->
            <a href="#" class="lang">En</a>
        </nav>
        <!--name--------------------------->

        <div class="container">
            <div class="row">
                <?php
                echo "<table class='table table-bordered table-striped'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Các bản CV</th>";
                echo "<th>Email</th>";
                echo "<th>LinkCV</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $current_page = 1;
                if(isset($_GET['page'])){
                    $current_page = $_GET['page'];
                }
                $index = ($current_page-1)*5;
                $data = [];
                $sql09 = "SELECT * FROM users limit $index ,5";
                $ketqua = mysqli_query($con, $sql09);
                foreach ($ketqua as $kq) {
                    echo "<tr>";
                    echo "<td>" . $kq['name'] . "</td>";
                    echo "<td>" . $kq['email'] . "</td>";
                    echo "<td>";
                    echo "<a href='ShowCV.php?useid=" . $kq['id'] . "' title='View Record' data-toggle='tooltip'>ClickHere</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                // }
                ?>
            </div>
            <!--down arrow-------------->
            <?php
            $sql04 = "SELECT count(id) as sophantu FROM users ";
            $result = mysqli_query($con, $sql04);
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            $num = 0;
            if ($data != null && count($data) > 0) {
                $num = $data[0]['sophantu'];
            }
            $pages = ceil($num / 5);
            ?>
            <!--social---------------->
            <div class="row" style="margin-top: 10px;">
                <div aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php
                        for ($i = 1; $i <= $pages; $i++) {
                            echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                        }
                        ?>
                    </ul>
                    </div>
            </div>
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