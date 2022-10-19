<?php
$stmt = $connect->prepare("SELECT * FROM sport_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));

$userdata = $stmt->fetch();
$count = $stmt->rowCount();
if ($count > 0) {
?>



    <div class="profile_data update_profile">
        <div class="container">
            <div class="data">

                <form id="update_3" class="message_form ajax_form" action="upload_data/sport_register.php" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-lg-4">
                            <div class="info">
                                <?php
                                if (!empty($userdata['talent_image'])){ ?>
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
                                <h2> <?php echo $userdata["first_name2"];  ?> <?php echo $userdata["first_name2"];  ?> </h2>
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
                                                                    <input name="first_name2" type="text" class="form-control" id="first_name" value="<?php echo $userdata['first_name2']; ?>">
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

                                                                        <option value=""><?php echo $lang["select"];  ?>
                                                                        </option>

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
                                <h4> خبراتك </h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="box mb-3">
                                            <label for="floatingInput"> اكتب نبذةعن خبراتك</label>
                                            <textarea class="form-control" name="experience_info" id="floatingInput"><?php echo $userdata["experience_info"] ?></textarea>

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
                                                        <input name="team_name" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata["team_name"] ?>">

                                                    </div>
                                                    <!-- Do Design -->
                                                    <div class="prototype_deisgn">
                                                        <h4> هل انت مسجل رسميا بعقد في قائمة النادي؟!</h4>
                                                        <input class="" name="team_register" type="radio" value="no" id="check_design1">
                                                        <label class="" for="check_design1"> لا </label>
                                                        <input class="" name="team_register" type="radio" value="yes" id="check_design2">
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
                                                        <input name="player_position" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata["player_position"] ?>">
                                                    </div>
                                                    <div class="box mb-3">
                                                        <label for="floatingInput"> الوزن</label>
                                                        <input name="player_weight" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata["player_weight"] ?>">
                                                    </div>
                                                    <div class="box mb-3">
                                                        <label for="floatingInput"> الطول</label>
                                                        <input name="player_taller" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata["player_taller"] ?>">

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
                                                            <input type="file" name="videos[]" id="files" multiple accept="video/*">
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
                                                            <input type="file" name="fiels[]" id="files2" multiple accept=".doc, .docx, .pdf">
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
                                            <div class="col-lg-12">
                                                <label> <?php echo $lang["upload_images"]; ?></label>

                                                <div class="box mb-3">
                                                    <div class="upload-file">
                                                        <div class="upload-wrapper">
                                                            <label>
                                                                <input type="file" name="talent_images[]" id="files3" multiple>
                                                                <p> <a> <?php echo $lang["select_files"]; ?> </a></p>
                                                            </label>
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
                                    <div class="col-lg-12 cars_sections">
                                        <div class="item">
                                            <div class="car-wrap rounded ftco-animate">
                                                <div class="text">


                                                    <div class="">
                                                        <div class="reservation_button">
                                                            <button type="submit" class="btn main_button"> تعديل
                                                                الحساب </button>
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

    <!-- Area to display the percent of progress -->
    <!-- area to display a message after completion of upload -->
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








<?php
}
?>