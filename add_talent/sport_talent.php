<?php
 
 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $file = '';
        $file_tmp = '';
        $location = "";
        $location2 = '';
        $location3 = '';
        $location4 = '';
        $location5 = '';
        $location6 = '';
        $location7 = '';
        $location8 = '';

        $uploadplace = "admin/upload/";

        // START UPLOAD PROJECT DESIGN (project_design)

        foreach ($_FILES['videos']['name'] as $key => $val) {
            $file = $_FILES['videos']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp1 = $_FILES['videos']['tmp_name'][$key];
            move_uploaded_file($file_tmp1, $uploadplace . $file);
            $location .= $file . " ";
        }
        /////////////////
        // START UPLOAD PROJECT PROTOTYPE TYPE (project_prototype)

        foreach ($_FILES['fiels']['name'] as $key => $val) {
            $file = $_FILES['fiels']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp2 = $_FILES['fiels']['tmp_name'][$key];
            move_uploaded_file($file_tmp2, $uploadplace . $file);
            $location2 .= $file . " ";
        }

        $first_name = $_POST["first_name2"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        //$country = $_POST["country"];
        $specialist = $_POST["specialist"];
        $certificate = $_POST["certificate"];

        //   $field = $_POST["field"];
        // $sub_field = $_POST["sub_field"];
        //$register_type = $_POST["register_type"];
        $experience_info = $_POST["experience_info"];
        $team_name = $_POST["team_name"];

        if (isset($_POST['team_register'])) {
            $team_register = 'yes';
        } else {
            $team_register = 'no';
        }

        $player_postion = $_POST["player_position"];
        $player_taller = $_POST["player_taller"];
        $player_weight = $_POST["player_weight"];
        //$username = $_POST["username"];
      
        //$password_repeat = $_POST["password_repeat"];

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
        if (empty($specialist)) {
            $errormessage[] = $lang["enter_specialist"];
        }
        if (empty($certificate)) {
            $errormessage[] = $lang["enter_cartificate"];
        }


        if (empty($errormessage)) {

            
                $stmt = $connect->prepare("INSERT INTO company_register (first_name, last_name , email,mobile,specialist,
                certificate,
                experience_info,team_name,team_register,player_weight,player_position,player_taller,video_talent,fiels_talent,username)
                VALUES(:zfname,:zlname,:zemail,:zmobile,:zspecialist,:zcertificate,:zexperience,:zteam_name,:zteam_register,:zplayer_weight,:zplayer_position,:zplayer_taller,:zvideo_talent,:zfiles_talent,:zusername) ");
                $stmt->execute(array(
                    "zfname"=>$first_name,
                    "zlname"=>$last_name,
                    "zemail"=>$email,
                    "zmobile"=>$mobile,
                    "zspecialist"=>$specialist,
                    "zcertificate"=>$certificate,
                    "zexperience"=>$experience_info,
                    "zteam_name"=>$team_name,
                    "zteam_register"=>$team_register, 
                    "zplayer_weight"=>$player_weight,
                    "zplayer_position"=>$player_postion,
                    "zplayer_taller"=>$player_taller,
                    "zvideo_talent"=>$location,
                    "zfiles_talent"=>$location2,
                    "zusername"=>$username
                ));
                if ($stmt) {
                    header("refresh: 3");

?>

<div class='container'>
    <div class='alert alert-success text-center'>
    <?php echo $lang['add_talent_suc'];  ?>
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




<div class="profile_data update_profile">
    <div class="container">
        <div class="data">

            <form class="message_form" action="" method="post" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="info2">
                            <div class="contact_form">
                                <div class="container">
                                    <div class="data">
                                        <!--------------------END PHP  CODE VALIDATION --------------->

                                        <div class="row">
                                            <div class="col-lg-12 col-12">
                                                <div class="info">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-12">

                                                            <div class="box mb-3">
                                                                <label
                                                                    for="first_name"><?php echo $lang["first_name"];  ?><span
                                                                        class="star"> *
                                                                    </span></label>
                                                                <input name="first_name2" type="text"
                                                                    class="form-control" id="first_name"
                                                                    value="">
                                                            </div>

                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["email"];  ?> <span class="star"> *
                                                                    </span>
                                                                </label>
                                                                <input name="email" type="email" class="form-control"
                                                                    id="floatingInput"
                                                                    value="">
                                                            </div>
                                                             
                                                            <div class="box mb-3">
                                                                <!--
                                           <input name="mobile" type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com">-->
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["mobile"];  ?> <span class="star">
                                                                        * </span></label>
                                                                <input type="tel" name="mobile" id="phone"
                                                                    class="form-control"
                                                                    value="">

                                                            </div>

                                                            <div class="box mb-3">
                                                                <label
                                                                    for="floatingInput"><?php echo $lang["certificate"];  ?><span
                                                                        class="star"> *
                                                                    </span></label>

                                                                <select name="certificate" class="form-select country9"
                                                                    id="floatingSelectGrid"
                                                                    aria-label="Floating label country2 example">

                                                                    <?php
                                                                        if (strlen($userdata["certificate"]) > 2) { ?>
                                                                    <option
                                                                        value="<?php echo $userdata["certificate"] ?>">
                                                                        <?php echo $userdata["certificate"] ?>
                                                                    </option>
                                                                    <?php
                                                                        } else { ?>
                                                                    <option value=""><?php echo $lang["select"];  ?>
                                                                    </option>

                                                                    <?php
                                                                        }
                                                                        ?>

                                                                    <option value=""><?php echo $lang["select"];  ?>
                                                                    </option>

                                                                    <option
                                                                        value=" <?php echo $lang["illiterate"];  ?> ">
                                                                        <?php echo $lang["illiterate"];  ?> </option>
                                                                    <option
                                                                        value=" <?php echo $lang["middle_school"];  ?>">
                                                                        <?php echo $lang["middle_school"];  ?> </option>
                                                                    <option value="<?php echo $lang["secondary"];  ?>">
                                                                        <?php echo $lang["secondary"];  ?> </option>
                                                                    <option value="<?php echo $lang["ba"];  ?>">
                                                                        <?php echo $lang["ba"];  ?>
                                                                    </option>
                                                                    <option value="<?php echo $lang["masters"];  ?> ">
                                                                        <?php echo $lang["masters"];  ?> </option>
                                                                </select>


                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["last_name"];  ?><span
                                                                        class="star"> * </span></label>
                                                                <input name="last_name" type="text" class="form-control"
                                                                    id="floatingInput"
                                                                    value="">

                                                            </div>

                                                            <div class="box mb-3">
                                                                <label
                                                                    for="floatingInput"><?php echo $lang["specialist"];  ?>
                                                                    <span class="star"> * </span></label>
                                                                <input name="specialist" type="text"
                                                                    class="form-control" id="floatingInput"
                                                                    value="">
                                                            </div>
                                                             

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="experience data">
                            <h4> خبراتك </h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="box mb-3">
                                        <label for="floatingInput"> اكتب نبذةعن خبراتك</label>
                                        <textarea class="form-control" name="experience_info"
                                            id="floatingInput"></textarea>

                                    </div>

                                    <div class="check_exp">
                                        <h4> هل تلعب فى نادي رسمى </h4>
                                        <div class="main_check">
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp1">
                                            <label class="" for="check_exp1"> لا </label>
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp2">
                                            <label class="" for="check_exp2"> نعم </label>
                                            <div class="check_exp1_project">
                                                <div class="form-group mb-3">
                                                    <label for="floatingInput"> اسم النادي </label>
                                                    <input name="team_name" type="text" class="form-control"
                                                        id="floatingInput" value="">

                                                </div>
                                                <!-- Do Design -->
                                                <div class="prototype_deisgn">
                                                    <h4> هل انت مسجل رسميا بعقد في قائمة النادي؟!</h4>
                                                    <input class="" name="team_register" type="radio" value="no"
                                                        id="check_design1">
                                                    <label class="" for="check_design1"> لا </label>
                                                    <input class="" name="team_register" type="radio" value="yes"
                                                        id="check_design2">
                                                    <label class="" for="check_design2"> نعم </label>

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="check_exp">
                                        <h4> هل انت لاعب كرة قدم</h4>
                                        <div class="main_check">
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp1">
                                            <label class="" for="check_exp1"> لا </label>
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp2">
                                            <label class="" for="check_exp2"> نعم </label>
                                            <div class="check_exp1_project">
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> العمر </label>
                                                    <input name="player_position" type="text" class="form-control"
                                                        id="floatingInput"
                                                        value="">
                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> الوزن</label>
                                                    <input name="player_weight" type="text" class="form-control"
                                                        id="floatingInput"
                                                        value="">
                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> الطول</label>
                                                    <input name="player_taller" type="text" class="form-control"
                                                        id="floatingInput"
                                                        value="">

                                                </div>

                                            </div>
                                        </div>

                                    </div>





                                </div>
                                <div class="col-lg-6">

                                    <div class="row">
                                        <div class="box mb-3">
                                            <div class="upload-file">
                                                <div class="upload-wrapper">
                                                    <label>
                                                        <input type="file" name="videos[]" id="files" multiple
                                                            accept="video/*">
                                                        <p> فيديو توضيح الموهبة
                                                        </p>
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
                                        <div class="box mb-3">
                                            <div class="upload-file">
                                                <div class="upload-wrapper">
                                                    <label>
                                                        <input type="file" name="fiels[]" id="files2" multiple
                                                            accept=".doc, .docx, .pdf">
                                                        <p> <?php echo $lang["upload_cv_document"]; ?>
                                                        </p>
                                                    </label>
                                                    <span class="files_type"> .doc, .docs,
                                                        .pdf </span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">

                                                    <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                </div>
                                            </div>

                                            <output id="image-gallery2"></output>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-12 cars_sections">
                                    <div class="item">
                                        <div class="car-wrap rounded ftco-animate">
                                            <div class="text">


                                                <div class="">
                                                    <div class="reservation_button">
                                                        <button type="submit" class="btn main_button"> <?php echo $lang["add_talent"]; ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
</div>
 