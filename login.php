<?php
ob_start();
session_start();
$page_title = "تسجيل دخول";
include 'init.php';
?>
<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2><?php echo $lang["login"];  ?></h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<!-- START CONTACT FORM -->
<div class="contact_form">
    <div class="container">
        <div class="data">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $stmt = $connect->prepare("SELECT * FROM register WHERE username=? AND password=?");
                $stmt->execute(array($username, $password));
                $data = $stmt->fetch();
                $count = $stmt->rowCount();
                if ($count > 0) {
                    $_SESSION['username'] =  $username;
                    $_SESSION['userid'] = $data['reg_id'];

                    header('Location:profile.php');
                    exit();
                }
                $stmt = $connect->prepare("SELECT * FROM fash_register WHERE username=? AND password=?");
                $stmt->execute(array($username, $password));
                $data = $stmt->fetch();
                $count = $stmt->rowCount();
                if ($count > 0) {
                    $_SESSION['username'] =  $username;
                    $_SESSION['userid'] = $data['reg_id'];

                    header('Location:profile.php');
                    exit();
                }

                $stmt = $connect->prepare("SELECT * FROM sport_register WHERE username=? AND password=?");
                $stmt->execute(array($username, $password));
                $data = $stmt->fetch();
                $count = $stmt->rowCount();
                if ($count > 0) {
                    $_SESSION['username'] =  $username;
                    $_SESSION['userid'] = $data['reg_id'];

                    header('Location:profile.php');
                    exit();
                }
                $stmt = $connect->prepare("SELECT * FROM agency_register WHERE username=? AND password=?");
                $stmt->execute(array($username, $password));
                $data = $stmt->fetch();
                $count = $stmt->rowCount();
                if ($count > 0) {
                    $_SESSION['username'] =  $username;
                    $_SESSION['userid'] = $data['reg_id'];

                    header('Location:profile');
                    exit();
                }
                $stmt = $connect->prepare("SELECT * FROM art_register WHERE username=? AND password=?");
                $stmt->execute(array($username, $password));
                $data = $stmt->fetch();
                $count = $stmt->rowCount();
                if ($count > 0) {
                    $_SESSION['username'] =  $username;
                    $_SESSION['userid'] = $data['reg_id'];

                    header('Location:profile.php');
                    exit();
                } else { ?>
                    <div class="alert alert-danger">
                        <?php echo $lang["errorinusernameorpassword"];  ?>
                    </div>
            <?php
                }
            }


            ?>
            <form class="message_form" action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="info">

                            <div class="row">
                                <div class="col-lg-12 col-12">


                                    <div class="box mb-3">
                                        <label for="floatingInput"> <?php echo $lang["username"];  ?><span class="star">
                                                * </span>
                                        </label>
                                        <input name="username" type="text" class="form-control" id="floatingInput">
                                    </div>

                                    <div class="box mb-3">
                                        <label for="floatingInput"> <?php echo $lang["password"];  ?><span class="star">
                                                * </span></label>
                                        <input name="password" type="password" class="form-control passwordinput" id="floatingInput">
                                        <i class="fa fa-eye"></i>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 cars_sections">
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url(uploads/login.gif);">
                                </div>
                                <div class="text">
                                    <div class="login_section">
                                        <div class="reservation_button">
                                            <button type="submit" class="btn btn-primary"><?php echo $lang["login"];  ?></button>
                                        </div>
                                        <p> <a href="forget_email.php"><?php echo $lang["reset_password"];  ?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END CONTACT FORM -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>