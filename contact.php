<?php
ob_start();
session_start();
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
<!--  GET EMIAL FROM HERE   -->
<!-- START CONTACT FORM -->
<div class="contact_form">
    <div class="container">
        <div class="data">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <!-- OLD CODE HERE  -->
                    <form id="first_form" class="message_form ajax_form" action="upload_forms/upload_contact.php" method="post" enctype="multipart/form-data">
                        <div class="info">
                            <div class="box mb-3">
                                <label for="floatingInput"><?php echo $lang["name"];  ?> <span class="star"> *
                                    </span></label>
                                <input name="user_name" type="text" class="form-control" id="floatingInput">

                            </div>
                            <div class="box mb-3">
                                <label for="floatingInput"> <?php echo $lang["email"];  ?> <span class="star">*</span></label>
                                <input name="user_email" type="email" class="form-control" id="floatingInput">

                            </div>

                            <div class="box mb-3">
                                <label for="floatingInput"> <?php echo $lang["message_head"]; ?> <span class="star">*</span></label>
                                <select required id="cat_active2" class="form-control select_head" name="email_subject" id="">
                                    <option value=""> <?php echo $lang["message_head"]; ?> </option>
                                    <option value=" الذكاء الاصطناعي"> <?php echo $lang["message_art"]; ?></option>
                                    <option value=" الرياضة"> <?php echo $lang["message_sport"]; ?> </option>
                                    <option value=" الازياء"> <?php echo $lang["message_fash"]; ?> </option>
                                    <option value=" ريفايفال"> <?php echo $lang["message_revival"]; ?> </option>
                                    <option value="اخري"> <?php echo $lang["message_other"]; ?> </option>
                                </select>

                            </div>

                            <div class="box mb-3">
                                <label for="floatingTextarea"><?php echo $lang["message"];  ?> <span class="star">*</span></label>
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

                            </div>

                        </div>
                        <div>
                            <!-- <button>Upload</button> -->
                            <input class="btn btn-primary" type="submit" value="<?php echo $lang["send"];  ?>  ">
                        </div>
                    </form>

                    <!---------------------  START NEW CODE ---------------------------->

                    <!-- Area to display the percent of progress -->
                    <div class="m-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-success" id="percent" role="progressbar" aria-label="Success striped example" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div>
                    </div>

                    <!-- area to display a message after completion of upload -->
                    <div id='status'></div>

                    <!------------------------- END NEW CODE ------------------->

                </div>


                <div class="col-lg-6 col-12">
                    <div class="info">
                        <p><?php echo $lang["contact_p1"];  ?> </p>
                        <h2> <?php echo $lang["contact_us_head2"];  ?> </h2>

                        <ul class="list-unstyled">
                            <li> <i class="fa fa-location"> </i> <?php echo $lang["contact_us_address"];  ?>
                            </li>

                            <li> <i class="fa fa-envelope"> </i> <a href="mailto://info@revivals.site">
                                    info@revivals.site </a> </li>
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
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d950645.7063804097!2d39.77166654999316!3d21.450468415099117!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d01fb1137e59%3A0xe059579737b118db!2z2KzYr9ipINin2YTYs9i52YjYr9mK2Kk!5e0!3m2!1sar!2seg!4v1657182468579!5m2!1sar!2seg" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<!-- END MAPS -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>