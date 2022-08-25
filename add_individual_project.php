<?php
ob_start();
session_start();
include 'init.php';
?>

<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2> اضافه مشروع جديد </h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<!-- START CONTACT FORM -->
<div class="contact_form">
    <div class="container">
        <form action="">
            <div class="data">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="info">
                            <div class="row">
                                <div class="row">
                                    <h3> المعلومات الشخصية </h3>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="name@example.com">
                                            <label for="floatingInput"> الاسم </label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="name@example.com">
                                            <label for="floatingInput"> الهاتف </label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="name@example.com">
                                            <label for="floatingInput"> السن </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="name@example.com">
                                            <label for="floatingInput"> البريد الالكتروني </label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="name@example.com">
                                            <label for="floatingInput"> الدولة </label>
                                        </div>
                                        <div class="form-floating mb-3">

                                            <select class="form-select country" id="floatingSelectGrid"
                                                aria-label="Floating label select example">
                                                <option value="">اختر</option>
                                                <option value="Afghanistan">ذكر</option>
                                                <option value="Albania">انثى</option>
                                            </select>
                                            <label for="floatingInput"> الجنس </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <h3> المعلومات القانونية </h3>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="">
                                                <div class="">
                                                    <label>شهادة التسجيل </label>
                                                    <input id="logo" class="form-control dropify_" data-default-file=""
                                                        type="file" name="car_imageside" value="">
                                                </div>
                                                <div id="logo_" class="col-md-3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="">
                                                <div class="">
                                                    <label> الرسومات الهندسية </label>
                                                    <input id="logo2" class="form-control dropify_" data-default-file=""
                                                        type="file" name="car_imageside" value="" multiple="multiple">
                                                </div>
                                                <div id="logo_" class="col-md-3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="">
                                                <div class="">
                                                    <label> النموذج المبدئي </label>
                                                    <input id="logo3" class="form-control dropify_" data-default-file=""
                                                        type="file" name="car_imageside" value="" multiple="multiple">
                                                </div>
                                                <div id="logo_" class="col-md-3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6 col-12">
                                    <h3> عن المشروع </h3>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="" id="floatingInput" cols="30"
                                            rows="6"></textarea>

                                        <label for="floatingInput"> ملخص المشروع </label>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="">
                                                <label> صور المشروع </label>
                                                <input id="logo4" class="form-control dropify_" data-default-file=""
                                                    type="file" name="car_imageside" value="" multiple="multiple">
                                            </div>
                                            <div id="logo_" class="col-md-3">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="">
                                                <label> فيديو المشروع </label>
                                                <input id="logo6" class="form-control dropify_" data-default-file=""
                                                    type="file" name="car_imageside" value="" multiple="multiple">
                                            </div>
                                            <div id="logo_" class="col-md-3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="reservation_button">
                                            <input class="btn button" type="submit" value="اضافة مشروع">

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
<!-- END CONTACT FORM -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>