<?php
ob_start();
session_start();
include 'init.php';
?>
<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["reset_password"]; ?> </h2>
        </div>
    </div>
</div>
<div class="contact_form">
    <div class="container">
        <div class="data">
            <form class="message_form" action="#" method="post">
                <?php
                $email = $_SESSION['mail'];
                ?>
                <div class="box">
                    <label for=""> <?php echo $lang["new_password"]; ?> <span> * </span> </label>
                    <input class="form-control passwordinput" type="password" name="password" placeholder=""> <span> <i class="fa fa-eye"></i> </span>
                </div>
                <div class="box">
                    <input type="submit" value=" <?php echo $lang["reset"]; ?> " class="btn btn-primary">
                </div>
            </form> <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $password = $_POST["password"];
                        $stmt = $connect->prepare("UPDATE register SET password=? WHERE email=?");
                        $stmt->execute(array($password, $email));
                        $stmt = $connect->prepare("UPDATE sport_register SET password=? WHERE email=?");
                        $stmt->execute(array($password, $email));
                        $stmt = $connect->prepare("UPDATE fash_register SET password=? WHERE email=?");
                        $stmt->execute(array($password, $email));
                        $stmt = $connect->prepare("UPDATE art_register SET password=? WHERE email=?");
                        $stmt->execute(array($password, $email));
                        if ($stmt) {
                            unset($_SESSION['mail']);
                            ?> <div class="container">
                        <div class="alert alert-success text-center mt-2 fw-bold"> <?php echo $lang["update_password_succ"]; ?>
                            <a href="login.php"> | <?php echo $lang["login"]; ?> </a>
                        </div>
                    </div> <?php
                        }
                    }
                            ?>
        </div>
    </div>
</div>
<!-- END MAIN ABOUT --> <?php
                        include $tem . "footer_section.php";
                        include $tem . "footer.php";
                        ob_end_flush();

                        ?>
