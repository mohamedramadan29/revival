<?php
ob_start();
session_start();
include 'init.php';
?>
<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["fashion_reg_head1"];  ?> </h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->

<!-- START CONTACT FORM -->
<?php
if (isset($_SESSION["username"])) { ?>
    <div class="registeration_message alert alert-danger text-center"> <?php echo $lang["ready_register"];  ?></div>
<?php
} else { ?>
    <div class="contact_form">
        <div class="container">
            <div class="data">

                <form id="first_form" class="message_form ajax_form" action="upload_forms/upload_fashion_register.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="info">

                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="box mb-3">
                                            <label for="floatingInput"><?php echo $lang["first_name"];  ?><span> * </span>
                                            </label>
                                            <input name="first_name" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['first_name']; ?>">

                                        </div>
                                        <div class="box mb-3">
                                            <label for="floatingInput"> <?php echo $lang["email"];  ?> <span> *
                                                </span></label>
                                            <input name="email" type="email" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['email']; ?>">

                                        </div>
                                        <div class="box mb-3">
                                            <label for="floatingInput"> <?php echo $lang["username"];  ?> <span class="star"> * </span>
                                            </label>
                                            <input name="username" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['username']; ?>">
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
                                            <label for="floatingInput"> <?php echo $lang["certificate"];  ?><span class="star"> *
                                                </span></label>

                                            <select name="certificate" class="form-select country9" id="floatingSelectGrid" aria-label="Floating label country2 example">

                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                                    <option value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['certificate']; ?>">
                                                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['certificate']; ?>
                                                    </option>
                                                <?php
                                                } else { ?>
                                                    <option value=""><?php echo $lang["select"];  ?></option>

                                                <?php
                                                }
                                                ?>

                                                <!--  <option value=""> الموهل العلمي </option> -->
                                                <option value=" <?php echo $lang["illiterate"];  ?> ">
                                                    <?php echo $lang["illiterate"];  ?> </option>
                                                <option value=" <?php echo $lang["middle_school"];  ?>">
                                                    <?php echo $lang["middle_school"];  ?> </option>
                                                <option value="<?php echo $lang["secondary"];  ?>">
                                                    <?php echo $lang["secondary"];  ?> </option>
                                                <option value="<?php echo $lang["ba"];  ?>"> <?php echo $lang["ba"];  ?>
                                                </option>
                                                <option value="<?php echo $lang["masters"];  ?> ">
                                                    <?php echo $lang["masters"];  ?> </option>
                                            </select>


                                        </div>
                                        <div class="box mb-3">
                                            <label for="floatingSelectGrid"><?php echo $lang["select_field"];  ?></label>
                                            <select name="field" class="form-select country" id="floatingSelectGrid" aria-label="Floating label country example">

                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                                    <option value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['field']; ?>">
                                                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['field']; ?>
                                                    </option>
                                                <?php
                                                } else { ?>
                                                    <option value=""><?php echo $lang["select"];  ?></option>

                                                <?php
                                                }
                                                ?>
                                                <?php
                                                $stmt = $connect->prepare("SELECT * FROM form_selection WHERE select_form='الأزياء والمجوهرات'");
                                                $stmt->execute();
                                                $mainfiled = $stmt->fetchAll();
                                                foreach ($mainfiled as $filed) {
                                                    if ($_SESSION["lang"] == "ar") {
                                                        $fileds = $filed['select_name'];
                                                    } else {
                                                        $fileds = $filed['select_name_en'];
                                                    } ?>
                                                    <option value="<?php echo $filed['select_id']; ?>"> <?php echo $fileds ?> </option>
                                                <?php
                                                }
                                                ?>

                                            </select>

                                        </div>


                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="box mb-3">
                                            <label for="floatingInput"> <?php echo $lang["last_name"];  ?><span class="star"> * </span> </label>
                                            <input name="last_name" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['last_name']; ?>">

                                        </div>

                                        <div class="box mb-3">
                                            <label for="floatingInput"><?php echo $lang["specialist"];  ?> <span class="star"> * </span></label>
                                            <input name="specialist" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['specialist']; ?>">
                                        </div>
                                        <div class="box mb-3">
                                            <label for="floatingInput"> <?php echo $lang["password"];  ?><span class="star">
                                                    * </span></label>
                                            <input name="password" type="password" class="form-control passwordinput" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['password']; ?>">
                                            <i class="fa fa-eye"></i>
                                        </div>

                                        <div class="box mb-3">
                                            <label for="floatingInput"> <?php echo $lang["confirm_password"];  ?><span class="star"> *
                                                </span></label>
                                            <input name="password_repeat" type="password" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['password_repeat']; ?>">
                                        </div>

                                        <div class="box mb-3">
                                            <label for="floatingSelectGrid"><?php echo $lang["select_sub_field"];  ?></label>
                                            <select name="sub_field" class="form-select country" id="floatingSelectGrid" aria-label="Floating label country example">

                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                                    <option value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['sub_field']; ?>">
                                                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['sub_field']; ?>
                                                    </option>
                                                <?php
                                                } else { ?>
                                                    <option value=""><?php echo $lang["select"];  ?></option>

                                                <?php
                                                }
                                                ?>
                                                <?php
                                                $stmt = $connect->prepare("SELECT * FROM form_selection WHERE select_form='الأزياء والمجوهرات'");
                                                $stmt->execute();
                                                $mainfiled = $stmt->fetchAll();
                                                foreach ($mainfiled as $filed) {
                                                    if ($_SESSION["lang"] == "ar") {
                                                        $fileds = $filed['select_sub_name'];
                                                    } else {
                                                        $fileds = $filed['select_sub_name_en'];
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
                                        <div class="box">
                                            <label for="register_type"> <?php echo $lang["register_type"];  ?><span class="star"> *
                                                </span></label>
                                            <select name="register_type" id="register_type" class="form-select country" id="register_type" aria-label="country example">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>


                                                    <option value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['register_type']; ?>">
                                                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['register_type']; ?>
                                                    </option>
                                                <?php
                                                } else { ?>
                                                    <option value=""><?php echo $lang["select"];  ?></option>
                                                <?php
                                                }
                                                ?>
                                                <option value="<?php echo $lang["Individually"];  ?> ">
                                                    <?php echo $lang["Individually"];  ?> </option>
                                                <option value=" <?php echo $lang["broker_company"];  ?> ">
                                                    <?php echo $lang["broker_company"];  ?> </option>
                                            </select>
                                        </div>
                                        <label> <?php echo $lang["talent_image"];  ?> </label>

                                        <div class="box mb-3">
                                            <div class="upload-file">
                                                <div class="upload-wrapper">
                                                    <label>
                                                        <input type="file" name="talent_image[]" id="files">
                                                        <p> <a> <?php echo $lang["select_image"];  ?> </a></p>
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
                        <div class="experience d-none">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="check_exp">
                                        <h4> هل لديك مشروع قائم </h4>
                                        <div class="main_check">
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp1">
                                            <label class="" for="check_exp1"> لا </label>
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp2">
                                            <label class="" for="check_exp2"> نعم </label>
                                            <div class="check_exp1_project">
                                                <div class="form-group mb-3">
                                                    <label for="floatingInput"> اسم المشروع </label>
                                                    <input name="project_name" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['project_name']; ?>">

                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="floatingInput"> مجال المشروع </label>
                                                    <input name="project_field" type="text" class="form-control" id="floatingInput" placeholder="" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['project_field']; ?>">

                                                </div>
                                                <!-- Do Design -->
                                                <div class="prototype_deisgn">
                                                    <h4> هل شاركت اعمالك في مسابقات أو معارض!</h4>
                                                    <input class="" name="check_design" type="radio" value="" id="check_design1">
                                                    <label class="" for="check_design1"> لا </label>
                                                    <input class="" name="check_design" type="radio" value="" id="check_design2">
                                                    <label class="" for="check_design2"> نعم </label>
                                                    <div class="check_prototype_resualt">
                                                        <div class="form-group mb-3">
                                                            <label for=""> ماهي المسابقات والمعارض التي شارك فيه؟ </label>
                                                            <textarea name="project_competation" class="form-control" name="" id="floatingInput"> <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['project_competation']; ?> </textarea>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Do first prototype -->
                                                <div class="prototype_deisgn">
                                                    <h4> هل حصل أعمالك على جوائز؟ </h4>

                                                    <input class="" name="first_prototype" type="radio" value="" id="first_prototype1">
                                                    <label class="" for="first_prototype1"> لا </label>

                                                    <input class="" name="first_prototype" type="radio" value="" id="first_prototype2">
                                                    <label class="" for="first_prototype2"> نعم </label>

                                                    <div class="check_prototype_resualt">
                                                        <div class="form-group mb-3">
                                                            <label for=""> الجوائز </label>
                                                            <textarea class="form-control" name="project_prize" id="floatingInput">  <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['project_prize']; ?> </textarea>

                                                        </div>
                                                        <div class="">
                                                            <div class="">
                                                                <label> صور الشهادات</label>
                                                                <input class="form-control" type="file" name="project_certificate_image[]" multiple id="">

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h4> البطاقة الوطنية </h4>
                                            <input class="form-control" type="file" name="national_id[]" id="" multiple>

                                        </div>
                                        <div class="col-lg-6">
                                            <h4>صورة من المستند</h4>
                                            <input class="form-control" type="file" name="certificate_image[]" id="" multiple>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 cars_sections">
                            <div class="item">
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="text">
                                        <h2 class="mb-0"><a href="#"> <?php echo $lang["fashion_reg_head1"];  ?></a></h2>
                                        <div class="terms_conditions">
                                            <input type="checkbox" id="checkterms" name="check_privacy">
                                            <label for="checkterms"> <?php echo $lang["iagree"];  ?>
                                                <a target="_blank" href="rev_terms.php?page=الأزياء والمجوهرات"> <?php echo $lang["terms"];  ?></a>
                                            </label>
                                        </div>
                                        <hr>
                                        <div class="">
                                            <div class="reservation_button">
                                                <button type="submit" class="btn btn-primary">
                                                    <?php echo $lang["register"];  ?> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Area to display the percent of progress -->
                <!-- area to display a message after completion of upload -->
                <div id='status'></div>
                <div class="my_progress">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" id="percent" role="progressbar" aria-label="Success striped example" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                </div>



                <!------------------------- END NEW CODE ------------------->


            </div>
        </div>
    </div>
    <!-- END CONTACT FORM -->
<?php
}
?>

<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>