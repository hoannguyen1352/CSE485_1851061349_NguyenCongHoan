<?php
session_start();
include 'connect.php';
include 'tinhsotrang.php';
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
        td a {
            margin-right: 0px;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="./css/manageCV.css">
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
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="margin-left: 100px;">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Trang chủ<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Giới thiệu</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row">
            <?php
             require_once "connect.php";
             $current_page = 1;
             if(isset($_GET['page'])){
                 $current_page = $_GET['page'];
             }
             $index = ($current_page-1)*5;
             $data = [];
             $sql05 = "SELECT * FROM users,about WHERE about.id=users.id limit $index ,5";
             $result = mysqli_query($con,$sql05);
             $data = mysqli_fetch_array($result);
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Userame</th>";
            echo "<th>Email</th>";
            echo "<th>Title_About</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($result as $sanpham) {
                echo "<tr>";
                echo "<td>" . $sanpham['id_about'] . "</td>";
                echo "<td>" . $sanpham['name'] . "</td>";
                echo "<td>" . $sanpham['email'] . "</td>";
                echo "<td>" . $sanpham['title_about'] . "</td>";
                echo "<td>";
                echo "<a href='ShowCV.php?useid=" . $sanpham['id'] . "' title='View Record' data-toggle='tooltip'><svg xmlns='http://www.w3.org/2000/svg' viewBox='-2 -6 24 24' width='24' height='24' preserveAspectRatio='xMinYMin' class='icon__icon'><path d='M10 12c-5.042.007-10-2.686-10-6S4.984-.017 10 0c5.016.017 10 2.686 10 6s-4.958 5.993-10 6zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0-2a2 2 0 1 1 0-4 2 2 0 0 1 0 4z'></path></svg></a>";
                echo "<a href='deleteCV.php?useid=" . $sanpham['id'] . "' title='Delete Record' data-toggle='tooltip'><svg xmlns='http://www.w3.org/2000/svg' viewBox='-2 -5 24 24' width='24' height='24' preserveAspectRatio='xMinYMin' class='icon__icon'><path d='M14.414 7l1.414-1.414a1 1 0 0 0-1.414-1.414L13 5.586l-1.414-1.414a1 1 0 1 0-1.414 1.414L11.586 7l-1.414 1.414a1 1 0 1 0 1.414 1.414L13 8.414l1.414 1.414a1 1 0 1 0 1.414-1.414L14.414 7zM7.828 0H18a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H7.828a2 2 0 0 1-1.414-.586L.707 7.707a1 1 0 0 1 0-1.414L6.414.586A2 2 0 0 1 7.828 0z'></path></svg></a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            // }
            ?>
        </div>
        <?php
            $sql04 = "SELECT count(id) as spt FROM about ";
            $result = mysqli_query($con,$sql04);
            $r = mysqli_fetch_array($result);
            $pages = ceil($r['spt'] / 5);
        ?>
        <div class="row">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <= $pages; $i++) {
                        echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
