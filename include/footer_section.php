<?php

// START GET EMAIL CONTENT  -->

$stmt = $connect->prepare("SELECT * FROM email_message WHERE email_section='الاشتراك في القائمة البريدية'");
$stmt->execute();
$sub_data = $stmt->fetchAll();

// END GET EMAIL CONTENT -->


?>


<br>
<div class="footer">
    <div class="container">
        <div class="row data">
            <div class="col-lg-4 copy_right">
                <h2> <?php echo $lang["footer_head1"]; ?></h2>
                <ul class="list-unstyled">
                    <li> <a href="mailto:info@revivals.site"> info@revivals.site </a> </li>
                    <li> <?php echo $lang["footer_p1"]; ?> </li>
                </ul>
                <p> <?php echo $lang["footer_p2"]; ?> | <a href="privacy_policy.php"><?php echo $lang["footer_p3"]; ?></a> </p>
            </div>
            <div class="col-lg-4 news_letter">
                <h2> <?php echo $lang["footer_head2"]; ?> </h2>
                <p> <?php echo $lang["footer_p4"]; ?>
                </p>
                <form action="" method="POST">
                    <input name="email" type="email" placeholder="<?php echo $lang["footer_email"]; ?> "><input name="send_mail" type="submit" value="<?php echo $lang["footer_subscripe"]; ?> ">
                </form>
                <?php
                if (isset($_POST['send_mail'])) {
                    $mail = $_POST['email'];
                    $stmt = $connect->prepare("SELECT * FROM subscribe WHERE sub_email=?");
                    $stmt->execute(array($mail));
                    $count = $stmt->rowCount();
                    if ($count > 0) {?>
                    <div class='alert alert-danger text-center'>
                         <?php echo $lang['subscribe_error']; ?>
                    </div>
                        <?php
                    } else {
                        $stmt = $connect->prepare("INSERT INTO subscribe (sub_email) VALUES(:zemail) ");
                        $stmt->execute(array(
                            "zemail" => $mail
                        ));
                        if ($stmt) {
                            $to_email = $mail;
                            $subject = "الاشتراك في القائمة البريدية";
                            foreach ($sub_data as $data) {
                                if ($_SESSION['lang'] == 'ar') {
                                    $body =  $data['email_text'];
                                } else {
                                    $body =  $data['email_text_en'];
                                }
                            }
                            $headers = "From: info@revivals.site";
                            mail($to_email, $subject, $body, $headers)
                ?>
                            <style>
                                .message_form {
                                    display: none !important;
                                }
                            </style>
                            <div class='container'>
                                <div class='alert alert-success text-center'>
                                    <?php
                                    foreach ($sub_data as $data) {
                                        if ($_SESSION['lang'] == 'ar') {
                                            echo   $data['email_text'];
                                        } else {
                                            echo  $data['email_text_en'];
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                <?php
                        }
                    }
                }

                ?>
            </div>
            <div class="col-lg-4 follow_us">
                <h2> <?php echo $lang["footer_head3"]; ?> </h2>
                <ul class="list-unstyled">
                    <li> <a target="blank" href="https://bit.ly/3zEfhO3"> <i class="fa fa-facebook"></i> </a> </li>
                    <li> <a target="blank" href="https://bit.ly/3vpcua8"> <i class="fa fa-instagram"></i> </a> </li>
                    <li> <a target="blank" href="https://bit.ly/3BtAVH2"> <i class="fa fa-twitter"></i> </a></li>
                    <li> <a target="blank" href="https://bit.ly/3bg4L7d"> <i class="fa fa-linkedin"></i> </a></li>
                    <li> <a target="blank" href="https://www.youtube.com/channel/UCAHQ9iZzTQeO4VpIzIQpKzw/featured"> <i class="fa fa-youtube"></i> </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>