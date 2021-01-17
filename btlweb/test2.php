<?php
require_once "post.php";
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    $id = '';
}
require_once "connect.php";
$sql = "SELECT * FROM users,imformation WHERE imformation.id=users.id and imformation.id = '$id'";
$rs = mysqli_query($con, $sql);
$fetch = mysqli_fetch_array($rs);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/stylepost.css">
</head>

<body>
    <div class="row">
        <div class="col-md-3 a">
            <div class="profile-userpic">
                <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                <?php
                if (!isset($fetch['avatar'])) {
                ?>
                    <img src="https://static.change.org/profile-img/default-user-profile.svg" class="img-responsive" onClick="triggerClick()" id="profileDisplay">
                <?php
                } elseif ($fetch['avatar'] != '') {
                ?>
                    <img src="images/<?php echo $fetch['avatar'] ?>" width="80" onClick="triggerClick()" id="profileDisplay" style="margin-left:70px">
                <?php
                } else {
                ?>
                    <img src="https://static.change.org/profile-img/default-user-profile.svg" class="img-responsive" onClick="triggerClick()" id="profileDisplay">
                <?php
                }
                ?>
            </div>
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">About</a>
                <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Service</a>
                <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Portfolio</a>
                <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">HeadCV</a>
                <a href="index.php" class="nav-link">BackHome</a>
            </div>
        </div>
        <div class="col-md-7 b">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active images" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <h1>Please input information </h1>
                    <form action="test2.php" method="POST">
                        <div class="profile-content">
                            <div class="form-group">
                                <label>id_about</label>
                                <input type="text"  placeholder="Input id if you want to delete" name="a0" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label>title_about</label>
                                <input type="text" name="a1" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label>content_about</label>
                                <textarea class="form-control" name="a2" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="post-about" class="btn btn-primary" id="btn">Post</button>
                                <button type="submit" name="change-about" class="btn btn-primary" id="btn">Change</button>
                                <button type="submit" name="delete-about" class="btn btn-primary" id="btn">Delete</button>
                                <button type="button" class="btn btn-secondary" id="btn"><a href="test2.php">Cancer</a></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <h1>Please input information </h1>
                    <form action="test2.php" method="POST">
                        <div class="profile-content">
                            <div class="form-group">
                                <label>name_service</label>
                                <input type="text" name="a3" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label>content_service</label>
                                <textarea class="form-control" name="a4" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" name="a5">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="post-service" class="btn btn-primary" id="btn">Post</button>
                                <button type="button" class="btn btn-secondary" id="btn"><a href="test2.php">Cancer</a></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <h1>Please input information </h1>
                    <form action="test2.php" method="POST">
                        <div class="profile-content">
                            <div class="form-group">
                                <label>title_portfolio</label>
                                <input type="text" name="a6" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label>content_portfolio</label>
                                <textarea class="form-control" name="a7" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" name="a8">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="post-portfolio" class="btn btn-primary" id="btn">Post</button>
                                <button type="button" class="btn btn-secondary" id="btn"><a href="test2.php">Cancer</a></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <h1>Please input information </h1>
                    <form action="test2.php" method="POST">
                        <div class="profile-content">
                            <div class="form-group">
                                <label>ID_Content</label>
                                <input type="text" name="a9" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label>content_head_cv</label>
                                <textarea class="form-control" name="a10" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="post-content" class="btn btn-primary" id="btn">Post</button>
                                <button type="button" class="btn btn-secondary" id="btn"><a href="test2.php">Cancer</a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/js.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>