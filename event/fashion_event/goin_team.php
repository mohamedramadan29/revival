<?php
ob_start();
session_start();
$fashion_event = 'fashion_event';

include 'init.php';
?>

<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["join_team_h1"]; ?></h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<!-- START CONTACT FORM -->
<div class="contact_form">
    <div class="container">
        <div class="data">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="info">

                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="box mb-3">
                                    <label for="floatingInput"><?php echo $lang["first_name"]; ?></label>
                                    <input type="text" class="form-control" id="floatingInput" placeholder="">

                                </div>
                                <div class="box  mb-3">
                                    <label for="floatingInput"> <?php echo $lang["last_name"]; ?> </label>
                                    <input type="email" class="form-control" id="floatingInput" placeholder=" ">

                                </div>

                                <div class="box mb-3">
                                    <label for="floatingTextarea"> <?php echo $lang["message"]; ?> </label>
                                    <textarea class="form-control" placeholder="" id="floatingTextarea"></textarea>

                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="box  mb-3">
                                    <label for="floatingInput"> <?php echo $lang["last_name"]; ?> </label>
                                    <input type="text" class="form-control" id="floatingInput" placeholder="">

                                </div>
                                <div class="box  mb-3">
                                    <label for="floatingInput"> <?php echo $lang["mobile"]; ?></label>
                                    <input type="email" class="form-control" id="floatingInput" placeholder="">

                                </div>
                                <div class="box mb-3">
                                    <label for="floatingSelectGrid"><?php echo $lang["country"]; ?></label>
                                    <select class="form-select country" id="floatingSelectGrid"
                                        aria-label="Floating label select example">
                                        <option value=""><?php echo $lang["select"]; ?></option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>

                                </div>
                                <div class="box mb-3">
                                    <label for="floatingSelectGrid">اختر هل انت</label>
                                    <select class="form-select country" id="floatingSelectGrid"
                                        aria-label="Floating label select example">
                                        <option value="">هل انت </option>
                                        <option value="Afghanistan">صفحى</option>
                                        <option value="Zimbabwe">متحدث</option>
                                        <option value="Zimbabwe">اعلامي</option>
                                        <option value="Zimbabwe">منطم</option>
                                    </select>

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
        </div>
    </div>
</div>
<!-- END CONTACT FORM -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>