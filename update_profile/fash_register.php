<?php
$stmt = $connect->prepare("SELECT * FROM fash_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));

$userdata = $stmt->fetch();
$count = $stmt->rowCount();
if ($count > 0) {
?>
    <div class="profile_data update_profile">
        <div class="container">
            <div class="data">

                <form id="update_2" class="message_form ajax_form" action="upload_data/fash_register.php" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-lg-4">
                            <div class="info">
                                <?php
                                if (!empty($userdata['talent_image'])) { ?>
                                    <div class="personal_image">
                                        <img src="admin/upload/<?php echo $userdata['talent_image']; ?>" alt="">

                                    </div>
                                <?php
                                } else { ?>


                                    <div class="personal_image">
                                        <img src="uploads/avatar.png" alt="">

                                    </div>

                                <?php
                                }
                                ?>
                                <h2> <?php echo $userdata["first_name"];  ?> <?php echo $userdata["last_name"];  ?> </h2>
                                <p> <?php echo $userdata["email"];  ?></p>

                            </div>
                        </div>
                        <div class="col-lg-8">
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
                                                                    <label for="first_name"><?php echo $lang["first_name"];  ?><span class="star"> *
                                                                        </span></label>
                                                                    <input name="first_name" type="text" class="form-control" id="first_name" value="<?php echo $userdata['first_name']; ?>">
                                                                </div>

                                                                <div class="box mb-3">
                                                                    <label for="floatingInput">
                                                                        <?php echo $lang["email"];  ?> <span class="star"> *
                                                                        </span>
                                                                    </label>
                                                                    <input name="email" type="email" class="form-control" id="floatingInput" value="<?php echo $userdata['email']; ?>">
                                                                </div>
                                                                <div class="box mb-3">
                                                                    <label for="floatingInput"><?php echo $lang["username"];  ?><span class="star">
                                                                            * </span>
                                                                    </label>
                                                                    <input disabled name="username" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata['username']; ?>">
                                                                </div>
                                                                <div class="box mb-3">
                                                                    <!--
                                           <input name="mobile" type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com">-->
                                                                    <label for="floatingInput">
                                                                        <?php echo $lang["mobile"];  ?> <span class="star">
                                                                            * </span></label>
                                                                    <input type="tel" name="mobile" id="phone" class="form-control" value="<?php echo $userdata['mobile']; ?>">

                                                                </div>
                                                                <!--
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
                                                                    <option
                                                                        value="<?php echo $country["country_code"]; ?>">
                                                                        <?php echo $country["country_arName"]; ?>
                                                                    </option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                                    -->
                                                                <div class="box mb-3">
                                                                    <label for="floatingInput"><?php echo $lang["certificate"];  ?><span class="star"> *
                                                                        </span></label>

                                                                    <select name="certificate" class="form-select country9" id="floatingSelectGrid" aria-label="Floating label country2 example">

                                                                        <?php
                                                                        if (strlen($userdata["certificate"]) > 2) { ?>
                                                                            <option value="<?php echo $userdata["certificate"] ?>">
                                                                                <?php echo $userdata["certificate"] ?>
                                                                            </option>
                                                                        <?php
                                                                        } else { ?>
                                                                            <option value=""><?php echo $lang["select"];  ?>
                                                                            </option>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                        <option value=" <?php echo $lang["illiterate"];  ?> ">
                                                                            <?php echo $lang["illiterate"];  ?> </option>
                                                                        <option value=" <?php echo $lang["middle_school"];  ?>">
                                                                            <?php echo $lang["middle_school"];  ?> </option>
                                                                        <option value="<?php echo $lang["secondary"];  ?>">
                                                                            <?php echo $lang["secondary"];  ?> </option>
                                                                        <option value="<?php echo $lang["ba"];  ?>">
                                                                            <?php echo $lang["ba"];  ?>
                                                                        </option>
                                                                        <option value="<?php echo $lang["masters"];  ?> ">
                                                                            <?php echo $lang["masters"];  ?> </option>
                                                                    </select>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-12">
                                                                <div class="box mb-3">
                                                                    <label for="floatingInput">
                                                                        <?php echo $lang["last_name"];  ?><span class="star"> * </span></label>
                                                                    <input name="last_name" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata["last_name"] ?>">

                                                                </div>

                                                                <div class="box mb-3">
                                                                    <label for="floatingInput"><?php echo $lang["specialist"];  ?>
                                                                        <span class="star"> * </span></label>
                                                                    <input name="specialist" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata["specialist"] ?>">
                                                                </div>
                                                                <div class="box mb-3">
                                                                    <label for="floatingInput">
                                                                        <?php echo $lang["password"];  ?><span class="star">
                                                                            * </span></label>
                                                                    <input name="password" type="password" class="form-control passwordinput" id="floatingInput" value="<?php echo $userdata["password"] ?>">
                                                                    <i class="fa fa-eye"></i>
                                                                </div>
                                                                <div class=" mb-3">
                                                                    <div class="box mb-3">
                                                                        <label for="floatingInput">
                                                                            <?php echo $lang["Brief_about_you"]; ?> <span class="star">
                                                                                * </span></label>
                                                                        <textarea name="personal_information" class="form-control"><?php echo $userdata["personal_information"] ?></textarea>
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
                                                        <input name="project_name" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata["project_name"] ?>">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="floatingInput">
                                                            <?php echo $lang["project_filed"]; ?></label>
                                                        <input name="project_field" type="text" class="form-control" id="floatingInput" placeholder="" value="<?php echo $userdata["project_field"] ?>">

                                                    </div>
                                                    <!-- Do Design -->
                                                    <div class="prototype_deisgn">
                                                        <h4> <?php echo $lang["works_participated"]; ?> </h4>
                                                        <input class="" name="check_design" type="radio" value="" id="check_design1">
                                                        <label class="" for="check_design1">
                                                            <?php echo $lang["no"]; ?></label>
                                                        <input class="" name="check_design" type="radio" value="" id="check_design2">
                                                        <label class="" for="check_design2"> <?php echo $lang["yes"]; ?>
                                                        </label>
                                                        <div class="check_prototype_resualt">
                                                            <div class="form-group mb-3">
                                                                <label for=""> <?php echo $lang["What_competitions"]; ?>
                                                                </label>
                                                                <textarea name="project_competation" class="form-control" name="" id="floatingInput"><?php echo $userdata["project_competation"] ?></textarea>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Do first prototype -->
                                                    <div class="prototype_deisgn">
                                                        <h4> <?php echo $lang["work_received_awards"]; ?></h4>

                                                        <input class="" name="first_prototype" type="radio" value="" id="first_prototype1">
                                                        <label class="" for="first_prototype1"> <?php echo $lang["no"]; ?>
                                                        </label>

                                                        <input class="" name="first_prototype" type="radio" value="" id="first_prototype2">
                                                        <label class="" for="first_prototype2"> <?php echo $lang["yes"]; ?>
                                                        </label>

                                                        <div class="check_prototype_resualt">
                                                            <div class="form-group mb-3">
                                                                <label for=""> <?php echo $lang["Awards"]; ?> </label>
                                                                <textarea class="form-control" name="project_prize" id="floatingInput"> <?php echo $userdata["project_prize"] ?> </textarea>

                                                            </div>

                                                            <div class="col-lg-12">
                                                                <label> <?php echo $lang["Certificate_images"]; ?> </label>

                                                                <div class="box mb-3">
                                                                    <div class="upload-file">
                                                                        <div class="upload-wrapper">
                                                                            <label>
                                                                                <input type="file" name="project_certificate_image[]" id="files" multiple accept="image/*">
                                                                                <p> <a> <?php echo $lang["select_files"]; ?>
                                                                                    </a></p>
                                                                            </label> 
                                                                            
                                                                            <span class="files_type"> .jpg, .jpeg,
                                                                                .png, .gif </span>
                                                                                <p class='alert alert-info'>   <?php echo $lang['file_info']; ?> </p>
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
                                                                <input type="file" name="national_id[]" id="files2" multiple accept="image/*">
                                                                <p> <?php echo $lang["select_files"]; ?>
                                                                </p>
                                                            </label> 
                                                            <span class="files_type"> .jpg, .jpeg,
                                                                .png, .gif </span>
                                                                <p class='alert alert-info'>   <?php echo $lang['file_info']; ?> </p>
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
                                                <!-- ارفع الفيديوهات الخص  -->
                                                <label>
                                                    <p> <?php echo $lang["upload_video"]; ?>
                                                    </p>
                                                </label>

                                                <div class="box mb-3">
                                                    <div class="upload-file">
                                                        <div class="upload-wrapper">
                                                            <label>
                                                                <input type="file" name="talent_video[]" id="files4" multiple>
                                                                <p> <?php echo $lang["select_files"]; ?>
                                                                </p>
                                                            </label> 
                                                            <p class='alert alert-info'>   <?php echo $lang['file_info']; ?> </p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">

                                                            <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                        </div>
                                                    </div>
                                                    <output id="image-gallery4"></output>

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
                                                                <input type="file" name="certificate_image[]" id="files3" multiple accept=".doc, .docx, .pdf">
                                                                <p> <?php echo $lang["select_files"]; ?>
                                                                </p>
                                                            </label>
                                                            
                                                            
                                                            <span class="files_type"> .doc, .docs,
                                                                .pdf </span>
                                                                <p class='alert alert-info'>   <?php echo $lang['file_info']; ?> </p>
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

                                            <div class="col-lg-12">
                                                <label>
                                                    <p><?php echo $lang['talent_images']; ?>
                                                    </p>
                                                </label>

                                                <div class="box mb-3">
                                                    <div class="upload-file">
                                                        <div class="upload-wrapper">
                                                            <label>
                                                                <input type="file" name="talent_images[]" id="files5" multiple accept="image/*">
                                                                <p> <?php echo $lang["select_files"]; ?>
                                                                </p>
                                                            </label>
                                                            
                                                            
                                                            <span class="files_type"> .jpg, .jpeg,
                                                                .png </span> 
                                                                <p class='alert alert-info'>   <?php echo $lang['file_info']; ?> </p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">

                                                            <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                        </div>
                                                    </div>
                                                    <output id="image-gallery5"></output>

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
                                <?php echo $lang["account_update"]; ?></button>
                        </div>
                        <br>
                    </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    </form>

    <!-- Area to display the percent of progress -->
    <!-- area to display a message after completion of upload -->
    <div class="container">
        <div id='status'></div>
        <div class="my_progress">
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success" id="percent" role="progressbar" aria-label="Success striped example" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
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
<?php
}
?>