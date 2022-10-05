<?php
ob_start();
session_start();
$artificial_event = 'artificial_event';
include 'init.php';
?>
<!-- START GET EMAIL CONTENT  -->
<?php
$stmt = $connect->prepare("SELECT * FROM email_message_event WHERE email_section='شارك في الفعالية'");
$stmt->execute();
$emaildata = $stmt->fetchAll();
?>
<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["share_event_h1"]; ?></h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<!-- START CONTACT FORM -->
<div class="contact_form">
    <div class="container">

        <div class="data">
            <!-- START CODE -->
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $file = '';
                $file_tmp = '';
                $location = "../../admin_event/upload";

                foreach ($_FILES['files1']['name'] as $key => $val) {
                    $file = $_FILES['files1']['name'][$key];
                    $file_tmp = $_FILES['files1']['tmp_name'][$key];
                    move_uploaded_file($file_tmp, $location . $file);
                    $location .= $file . " ";
                }

                $first_name = $_POST["first_name"];
                $last_name = $_POST["last_name"];
                $email = $_POST["email"];
                $mobile = $_POST["mobile"];
                $country = $_POST["country"];
                $message = $_POST["message"];
                $choose_you = $_POST["choose_you"];

                $errormessage = [];

                if (empty($first_name)) {
                    $errormessage[] = $lang["enter_first_name"];
                }

                if (empty($last_name)) {
                    $errormessage[] =  $lang["enter_last_name"];
                }
                if (empty($email)) {
                    $errormessage[] =  $lang["enter_email"];
                }
                if (empty($mobile)) {
                    $errormessage[] =  $lang["enter_mobile"];
                }
                if (empty($message)) {
                    $errormessage[] = $lang["enter_message"];
                }

                if (empty($errormessage)) {

                    $stmt = $connect->prepare("INSERT INTO share_event (first_name, last_name, email, mobile , country, message ,
    choose_you , files , event_id) 
        VALUES (:zfirst_name , :zlast_name , :zemail , :zmobile ,
         :zcountry , :zmessage ,
         :zchoose_you,:zfiles,:zevent_id)");
                    $stmt->execute(array(
                        "zfirst_name" => $first_name,
                        "zlast_name" => $last_name,
                        "zemail" => $email,
                        "zmobile" => $mobile,
                        "zcountry" => $country,
                        "zmessage" => $message,
                        "zchoose_you" => $choose_you,
                        "zfiles" => $location,
                        "zevent_id" => $event_id,
                    ));
                    if ($stmt) {
                        $to_email = $email;
                        $subject = "المشاركة في الفعالية ";
                        foreach ($emaildata as $data) {
                            if ($_SESSION['lang'] == 'ar') {
                                $body =  $data['email_text'];
                            } else {
                                $body =  $data['email_text_en'];
                            }
                        }
                        $headers = "From: info@revivals.site";
                        mail($to_email, $subject, $body, $headers);
                        //header("Location:profile.php");
            ?>
                        <style>
                            .message_form {
                                display: none !important;
                            }
                        </style>
                        <div class='container'>
                            <div class='alert alert-success text-center'>
                                <?php
                                foreach ($emaildata as $data) {
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
            <form class="message_form" action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="info">

                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="box mb-3">
                                        <label for="floatingInput"><?php echo $lang["first_name"]; ?> <span class="star"> *
                                            </span> </label>
                                        <input name="first_name" type="text" class="form-control" id="floatingInput" placeholder="" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['first_name']; ?>">

                                    </div>
                                    <div class="box  mb-3">
                                        <label for="floatingInput"> <?php echo $lang["email"]; ?> <span class="star"> *
                                            </span> </label>
                                        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['email']; ?>">

                                    </div>

                                    <div class="box mb-3">
                                        <label for="floatingTextarea"> <?php echo $lang["message"]; ?> </label>
                                        <textarea name="message" class="form-control" placeholder="" id="floatingTextarea"><?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['message']; ?></textarea>

                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="box  mb-3">
                                        <label for="floatingInput"> <?php echo $lang["last_name"]; ?> <span class="star"> *
                                            </span> </label>
                                        <input name="last_name" type="text" class="form-control" id="floatingInput" placeholder="" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['last_name']; ?>">
                                    </div>
                                    <div class="box mb-3">
                                        <!--
                                        <input name="mobile" type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com">-->
                                        <label for="floatingInput"> <?php echo $lang["mobile"];  ?> <span class="star">
                                                * </span></label>
                                        <input type="tel" name="mobile" id="phone" class="form-control" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['mobile']; ?>">

                                    </div>
                                    <div class="box mb-3">
                                        <label for="selectcountry"><?php echo $lang["country"];  ?></label>
                                        <select name="country" class="form-select country3" id="selectcountry" aria-label="Floating label select example">

                                            <?php
                                            if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                                <option value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['country']; ?>">
                                                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['country']; ?>
                                                </option>
                                            <?php
                                            } else { ?>
                                                <option value=""><?php echo $lang["select"];  ?></option>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            $stmt = $connect->prepare("SELECT * FROM countries");
                                            $stmt->execute();
                                            $allcountry = $stmt->fetchall();
                                            foreach ($allcountry as $country) { ?>
                                                <option value="<?php echo $country["country_code"]; ?>">
                                                    <?php
                                                    if ($_SESSION["lang"] == "ar") {
                                                        echo $country["country_arName"];
                                                    } else {
                                                        echo $country["country_enName"];
                                                    }
                                                    ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>

                                    </div>
                                    <div class="box mb-3">
                                        <label for="floatingSelectGrid"> <?php echo $lang["choose_are_you"];  ?> </label>
                                        <select name="choose_you" class="form-select country" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <?php
                                            if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                                <option value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['choose_you']; ?>">
                                                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['choose_you']; ?>
                                                </option>
                                            <?php
                                            } else { ?>
                                                <option value=""><?php echo $lang["select"];  ?></option>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            $stmt = $connect->prepare("SELECT * FROM  form_selection_event WHERE select_form='المشاركه في الفعالية'");
                                            $stmt->execute();
                                            $mainfiled = $stmt->fetchAll();
                                            foreach ($mainfiled as $filed) {
                                                if ($_SESSION["lang"] == "ar") {
                                                    $fileds = $filed['select_name'];
                                                } else {
                                                    $fileds = $filed['select_name_en'];
                                                }
                                                $fileds =  explode(",", $fileds);

                                                $countfile = count($fileds) - 1;
                                                for ($i = 0; $i < $countfile; ++$i) { ?>
                                                    <option value="<?= $fileds[$i] ?>"><?= $fileds[$i] ?></option>
                                                <?php
                                                }
                                                ?>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label> <?php echo $lang["files"];  ?> </label>
                                        <div class="box mb-3">
                                            <div class="upload-file">
                                                <div class="upload-wrapper">
                                                    <label>
                                                        <input type="file" name="files1[]" id="files" multiple>
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



                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12 cars_sections">
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="text">
                                    <div class="">
                                        <div class="reservation_button">
                                            <button type="submit" class="btn btn-primary">
                                                <?php echo $lang["register"];  ?></button>
                                        </div>
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