<?php
ob_start();
session_start();
include 'init.php';
if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    $stmt = $connect->prepare('SELECT * FROM courses WHERE course_id =? ');
    $stmt->execute(array($course_id));
    $course_details = $stmt->fetch();
}
?>
<div class="course_details_page">
    <div class="container data">
        <h2> <?php
                if ($_SESSION["lang"] == "ar") {
                    echo $course_details["course_name"];
                } else {
                    echo $course_details["course_name_en"];
                }
                ?> </h2>
    </div>
</div>
<!-- START COURSE CONTENT -->
<div class="course_content_info">
    <div class="container">
        <div class="data">
            <div class="row">
                <div class="col-lg-8">
                    <div class="course_learn">
                        <h2> <?php echo $lang["what_learn_course"]; ?> </h2>
                        <ul class="list-unstyled">
                            <?php
                            if ($_SESSION["lang"] == "ar") {
                                $learn = $course_details['course_learn'];
                            } else {
                                $learn = $course_details['course_learn_en'];
                            }
                            $learn = explode(",", $learn);
                            $countfile = count($learn) - 1;
                            for ($i = 0; $i < $countfile; ++$i) { ?>
                            <li><i class="fa fa-check"></i> <?= $learn[$i] ?> </li>
                            <?php
                            }
                            ?>

                        </ul>

                    </div>
                    <div class="course_requiremt">
                        <h2>   <?php echo $lang["course_requirment"]; ?>  </h2>
                        <ul class="list-unstyled">
                            <?php
                            if ($_SESSION["lang"] == "ar") {
                                $learn = $course_details['course_requirement'];
                            } else {
                                $learn = $course_details['course_requirement_en'];
                            }
                            $learn = explode(",", $learn);
                            $countfile = count($learn) - 1;
                            for ($i = 0; $i < $countfile; ++$i) { ?>
                            <li><i class="fa fa-check"></i> <?= $learn[$i] ?> </li>
                            <?php
                            }
                            ?>

                        </ul>
                    </div>
                    <div class="course_description">
                        <h2>    <?php echo $lang["course_description"]; ?>   </h2>
                        <?php
                        if ($_SESSION["lang"] == "ar") { ?>
                        <p> <?php echo $course_details['course_description']; ?> </p>
                        <?php
                        } else { ?>
                        <p> <?php echo $course_details['course_description_en']; ?> </p>
                        <?php
                        }
                        ?>


                    </div>
                    <div class="course_who">
                        <h2>     <?php echo $lang["who_course"]; ?>  </h2>
                        <ul class="list-unstyled">
                            <?php
                            if ($_SESSION["lang"] == "ar") {
                                $learn = $course_details['how_course'];
                            } else {
                                $learn = $course_details['how_course_en'];
                            }
                            $learn = explode(",", $learn);
                            $countfile = count($learn) - 1;
                            for ($i = 0; $i < $countfile; ++$i) { ?>
                            <li><i class="fa fa-check"></i> <?= $learn[$i] ?> </li>
                            <?php
                            }
                            ?>

                        </ul>

                    </div>
                    <div class="course_instructor">
                        <h2>    <?php echo $lang["course_constuctor"]; ?>   </h2>
                        <h4> <?php echo $course_details['course_constructor']; ?> </h4>
                        <h6> <?php echo $course_details['course_constructor_learn']; ?> </h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="admin/upload/<?php echo $course_details['image1']; ?> " alt="">
                            </div>
                        </div>
                        <?php
                        if ($_SESSION["lang"] == "ar") { ?>
                        <p> <?php echo $course_details['course_constructor_info']; ?> </p>
                        <?php
                        } else { ?>
                        <p> <?php echo $course_details['course_constructor_info_en']; ?> </p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact_form register_course">
                        <div class="container">
                            <div class="data">
                            <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){
                                $first_name = $_POST["first_name"];
                                $last_name = $_POST["last_name"];
                                $email = $_POST["email"];
                                $mobile = $_POST["mobile"];
                                $country = $_POST["country"];
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
                                if (empty($errormessage)){
                                    
                                    $stmt = $connect->prepare("INSERT INTO course_register (first_name,last_name,email,mobile,country,course_id)
                                    VALUES(:zfirst_name,:zlast_name,:zemail,:zmobile,:zcountry,:zcourse_id)");
                                    $stmt->execute(array(
                                        "zfirst_name"=>$first_name,
                                        "zlast_name"=>$last_name,
                                        "zemail"=>$email,
                                        "zmobile"=>$mobile,
                                        "zcountry"=>$country,
                                        "zcourse_id"=>$course_id,
                                    )); if ($stmt) {

                                        $to_email = $email;
                                        $subject = " التسجيل في الكورس ";
                                        $body =  $lang["course_success_register"];
                                        $headers = "From: info@revivals.site";
                                        mail($to_email, $subject, $body, $headers)
            
                            ?>
                        <style>
                        .message_form {
                            display: none !important;
                        }
                        </style>
                        <div class='container'>
                            <div class='alert alert-success text-center'> <?php echo $lang["course_success_register"]; ?>
                            </div>
                        </div>
                        <?php
                                    }
                                }else{
                                    foreach ($errormessage as $message) { ?>
                                        <div class="error_message">
                                            <div class="alert alert-danger"> <?php echo $message ?> </div>
                                        </div>
                                        <?php
                                                    }
                                }

                               
                                }
                                ?>
                                <form action="" method="POST">
                                    <div class="row">
                                        <div class="col-lg-12 col-12">
                                            <div class="info">
                                                <h2> <?php echo $lang["register"]; ?> </h2>
                                                <div class="row">
                                                    <div class="col-lg-12 col-12">

                                                        <div class="box mb-3">
                                                            <label for="floatingInput"> <?php echo $lang["first_name"]; ?> </label>
                                                            <input name="first_name" type="text" class="form-control" id="floatingInput"
                                                                placeholder="" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['first_name']; ?>">

                                                        </div>
                                                        <div class="box mb-3">
                                                            <label for="floatingInput"> <?php echo $lang["last_name"]; ?> </label>
                                                            <input name="last_name" type="text" class="form-control" id="floatingInput"
                                                                placeholder="" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['last_name']; ?>">

                                                        </div>
                                                        <div class="box mb-3">
                                                            <label for="floatingInput">   <?php echo $lang["email"]; ?>  </label>
                                                            <input name="email" type="email" class="form-control" id="floatingInput"
                                                                placeholder="" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['email']; ?>">

                                                        </div>
                                                        <div class="box mb-3">

                                                            <label for="floatingInput"> <?php echo $lang["mobile"];  ?>
                                                                <span class="star">
                                                                    * </span></label>
                                                            <input type="tel" name="mobile" id="phone"
                                                                class="form-control"
                                                                value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['mobile']; ?> ">

                                                        </div>

                                                        <div class="box mb-3">
                                                            <label
                                                                for="selectcountry"><?php echo $lang["country"];  ?></label>
                                                            <select name="country" class="form-select country3"
                                                                id="selectcountry"
                                                                aria-label="Floating label select example">

                                                                <?php
                                                                if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                                                <option
                                                                    value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['country']; ?>">
                                                                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['country']; ?>
                                                                </option>
                                                                <?php
                                                                } else { ?>
                                                                <option value=""><?php echo $lang["select"];  ?>
                                                                </option>

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
                                                                <button type="submit" class="btn btn-primary">    <?php echo $lang["register"]; ?>
                                                                </button>
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END COURSE CONTENT -->
<!-- END HERO SECTION -->
<!-- START CONTACT FORM -->

<!-- END CONTACT FORM -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>