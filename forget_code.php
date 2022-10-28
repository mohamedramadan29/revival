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
                    <?php
                    $code = substr(sha1(mt_rand()), 17, 6);
                    ?>
                    <p class="alert alert-info">  <?php echo $lang['send_code']; ?>  <?php echo $_SESSION['mail']; ?></p>
                    <label for=""> <?php echo $lang['please_enter_code'];?>  <span> * </span> </label>
                    <input class="form-control" type="text" name="code">
                </div>
                <div class="box">
                    
                    <input type="submit" value="<?php echo $lang['contin'];?> " class="btn btn-primary">
                </div>
            </form> <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $code = $_POST["code"];
                        $stmt = $connect->prepare("SELECT register.code,sport_register.code,fash_register.code,art_register.code
                        FROM register,sport_register,fash_register,art_register
                        WHERE register.code= ? || sport_register.code=? || fash_register.code=? || art_register.code=?");
                        $stmt->execute(array($code, $code, $code, $code));
                        $data = $stmt->fetch();
                        $count = $stmt->rowCount();
                        if ($count > 0) { 
                            header('Location:forget_password.php');  
                            if ($stmt) { ?> <div class="container"> 
                        </div> <?php 
                            }
                        } else {
                                ?> <div class="container">
                        <div class="alert alert-danger text-center mt-2 fw-bold"><?php echo $lang['incorrect_code'];?></div>
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