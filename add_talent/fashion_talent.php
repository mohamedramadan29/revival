<?php
 $username = $_GET["username"];
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

        foreach ($_FILES['project_certificate_image']['name'] as $key => $val) {
            $file = $_FILES['project_certificate_image']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp1 = $_FILES['project_certificate_image']['tmp_name'][$key];
            move_uploaded_file($file_tmp1, $uploadplace . $file);
            $location .= $file . " ";
        }
        /////////////////
        // START UPLOAD PROJECT PROTOTYPE TYPE (project_prototype)

        foreach ($_FILES['national_id']['name'] as $key => $val) {
            $file = $_FILES['national_id']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp2 = $_FILES['national_id']['tmp_name'][$key];
            move_uploaded_file($file_tmp2, $uploadplace . $file);
            $location2 .= $file . " ";
        }


        foreach ($_FILES['certificate_image']['name'] as $key => $val) {
            $file = $_FILES['certificate_image']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp3 = $_FILES['certificate_image']['tmp_name'][$key];
            move_uploaded_file($file_tmp3, $uploadplace . $file);
            $location3 .= $file . " ";
        }


        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];

        $specialist = $_POST["specialist"];
        $certificate = $_POST["certificate"];

        $project_name = $_POST["project_name"];
        $project_field = $_POST["project_field"];
        $project_competation = $_POST["project_competation"];
        $project_prize = $_POST["project_prize"];
        
        $personal_information = $_POST["personal_information"];

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
            
                $stmt = $connect->prepare("INSERT INTO company_register (first_name, last_name, email, mobile, specialist ,
                certificate, project_name,
                project_field,project_competation,project_prize,project_certificate_image,
                national_id,certificate_image,personal_information,username)
                VALUES (:zfname,:zlname,:zemail,:zmobile,:zspecialist,:zcertificate,
                :zproject_name,
                :zproject_field,:zproject_competition,:zproject_prize,:zproject_certificate_image,
                :znational_id,:zcertificate_image,:zpersonal_information,:zusername)");
                $stmt->execute(array(
                    "zfname"=>$first_name,
                    "zlname"=>$last_name,
                    "zemail"=>$email,
                    "zmobile"=>$mobile,
                    "zspecialist"=>$specialist,
                    "zcertificate"=>$certificate,
                    "zproject_name"=>$project_name,
                    "zproject_field"=>$project_field,
                    "zproject_competition"=>$project_competation,
                    "zproject_prize"=>$project_prize,
                    "zproject_certificate_image"=>$location,
                    "znational_id"=>$location2,
                    "zcertificate_image"=>$location3,
                    "zpersonal_information"=>$personal_information,
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
                                                                <input name="first_name" type="text"
                                                                    class="form-control" id="first_name"
                                                                    value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['first_name']; ?>">
                                                            </div>

                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["email"];  ?> <span class="star"> *
                                                                    </span>
                                                                </label>
                                                                <input name="email" type="email" class="form-control"
                                                                    id="floatingInput"
                                                                    value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['email']; ?>">
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
                                                                    value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['mobile']; ?>">

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
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["last_name"];  ?><span
                                                                        class="star"> * </span></label>
                                                                <input name="last_name" type="text" class="form-control"
                                                                    id="floatingInput"
                                                                    value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['last_name']; ?>">
                                                            </div>
                                                            <div class="box mb-3">
                                                                <label
                                                                    for="floatingInput"><?php echo $lang["specialist"];  ?>
                                                                    <span class="star"> * </span></label>
                                                                <input name="specialist" type="text"
                                                                    class="form-control" id="floatingInput"
                                                                    value=" <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['specialist']; ?>">
                                                            </div>
                                                            
                                                            <div class=" mb-3">
                                                                <div class="box mb-3">
                                                                    <label for="floatingInput">
                                                                        <?php echo $lang["Brief_about_you"]; ?> <span
                                                                            class="star">
                                                                            * </span></label>
                                                                    <textarea name="personal_information"
                                                                        class="form-control"><?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['personal_information']; ?></textarea>
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
                    <div class="row">
                        <div class="experience data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="check_exp">
                                        <h4> <?php echo $lang["existing_project"]; ?> </h4>
                                        <div class="main_check">
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp1">
                                            <label class="" for="check_exp1"> <?php echo $lang["no"]; ?> </label>
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp2">
                                            <label class="" for="check_exp2"> <?php echo $lang["yes"]; ?> </label>
                                            <div class="check_exp1_project">
                                                <div class="form-group mb-3">
                                                    <label for="floatingInput">
                                                        <?php echo $lang["project_name"]; ?></label>
                                                    <input name="project_name" type="text" class="form-control"
                                                        id="floatingInput"
                                                        value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['project_name']; ?>">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="floatingInput">
                                                        <?php echo $lang["project_filed"]; ?></label>
                                                    <input name="project_field" type="text" class="form-control"
                                                        id="floatingInput" placeholder=""
                                                        value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['project_field']; ?>">

                                                </div>
                                                <!-- Do Design -->
                                                <div class="prototype_deisgn">
                                                    <h4> <?php echo $lang["works_participated"]; ?> </h4>
                                                    <input class="" name="check_design" type="radio" value=""
                                                        id="check_design1">
                                                    <label class="" for="check_design1">
                                                        <?php echo $lang["no"]; ?></label>
                                                    <input class="" name="check_design" type="radio" value=""
                                                        id="check_design2">
                                                    <label class="" for="check_design2"> <?php echo $lang["yes"]; ?>
                                                    </label>
                                                    <div class="check_prototype_resualt">
                                                        <div class="form-group mb-3">
                                                            <label for=""> <?php echo $lang["What_competitions"]; ?>
                                                            </label>
                                                            <textarea name="project_competation" class="form-control"
                                                                name=""
                                                                id="floatingInput"><?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['project_competation']; ?></textarea>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Do first prototype -->
                                                <div class="prototype_deisgn">
                                                    <h4> <?php echo $lang["work_received_awards"]; ?></h4>

                                                    <input class="" name="first_prototype" type="radio" value=""
                                                        id="first_prototype1">
                                                    <label class="" for="first_prototype1"> <?php echo $lang["no"]; ?>
                                                    </label>

                                                    <input class="" name="first_prototype" type="radio" value=""
                                                        id="first_prototype2">
                                                    <label class="" for="first_prototype2"> <?php echo $lang["yes"]; ?>
                                                    </label>

                                                    <div class="check_prototype_resualt">
                                                        <div class="form-group mb-3">
                                                            <label for=""> <?php echo $lang["Awards"]; ?> </label>
                                                            <textarea class="form-control" name="project_prize"
                                                                id="floatingInput"><?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['project_prize']; ?></textarea>

                                                        </div>

                                                        <div class="col-lg-12">
                                                            <label> <?php echo $lang["Certificate_images"]; ?> </label>

                                                            <div class="box mb-3">
                                                                <div class="upload-file">
                                                                    <div class="upload-wrapper">
                                                                        <label>
                                                                            <input type="file"
                                                                                name="project_certificate_image[]"
                                                                                id="files" multiple accept="image/*">
                                                                            <p> <a> <?php echo $lang["select_files"]; ?>
                                                                                </a></p>
                                                                        </label>
                                                                        <span class="files_type"> .jpg, .jpeg,
                                                                            .png, .gif </span>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="row">

                                        <div class="col-lg-12">
                                            <label> <?php echo $lang["national_id_image"]; ?> </label>

                                            <div class="box mb-3">
                                                <div class="upload-file">
                                                    <div class="upload-wrapper">
                                                        <label>
                                                            <input type="file" name="national_id[]" id="files2" multiple
                                                                accept="image/*">
                                                            <p> <?php echo $lang["select_files"]; ?>
                                                            </p>
                                                        </label>
                                                        <span class="files_type"> .jpg, .jpeg,
                                                            .png, .gif </span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">

                                                        <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                    </div>
                                                </div>
                                                <output id="image-gallery2"></output>

                                            </div>

                                            <!--     <input class="form-control" type="file" name="cv[]" id="" multiple> -->

                                        </div>

                                        <div class="col-lg-12">
                                            <label>
                                                <p> <?php echo $lang["upload_cv_document"]; ?>
                                                </p>
                                            </label>

                                            <div class="box mb-3">
                                                <div class="upload-file">
                                                    <div class="upload-wrapper">
                                                        <label>
                                                            <input type="file" name="certificate_image[]" id="files3"
                                                                multiple accept=".doc, .docx, .pdf">
                                                            <p> <?php echo $lang["select_files"]; ?>
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
                                                <output id="image-gallery3"></output>

                                            </div>

                                            <!--     <input class="form-control" type="file" name="cv[]" id="" multiple> -->

                                        </div>

                                    </div>



                                </div>

                            </div>

                        </div>


                    </div>
                </div>
                <div class="">
                    <div class="reservation_button">
                        <button type="submit" class="btn main_button">
                            <?php echo $lang["add_talent"]; ?></button>
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
