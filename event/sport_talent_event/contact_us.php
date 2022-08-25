<?php
ob_start();
session_start();
$talent_event = 'talent_event';
include 'init.php';
?>
<div class="cars hero faq">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["contact_us_head1"];  ?> </h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<!-- START CONTACT FORM -->
<div class="contact_form">
    <div class="container">
        <div class="data">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $user_name = $_POST["user_name"];
                        $user_email = $_POST["user_email"];
                        $user_message = $_POST["user_message"];

                        $errormessage = [];

                        if (empty($user_name)) {
                            $errormessage[] =  $lang['enter_username'];
                        }

                        if (empty($user_email)) {
                            $errormessage[] =  $lang['enter_email'];
                        }

                        if (empty($user_message)) {
                            $errormessage[] = $lang['enter_message'];
                        }

                        if (empty($errormessage)) {
                            $stmt = $connect->prepare("INSERT INTO contact_us (contact_name, contact_email, contact_message) 
                            VALUES (:zname, :zemail,:zmessage)");
                            $stmt->execute(array(
                                "zname" => $user_name,
                                "zemail" => $user_email,
                                "zmessage" => $user_message,
                            ));
                            if ($stmt) { ?>
                    <style>
                    .message_form {
                        display: none !important;
                    }
                    </style>
                    <div class='container'>
                        <div class='alert alert-success text-center'> <?php echo $lang["contact_us_succ_message"];  ?>
                        </div>
                    </div>
                    <?php
                            }
                        } else {
                            foreach ($errormessage as $message) { ?>
                    <div class="error_message">
                        <div class="alert alert-danger"> <?php echo $message ?> </div>
                    </div>
                    <?php
                            }
                        }
                    }
                    ?>
                    <form class="message_form" action="" method="post" enctype="multipart/form-data">
                        <div class="info">
                            <div class="box mb-3">
                                <label for="floatingInput"><?php echo $lang["name"];  ?> <span class="star"> *
                                    </span></label>
                                <input name="user_name" type="text" class="form-control" id="floatingInput">

                            </div>
                            <div class="box mb-3">
                                <label for="floatingInput"> <?php echo $lang["email"];  ?> <span
                                        class="star">*</span></label>
                                <input name="user_email" type="email" class="form-control" id="floatingInput">

                            </div>

                            <div class="box mb-3">
                                <label for="floatingTextarea"><?php echo $lang["message"];  ?> <span
                                        class="star">*</span></label>
                                <textarea name="user_message" class="form-control" id="floatingTextarea"></textarea>

                            </div>

                            <div class="col-lg-6">
                                <label> <?php echo $lang["files"];  ?> </label>

                                <div class="box mb-3">
                                    <div class="upload-file">
                                        <div class="upload-wrapper">
                                            <label>
                                                <input type="file" name="contact_files[]" id="files" multiple>
                                                <p> <a> <?php echo $lang["select_files"];  ?> </a></p>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">

                                            <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                        </div>
                                    </div>
                                    <output id="image-gallery"></output>

                                </div>

                                <!--     <input class="form-control" type="file" name="cv[]" id="" multiple> -->

                            </div>


                            <div>
                                <input class="btn btn-primary" type="submit" value="<?php echo $lang["send"];  ?>  ">
                            </div>
                        </div>
                    </form>

                </div>


                <div class="col-lg-6 col-12">
                    <div class="info">
                        <p><?php echo $lang["contact_p1"];  ?> </p>
                        <h2> <?php echo $lang["contact_us_head2"];  ?> </h2>

                        <ul class="list-unstyled">
                            <li> <i class="fa fa-location"> </i> <?php echo $lang["contact_us_address"];  ?>
                            </li>

                            <li> <i class="fa fa-envelope"> </i> <a href="mailto://info@car-rental.com">
                                    info@Revaval.com </a> </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END CONTACT FORM -->
<!-- START MAPS -->
<div class="map">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d950645.7063804097!2d39.77166654999316!3d21.450468415099117!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d01fb1137e59%3A0xe059579737b118db!2z2KzYr9ipINin2YTYs9i52YjYr9mK2Kk!5e0!3m2!1sar!2seg!4v1657182468579!5m2!1sar!2seg"
        height="600" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<!-- END MAPS -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>