<?php
session_start();
require_once "connect.php";

$a1 = $_GET['useid'];
$_SESSION['useid'] = $a1;

if (isset($_POST['a2'])) {
    $a2 = $_POST['a2'];
    $a3 = $_POST['a3'];
    $a4 = $_POST['a4'];
    $a5 = $_POST['a5'];

    $sql06 = "UPDATE users SET name='$a2',email='$a3',code='$a5',status='$a4' WHERE id='$a1'";
    mysqli_query($con, $sql06);
}
?>
<?php
include 'connect.php';
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="fontawesome/js/all.js"></script>
    <!-- Bootstrap CSS -->
    <style>
        .form-group img {
            border: 1px solid black;
            border-radius: 50%;
        }

        .icon__icon {
            margin-left: 5px;
        }

        .table {
            margin-top: 200px;
        }

        .container-fluid {
            margin-top: 100px;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="./css/member.css">
</head>

<body class="body">
    <header>
        <nav class="navbar navbar-expand-sm header-top">
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
            </div>

            <div class="narr">
                <ul class="nav justify-content-end">
                </ul>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light header-bottom">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="home-page.php">Trang chủ<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="member.php">BackToMemBer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Liên hệ</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>

    <!-- modal -->
    <div class="modal fade" id="sign-up" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="sign-up.php" method="post">
                        <div class="form-group">
                            <label>First_name</label>
                            <input type="text" name="a2" class="form-control" placeholder="..." value="Hoan" required>
                        </div>
                        <div class="form-group">
                            <label>Last_name</label>
                            <input type="text" name="a3" class="form-control" placeholder="..." value="Nguyen" required>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="a4" class="form-control" placeholder="..." value="hoannguyen13520@gmail.com" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="a5" class="form-control" placeholder="..." value="hoan" required>
                        </div>

                        <div class="form-group">
                            <label>Re-Password</label>
                            <input type="password" name="a6" class="form-control" placeholder="..." value="hoan" required>
                        </div>

                        <div class="form-group">
                            <label>Class</label>
                            <input type="text" name="a8" class="form-control" placeholder="..." value="60TH4" required>
                        </div>

                        <div class="form-group">
                            <label>Address 1</label>
                            <input type="text" name="a9" class="form-control" placeholder="..." value="175 Tây Sơn" required>
                        </div>

                        <div class="form-group">
                            <label>Address 2</label>
                            <input type="text" name="a10" class="form-control" placeholder="..." value="ABCD" required>
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="a11" class="form-control" placeholder="..." value="Hà Nội" required>
                        </div>

                        <div class="form-group">
                            <label>State_country</label>
                            <input type="text" name="a12" class="form-control" placeholder="..." value="Ha Nam" required>
                        </div>

                        <div class="form-group">
                            <label>Zocde_pcode</label>
                            <input type="text" name="a13" class="form-control" placeholder="..." value="123213" required>
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="a14" class="form-control" placeholder="..." value="0213091232" required>
                        </div>

                        <div class="form-group">
                            <label>Paid</label>
                            <input type="text" name="a15" class="form-control" placeholder="..." value="yes" required>
                        </div>

                        <div class="form-group">
                            <label>Activation_code</label>
                            <input type="text" name="a16" class="form-control" placeholder="..." value="dasad2322" required>
                        </div>

                        <div class="form-group">
                            <label>Avatar</label>
                            <input type="text" name="a17" class="form-control" placeholder="..." value="asadasd" required>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="a18" class="form-control" placeholder="..." value="hoannguyen" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal"><a href="home.php">Close</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal login -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form action="login.php" method="post">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleDropdownFormEmail1">Email/UserName</label>
                            <input type="text" name="a01" class="form-control" placeholder="Email/UserName..." required>
                        </div>
                        <div class="form-group">
                            <label for="exampleDropdownFormPassword1">PassWord</label>
                            <input type="password" name="a02" class="form-control" placeholder="Password..." required>
                        </div>

                        <button type="submit" class="btn btn-primary" name="sign-in">Sign in</button>
                        <div class="dropdown-divider"></div>
                        <a type="button" class="dropdown-item" href="#" data-dismiss="modal" data-toggle="modal" data-target="#sign-up">
                            New around here? Sign Up
                        </a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="EditPro.php?useid=<?php echo $a1 ?>" method="post">
                        <?php
                        $sql = "SELECT * FROM users WHERE id= '$a1' ";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_all($result);

                        ?>
                        <?php
                            $sql01 = "SELECT * FROM imformation WHERE id ='$a1'";
                            $rs1 = mysqli_query($con, $sql01);
                            $fetch = mysqli_fetch_all($rs1);
                        if (!isset($fetch[0][6])){
                        ?>
                            <img src="https://static.change.org/profile-img/default-user-profile.svg">
                        <?php
                        } else{
                        ?>
                            <img src="images/<?php echo $fetch[0][6] ?>" width="80" style="margin-left:10px">
                        <?php
                        }
                        ?>
                        
                        <?php
                        foreach ($row as $a) {
                        ?>
                            <div class="form-group">
                                <input type="hidden" name="a1" class="form-control" placeholder="..." value="<?php echo $a1 ?>" required>
                            </div>
                            <div class="form-group">
                                <label>UserName</label>
                                <input type="text" name="a2" class="form-control" placeholder="..." value="<?php echo $a[1] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="a3" class="form-control" placeholder="..." value="<?php echo $a[2] ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Code</label>
                                <input type="text" name="a5" class="form-control" placeholder="..." value="<?php echo $a[4] ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" name="a4" class="form-control" placeholder="..." value="<?php echo $a[5] ?>" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-secondary"><a href="members.php">Close</a></button>
                            </div>
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js.js"></script>
    <script>
        $(document).ready(function() {
            $('#click-a').click(function() {
                window.location.href = 'changeimg.php?useid=<?php echo $a1 ?>';
            });
            triggerClick();
            displayImage();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>