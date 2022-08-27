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
                <div class="box">
                    <label for=""> <?php echo $lang["username"]; ?> <span> * </span> </label>
                    <input class="form-control" type="text" name="username" placeholder="Ex:myname@gmail.com">
                </div>
                <div class="box">
                    <label for=""> <?php echo $lang["new_password"]; ?> <span> * </span> </label>
                    <input class="form-control passwordinput" type="password" name="password" placeholder=""> <span> <i
                            class="fa fa-eye"></i> </span>
                </div>
                <div class="box">
                    <input type="submit" value=" <?php echo $lang["reset"]; ?> " class="btn btn-primary">
                </div>
            </form> <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $username = $_POST["username"];
                        $password = $_POST["password"];
                        $stmt = $connect->prepare("SELECT register.username,sport_register.username,fash_register.username,art_register.username
                         FROM register,sport_register,fash_register,art_register
                          WHERE register.username= ? || sport_register.username=? || fash_register.username=? || art_register.username=?");
                        $stmt->execute(array($username, $username, $username, $username));
                        $data = $stmt->fetch();
                        $count = $stmt->rowCount();
                        if ($count > 0) {
                            $stmt = $connect->prepare("UPDATE register SET password=? WHERE username=?");
                            $stmt->execute(array($password, $username));
                            $stmt = $connect->prepare("UPDATE sport_register SET password=? WHERE username=?");
                            $stmt->execute(array($password, $username));
                            $stmt = $connect->prepare("UPDATE fash_register SET password=? WHERE username=?");
                            $stmt->execute(array($password, $username));
                            $stmt = $connect->prepare("UPDATE art_register SET password=? WHERE username=?");
                            $stmt->execute(array($password, $username));
                            if ($stmt) { ?> <div class="container">
                <div class="alert alert-success text-center mt-2 fw-bold"> <?php echo $lang["update_password_succ"]; ?>
                    <a href="login.php"> | <?php echo $lang["login"]; ?> </a>
                </div>
            </div> <?php
                            }
                        } else {
                                ?> <div class="container">
                <div class="alert alert-danger text-center mt-2 fw-bold"> <?php echo $lang["usernameerror"]; ?> </div>
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