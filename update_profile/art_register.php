<!-- ****
**
***
Attention Yastaaaaaaaaaaaaaaaa

Cv =====> Talent Video 

-->



<?php
$stmt = $connect->prepare("SELECT * FROM art_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));

$userdata = $stmt->fetch();
$count = $stmt->rowCount();
if ($count > 0) {


?>




    <div class="profile_data update_profile">
        <div class="container">
            <div class="data">

                <form id="update_1" class="message_form ajax_form" action="upload_data/art_register.php" method="post" enctype="multipart/form-data">
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

                                                                    <label for="floatingInput">
                                                                        <?php echo $lang["mobile"];  ?> <span class="star">
                                                                            * </span></label>
                                                                    <input type="tel" name="mobile" id="phone" class="form-control" value="<?php echo $userdata['mobile']; ?>">

                                                                </div>

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
                                <h4 class=""> <?php echo $lang["your_experiences"];  ?> </h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="box mb-3">
                                            <label for="floatingInput"> <?php echo $lang["Brief_about_you"];  ?> </label>
                                            <textarea name="experience_info" class="form-control" name="" id="floatingInput"><?php echo $userdata["experience_info"] ?></textarea>

                                        </div>
                                        <div class="box mb-3">
                                            <label for="floatingInput"> <?php echo $lang["language_speak"] ?> </label>
                                            <textarea name="language_speak" class="form-control" name="" id="floatingInput"><?php echo $userdata["language_speak"] ?></textarea>

                                        </div>
                                        <div class="check_exp">
                                            <h4> <?php echo $lang["have_innovations"];  ?> </h4>
                                            <div class="main_check">
                                                <input class="" name="check_exp" type="radio" value="" id="check_exp1">
                                                <label class="" for="check_exp1"><?php echo $lang["no"];  ?></label>
                                                <input class="" name="check_exp" type="radio" value="" id="check_exp2">
                                                <label class="" for="check_exp2"> <?php echo $lang["yes"];  ?> </label>
                                                <div class="check_exp1_project">
                                                    <div class="box mb-3">
                                                        <label for="floatingInput"> <?php echo $lang["project_name"];  ?>
                                                        </label>
                                                        <input name="project_name" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata["project_name"] ?>">
                                                    </div>
                                                    <div class="box mb-3">
                                                        <label for="floatingInput"> <?php echo $lang["about_project"]; ?>
                                                        </label>
                                                        <textarea name="project_details" class="form-control" name="" id="floatingInput"><?php echo $userdata["project_details"] ?></textarea>

                                                    </div>

                                                    <div class="box mb-3">
                                                        <label for="floatingInput"> <?php echo $lang["project_filed"]; ?>
                                                        </label>
                                                        <input name="project_field" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata["project_field"] ?>">

                                                    </div>
                                                    <div class="box mb-3">
                                                        <label for="floatingInput"> <?php echo $lang["techniques_used"]; ?>
                                                        </label>
                                                        <textarea name="project_tools" class="form-control" name="" id="floatingInput"><?php echo $userdata["project_tools"] ?></textarea>

                                                    </div>
                                                    <div class="box mb-3">
                                                        <label for="floatingInput"> <?php echo $lang["project_date"]; ?>
                                                        </label>
                                                        <input name="project_date" type="date" class="form-control" id="floatingInput" value="<?php echo $userdata["project_date"] ?>">

                                                    </div>
                                                    <!-- Do Design -->
                                                    <div class="prototype_deisgn" id="prototype_deisgn">
                                                        <h4> <?php echo $lang["do_design"]; ?> </h4>
                                                        <input class="" name="check_design" type="radio" value="" id="check_design1">
                                                        <label class="" for="check_design1"><?php echo $lang["no"]; ?>
                                                        </label>
                                                        <input class="" name="check_design" type="radio" value="" id="check_design2">
                                                        <label class="" for="check_design2"> <?php echo $lang["yes"]; ?>
                                                        </label>
                                                        <div class="check_prototype_resualt">
                                                            <label> <?php echo $lang["attach_the_design"]; ?></label>
                                                            <div class="box mb-3">
                                                                <div class="upload-file">
                                                                    <div class="upload-wrapper">
                                                                        <label>
                                                                            
                                                                            <input type="file" name="project_design[]" id="files" multiple>
                                                                            <p> <a> <?php echo $lang["select_files"]; ?></a>
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

                                                                <output id="image-gallery"></output>


                                                            </div>
                                                            <!--     <input type="file" name="project_design[]" class="form-control"
                                                        multiple> -->

                                                        </div>
                                                    </div>
                                                    <!-- Do first prototype -->
                                                    <div class="prototype_deisgn">
                                                        <h4> <?php echo $lang["prototype_project"]; ?> </h4>

                                                        <input class="" name="first_prototype" type="radio" value="" id="first_prototype1">
                                                        <label class="" for="first_prototype1"> <?php echo $lang["no"]; ?>
                                                        </label>

                                                        <input class="" name="first_prototype" type="radio" value="" id="first_prototype2">
                                                        <label class="" for="first_prototype2"> <?php echo $lang["yes"]; ?>
                                                        </label>

                                                        <div class="check_prototype_resualt">
                                                            <label> <?php echo $lang["select_files"]; ?></label>
                                                            <div class="box mb-3">
                                                                <div class="upload-file">
                                                                    <div class="upload-wrapper">
                                                                        <label> 
                                                                            <input type="file" name="project_prototype[]" id="files2" multiple>
                                                                            <p> <a> <?php echo $lang["select_files"]; ?></a>
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
                                                                <output id="image-gallery2"></output>

                                                            </div>
                                                            <!--   <input class="form-control" type="file" name="project_prototype[]"
                                                        id="" multiple> -->

                                                        </div>
                                                    </div>
                                                    <!-- Do Project Video -->
                                                    <div class="prototype_deisgn">
                                                        <h4> <?php echo $lang["do_video"]; ?> </h4>

                                                        <!--  <input class="" name="project_video" type="radio" value=""
                                                    id="project_video1"> -->
                                                        <label class="" for="project_video1"> <?php echo $lang["no"]; ?>
                                                        </label>

                                                        <input class="" name="project_video" type="radio" value="" id="project_video2">
                                                        <label class="" for="project_video2"> <?php echo $lang["yes"]; ?>
                                                        </label>

                                                        <div class="check_prototype_resualt">
                                                            <label> <?php echo $lang["select_files"]; ?></label>

                                                            <div class="box mb-3">
                                                                <div class="upload-file">
                                                                    <div class="upload-wrapper">
                                                                        <label>
                                                                            <input type="file" name="project_video[]" id="files3" multiple>
                                                                            <p> <a> <?php echo $lang["select_files"]; ?></a>
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
                                                                <output id="image-gallery3"></output>

                                                            </div>

                                                            <!--  <input class="form-control" type="file" name="project_video[]" id=""
                                                        multiple> -->

                                                        </div>
                                                    </div>
                                                    <!-- شهادة براءة اختراع -->
                                                    <div class="prototype_deisgn">
                                                        <h4><?php echo $lang["patent_certificate"]; ?> </h4>
                                                        <input class="" name="project_certificate" type="radio" value="" id="project_certificate1">
                                                        <label class="" for="project_certificate1">
                                                            <?php echo $lang["no"]; ?> </label>
                                                        <input class="" name="project_certificate" type="radio" value="" id="project_certificate2">
                                                        <label class="" for="project_certificate2">
                                                            <?php echo $lang["yes"]; ?> </label>
                                                        <div class="check_prototype_resualt">
                                                            <label> <?php echo $lang["select_files"]; ?></label>
                                                            <div class="box mb-3">
                                                                <div class="upload-file">
                                                                    <div class="upload-wrapper">
                                                                        <label>
                                                                            <input type="file" name="project_certificate[]" id="files4" multiple>
                                                                            <p> <a> <?php echo $lang["select_files"]; ?>
                                                                                </a>
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
                                                            <!--<input class="form-control" type="file" name="project_certificate[]"
                                                        id="" multiple> -->

                                                        </div>
                                                    </div>
                                                    <!-- Do You Share Project -->
                                                    <div class="prototype_deisgn">
                                                        <h4><?php echo $lang["project_competitions"]; ?> </h4>

                                                        <input class="" name="share_project" type="radio" value="" id="share_project1">
                                                        <label class="" for="share_project1"> <?php echo $lang["no"]; ?>
                                                        </label>

                                                        <input class="" name="share_project" type="radio" value="" id="share_project2">
                                                        <label class="" for="share_project2"> <?php echo $lang["yes"]; ?>
                                                        </label>

                                                        <div class="check_prototype_resualt">
                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["participate_in"]; ?>
                                                                </label>
                                                                <textarea name="project_competation" class="form-control" id="floatingInput"> <?php echo $userdata["project_competation"] ?> </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Do Project Get Prize -->
                                                    <div class="prototype_deisgn">
                                                        <h4> <?php echo $lang["receive_awards"]; ?> </h4>

                                                        <input class="" name="project_prize" type="radio" value="" id="project_prize1">
                                                        <label class="" for="project_prize1"> <?php echo $lang["no"]; ?>
                                                        </label>
                                                        <input class="" name="project_prize" type="radio" value="" id="project_prize2">
                                                        <label class="" for="project_prize2"> <?php echo $lang["yes"]; ?>
                                                        </label>

                                                        <div class="check_prototype_resualt">
                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["Mention_prizes"]; ?>
                                                                </label>
                                                                <textarea name="project_prize" class="form-control" id="floatingInput">  <?php echo $userdata["project_prize"] ?> </textarea>
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
                                                <h4> <?php echo $lang["national_id_image"]; ?> </h4>
                                                <div class="box mb-3">
                                                    <div class="upload-file">
                                                        <div class="upload-wrapper">
                                                            <label>
                                                                <input type="file" name="national_id[]" id="files5" multiple>
                                                                <p> <a> <?php echo $lang["select_files"]; ?> </a></p>
                                                            </label>
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
                                                <!--<input class="form-control" type="file" name="national_id[]" id="" multiple> -->

                                            </div>
                                            <div class="col-lg-12">
                                                <h4> <?php echo $lang["upload_cv_document"]; ?> </h4>
                                                <div class="box mb-3">
                                                    <div class="upload-file">
                                                        <div class="upload-wrapper">
                                                            <label>
                                                                <input type="file" name="certificate_image[]" id="files6" multiple>
                                                                <p> <a> <?php echo $lang["select_files"]; ?> </a></p>
                                                            </label>
                                                            <p class='alert alert-info'>   <?php echo $lang['file_info']; ?> </p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">

                                                            <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                        </div>
                                                    </div>
                                                    <output id="image-gallery6"></output>

                                                </div>

                                                <!--<input class="form-control" type="file" name="certificate_image[]" id=""
                                            multiple> -->

                                            </div>
                                            <div class="row">
                                                <h4> <?php echo $lang["following_documents"]; ?></h4>
                                                <div class="col-lg-12">
                                                    <label> <?php echo $lang["scientific_certificate"]; ?> </label>
                                                    <div class="box mb-3">
                                                        <div class="upload-file">
                                                            <div class="upload-wrapper">
                                                                <label>
                                                                    <input type="file" name="last_certificate[]" id="files7" multiple>
                                                                    <p> <a> <?php echo $lang["select_files"]; ?> </a></p>
                                                                </label>
                                                                <p class='alert alert-info'>   <?php echo $lang['file_info']; ?> </p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                            </div>
                                                        </div>
                                                        <output id="image-gallery7"></output>

                                                    </div>

                                                    <!-- <input class="form-control" type="file" name="last_certificate[]" id=""
                                                multiple> -->

                                                </div>
                                                <div class="col-lg-12">
                                                    <label> <?php echo $lang["upload_video"]; ?></label>

                                                    <div class="box mb-3">
                                                        <div class="upload-file">
                                                            <div class="upload-wrapper">
                                                                <label>
                                                                    <input type="file" name="cv[]" id="files8" multiple>
                                                                    <p> <a> <?php echo $lang["select_files"]; ?> </a></p>
                                                                </label>
                                                                <p class='alert alert-info'>   <?php echo $lang['file_info']; ?> </p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                            </div>
                                                        </div>
                                                        <output id="image-gallery8"></output>

                                                    </div>

                                                    <!--     <input class="form-control" type="file" name="cv[]" id="" multiple> -->

                                                </div>

                                                <div class="col-lg-12">
                                                    <label> <?php echo $lang["upload_images"]; ?></label>

                                                    <div class="box mb-3">
                                                        <div class="upload-file">
                                                            <div class="upload-wrapper">
                                                                <label>
                                                                    <input type="file" name="talent_images[]" id="files9" multiple>
                                                                    <p> <a> <?php echo $lang["select_files"]; ?> </a></p>
                                                                </label>
                                                                <p class='alert alert-info'>   <?php echo $lang['file_info']; ?> </p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                            </div>
                                                        </div>
                                                        <output id="image-gallery9"></output>

                                                    </div>

                                                    <!--     <input class="form-control" type="file" name="cv[]" id="" multiple> -->

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
                                                        <button type="submit" class="btn main_button btn-sm"><?php echo $lang["account_update"]; ?></button>
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
    </div>
    </div>

    </div>
    </div>
    </div>
    </div>
<?php
}
?>