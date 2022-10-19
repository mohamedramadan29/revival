<?php
ob_start();
session_start();
include 'init.php';


?>

<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo  $lang["add_new_project_h1"]; ?></h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->

<!-- START CONTACT FORM -->
<div class="contact_form">
    <div class="container">
        <form id="first_form555" name="" class="message_form ajax_form" action="upload_forms/upload_individual_project.php" method="POST" enctype="multipart/form-data">
            <div class="data">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="info">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="box mb-3">
                                        <label for="first_name"><?php echo $lang["project_name"];  ?><span class="star">
                                                *
                                            </span></label>
                                        <input required name="project_name" type="text" class="form-control" id="first_name" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['project_name']; ?>">
                                    </div>
                                    <h3> <?php echo  $lang["legal_information"]; ?> </h3>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="">
                                                <div class="">
                                                    <label> <?php echo  $lang["registration_certificate"]; ?> </label>
                                                    <div class="check_prototype_resualt">
                                                        <div class="box mb-3">
                                                            <div class="upload-file">
                                                                <div class="upload-wrapper">
                                                                    <label>
                                                                        <input type="file" name="files1[]" id="files" multiple>
                                                                        <p> <a>
                                                                                <?php echo  $lang["select_files"]; ?></a>
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
                                                        <!--     <input type="file" name="project_design[]" class="form-control"
                                                        multiple> -->

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="">
                                                <div class="">
                                                    <label> <?php echo  $lang["engineering_drawings"]; ?></label>
                                                    <div class="check_prototype_resualt">

                                                        <div class="box mb-3">
                                                            <div class="upload-file">
                                                                <div class="upload-wrapper">
                                                                    <label>
                                                                        <input type="file" name="files2[]" id="files2" multiple>
                                                                        <p> <a> <?php echo  $lang["select_files"]; ?>
                                                                            </a>
                                                                        </p>
                                                                    </label>
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

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="">
                                                <div class="">
                                                    <label><?php echo  $lang["Prototype"]; ?></label>
                                                    <div class="check_prototype_resualt">

                                                        <div class="box mb-3">
                                                            <div class="upload-file">
                                                                <div class="upload-wrapper">
                                                                    <label>
                                                                        <input type="file" name="files3[]" id="files3" multiple>
                                                                        <p> <a><?php echo  $lang["select_files"]; ?></a>
                                                                        </p>
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

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6 col-12">
                                    <h3><?php echo  $lang["about_project"]; ?><span class="star">
                                            *
                                        </span></h3>
                                    <div class="form-floating mb-3">
                                        <textarea required class="form-control" name="about_project" id="floatingInput" cols="30" rows="6"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="">
                                                <label> <?php echo  $lang["project_image"]; ?></label>
                                                <div class="check_prototype_resualt">

                                                    <div class="box mb-3">
                                                        <div class="upload-file">
                                                            <div class="upload-wrapper">
                                                                <label>
                                                                    <input type="file" name="files4[]" id="files4" multiple>
                                                                    <p> <a> <?php echo  $lang["select_files"]; ?></a>
                                                                    </p>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                            </div>
                                                        </div>

                                                        <output id="image-gallery4"></output>


                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-12">
                                            <div class="">
                                                <label> <?php echo  $lang["project_video"]; ?></label>
                                                <div class="check_prototype_resualt">

                                                    <div class="box mb-3">
                                                        <div class="upload-file">
                                                            <div class="upload-wrapper">
                                                                <label>
                                                                    <input type="file" name="files5[]" id="files5" multiple>
                                                                    <p> <a> <?php echo  $lang["select_files"]; ?></a>
                                                                    </p>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                            </div>
                                                        </div>

                                                        <output id="image-gallery5"></output>


                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="">
                                    <div class="reservation_button">
                                        <input class="btn button" type="submit" value="<?php echo  $lang["add_new_project_h1"]; ?>">
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
<!-- END CONTACT FORM -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>