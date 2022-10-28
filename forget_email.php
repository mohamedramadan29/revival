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
                    <label for=""> <?php echo $lang["email"]; ?> <span> * </span> </label>
                    <input class="form-control" type="text" name="email">
                </div>
                <div class="box">
                    <input type="submit" value=" <?php echo $lang['contin'];?> " class="btn btn-primary">
                </div>
            </form> <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $email = $_POST["email"];
                        $_SESSION['mail'] = $email;
                        $stmt = $connect->prepare("SELECT register.email,sport_register.email,fash_register.email,art_register.email
                        FROM register,sport_register,fash_register,art_register
                        WHERE register.email= ? || sport_register.email=? || fash_register.email=? || art_register.email=?");
                        $stmt->execute(array($email, $email, $email, $email));
                        $data = $stmt->fetch();
                        $count = $stmt->rowCount();
                        if ($count > 0) {
                            $stmt = $connect->prepare("UPDATE register SET code=? WHERE email=?");
                            $stmt->execute(array($code, $email));
                            $stmt = $connect->prepare("UPDATE sport_register SET code=? WHERE email=?");
                            $stmt->execute(array($code, $email));
                            $stmt = $connect->prepare("UPDATE fash_register SET code=? WHERE email=?");
                            $stmt->execute(array($code, $email));
                            $stmt = $connect->prepare("UPDATE art_register SET code=? WHERE email=?");
                            $stmt->execute(array($code, $email));
                            if ($stmt) { ?> <div class="container">
                            <div class="alert alert-success text-center mt-2 fw-bold"> تم ارسال الكود الخاص بك الي البريد الالكروني <?php echo $email ?>
                            </div>
                        </div> <?php
                                $to_email = $email;
                                $subject = $lang['reset_pass_revival'];
                                $body =  $lang['code_is'].$code.'';
                                $headers = "From: info@revivals.site";
                                mail($to_email, $subject, $body, $headers); 
                                header('Location:forget_code.php');  
                               

                            }
                        } else {
                                ?> <div class="container">
                        <div class="alert alert-danger text-center mt-2 fw-bold"> <?php echo $lang["emailerror"]; ?> </div>
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