<?php
ob_start();
session_start();
$eventpage = 'event';
include 'init.php';
?>
<div class="cars event_course_register">
    <div class="overlay">
        <div class="container data">
            <h2> Register Now In Fisrt Course </h2>
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
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">First Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Date birth (DD/MM/YYYY)</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Last Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Phone</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput"> Country </label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 cars_sections">
                    <div class="item">
                        <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end"
                                style="background-image: url(uploads/art1.jpg);">
                            </div>
                            <p class="course_description"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. In,
                                voluptates
                                ipsam
                                repellendus cupiditate iusto quod ad eaque quisquam iste est qui consequatur impedit rem
                                architecto ipsum excepturi quasi. Reprehenderit, ipsa. </p>
                            <div class="text">

                                <hr>
                                <div class="">
                                    <div class="reservation_button">
                                        <button type="submit" class="btn btn-primary"> Register Now </button>
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