<?php
ob_start();
session_start();
$eventpage = 'event';
include 'init.php';
?>

<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2> سجل معنا الان فى الاحداث </h2>
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
                        <h2> سجل الان </h2>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput"> الاسم الاول </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">البريد الالكتروني</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">تاريخ الميلاد (DD/MM/YYYY)</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">الاسم الاخير</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">رقم الهاتف</label>
                                </div>
                                <div class="form-floating">
                                    <select class="form-select country" id="floatingSelectGrid"
                                        aria-label="Floating label select example">
                                        <option value="">اختر</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                    </select>
                                    <label for="floatingSelectGrid">الدولة</label>
                                </div>
                            </div>
                        </div>
                        <div class="event_table_price table-responsive">

                        </div>
                    </div>
                </div>


                <div class="col-lg-12 cars_sections">
                    <div class="item">
                        <div class="car-wrap rounded ftco-animate">
                            <div class="text">
                                <div class="">
                                    <div class="reservation_button">
                                        <button type="submit" class="btn btn-primary"> سجل الان </button>
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