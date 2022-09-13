<?php
ob_start();
session_start();
include 'init.php';
?>
<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2> مشاركة المشروع بشكل فردي </h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<!-- START CONTACT FORM -->
<div class="contact_form">
    <div class="container">
        <div class="data">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="info">
                        <h2> مشاركة المشروع بشكل فردي </h2>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">الاسم الاول</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">البريد الالكتروني</label>
                                </div>
                                <div class="form-floating">
                                    <select class="form-select country" id="floatingSelectGrid"
                                        aria-label="Floating label select example">
                                        <option value="">اختر</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                    </select>
                                    <label for="floatingSelectGrid"> اختر المجال </label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput"> الاسم الاخير </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput"> الرقم التعريفى </label>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="">
                                        <label> Cv </label>
                                        <input id="logo" class="form-control dropify_" data-default-file="" type="file"
                                            name="car_imageside">
                                    </div>
                                    <div id="logo_" class="col-md-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 cars_sections">
                    <div class="item">
                        <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end"
                                style="background-image: url(uploads/header2.jpg);">
                            </div>
                            <div class="text">

                                <div class="">
                                    <div class="reservation_button">
                                        <button type="submit" class="btn btn-primary"> مشاركة المشروع </button>
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