<?php
ob_start();
session_start();
include 'init.php';
if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    $stmt = $connect->prepare('SELECT * FROM courses WHERE course_id =? ');
    $stmt->execute(array($course_id));
    $course_details = $stmt->fetch();
}
?>


<!-- START GET EMAIL CONTENT  -->

<!-- END GET EMAIL CONTENT -->
<div class="course_details_page" style="background-image: url(admin/upload/<?php if ($_SESSION["lang"] == "ar") {
                                                                                echo $course_details["image2"];
                                                                            } else {
                                                                                echo $course_details["image3"];
                                                                            }
                                                                            ?>);">

    <div class="overlay">
        <div class="container data">
            <h2> <?php
                    if ($_SESSION["lang"] == "ar") {
                        echo $course_details["course_name"];
                    } else {
                        echo $course_details["course_name_en"];
                    }
                    ?> </h2>
        </div>
    </div>
</div>
<!-- START COURSE CONTENT -->
<div class="course_content_info">
    <div class="container">
        <div class="data">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact_form register_course">
                        <div class="container">
                            <div class="data">
                                <div class="course_video">
                                    <?php
                                    if (!empty($course_details['image4'])) { ?>
                                        <embed width="100%" height="200px" src="admin/upload/<?php echo $course_details['image4']; ?>" />
                                    <?php
                                    } else { ?>
                                        <img src="admin/upload/<?php
                                                                if ($_SESSION["lang"] == "ar") {
                                                                    echo $course_details['image2'];
                                                                } else {
                                                                    echo $course_details['image3'];
                                                                }
                                                                ?>" alt="">
                                    <?php
                                    }
                                    ?>
                                    <h2 style="text-align: center;"><?php
                                                                    if ($_SESSION["lang"] == "ar") {
                                                                        echo $course_details["course_name"];
                                                                    } else {
                                                                        echo $course_details["course_name_en"];
                                                                    }
                                                                    ?> </h2>
                                </div>

                                <form action="insert_reservation.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-12 col-12">
                                            <div class="info">
                                                <h2> <?php echo $lang["course_register"]; ?> </h2>
                                                <div class="row">
                                                    <div class="col-lg-12 col-12">
                                                        <input type="hidden" name="course_id" id="course_id" value="<?php echo $course_id; ?>">
                                                        <input type="hidden" name="payment_mode" value="COD">
                                                        <input type="hidden" name="course_price" id="course_price" value="<?php echo $course_price; ?>">
                                                        <div class="box mb-3">
                                                            <label for="floatingInput"> <?php echo $lang["first_name"]; ?> </label>
                                                            <input name="first_name" type="text" class="form-control" id="first_name" placeholder="" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['first_name']; ?>">
                                                            <small class="text-danger first_name"> </small>

                                                        </div>
                                                        <div class="box mb-3">
                                                            <label for="floatingInput"> <?php echo $lang["last_name"]; ?> </label>
                                                            <input name="last_name" type="text" class="form-control" id="last_name" placeholder="" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['last_name']; ?>">
                                                            <small class="text-danger last_name"> </small>

                                                        </div>
                                                        <div class="box mb-3">
                                                            <label for="floatingInput"> <?php echo $lang["email"]; ?> </label>
                                                            <input name="email" type="email" class="form-control" id="email" placeholder="" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['email']; ?>">
                                                            <small class="text-danger email"> </small>

                                                        </div>
                                                        <div class="box mb-3">

                                                            <label for="floatingInput"> <?php echo $lang["mobile"];  ?>
                                                                <span class="star">
                                                                    * </span></label>
                                                            <input type="tel" name="mobile" id="phone" class="form-control" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['mobile']; ?> ">
                                                            <small class="text-danger phone"> </small>

                                                        </div>

                                                        <div class="box mb-3">
                                                            <label for="selectcountry"><?php echo $lang["country"];  ?></label>
                                                            <select name="country" class="form-select country3" id="selectcountry" aria-label="Floating label select example">

                                                                <?php
                                                                if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                                                    <option value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['country']; ?>">
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
                                                                    <option value="<?php echo $country["country_code"]; ?>">
                                                                        <?php
                                                                        if ($_SESSION["lang"] == "ar") {
                                                                            echo $country["country_arName"];
                                                                        } else {
                                                                            echo $country["country_enName"];
                                                                        }
                                                                        ?>
                                                                    </option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>

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
                                                                <p> احجز الكورس الان </p>
                                                                <!--
                                                                <button type="" class="btn btn-primary"> <?php echo $lang["course_register"]; ?>
                                                                </button>
                                                            -->
                                                            </div>
                                                        </div>
                                                        <div id="paypal-button-container">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="course_learn">
                        <h2> <?php echo $lang["what_learn_course"]; ?> </h2>
                        <ul class="list-unstyled">
                            <?php
                            if ($_SESSION["lang"] == "ar") {
                                $learn = $course_details['course_learn'];
                            } else {
                                $learn = $course_details['course_learn_en'];
                            }
                            $learn = explode(",", $learn);
                            $countfile = count($learn) - 1;
                            for ($i = 0; $i < $countfile; ++$i) { ?>
                                <li><i class="fa fa-check"></i> <?= $learn[$i] ?> </li>
                            <?php
                            }
                            ?>

                        </ul>

                    </div>
                    <div class="course_requiremt">
                        <h2> <?php echo $lang["course_requirment"]; ?> </h2>
                        <ul class="list-unstyled">
                            <?php
                            if ($_SESSION["lang"] == "ar") {
                                $learn = $course_details['course_requirement'];
                            } else {
                                $learn = $course_details['course_requirement_en'];
                            }
                            $learn = explode(",", $learn);
                            $countfile = count($learn) - 1;
                            for ($i = 0; $i < $countfile; ++$i) { ?>
                                <li><i class="fa fa-check"></i> <?= $learn[$i] ?> </li>
                            <?php
                            }
                            ?>

                        </ul>
                    </div>
                    <div class="course_description">
                        <h2> <?php echo $lang["course_description"]; ?> </h2>
                        <?php
                        if ($_SESSION["lang"] == "ar") { ?>
                            <p> <?php echo $course_details['course_description']; ?> </p>
                        <?php
                        } else { ?>
                            <p> <?php echo $course_details['course_description_en']; ?> </p>
                        <?php
                        }
                        ?>


                    </div>
                    <div class="course_who">
                        <h2> <?php echo $lang["who_course"]; ?> </h2>
                        <ul class="list-unstyled">
                            <?php
                            if ($_SESSION["lang"] == "ar") {
                                $learn = $course_details['how_course'];
                            } else {
                                $learn = $course_details['how_course_en'];
                            }
                            $learn = explode(",", $learn);
                            $countfile = count($learn) - 1;
                            for ($i = 0; $i < $countfile; ++$i) { ?>
                                <li><i class="fa fa-check"></i> <?= $learn[$i] ?> </li>
                            <?php
                            }
                            ?>

                        </ul>

                    </div>
                    <div class="course_price">
                        <p> <span><?php echo $lang['course_price']; ?>:</span> <?php echo $course_details['course_price']; ?> $</p>
                        <!-- <p> <span><?php echo $lang['course_hours']; ?>:</span> 10 <?php echo $lang['hours']; ?></p> -->
                    </div>
                    <div class="course_instructor">
                        <h2> <?php echo $lang["course_constuctor"]; ?> </h2>
                        <h4> <?php echo $course_details['course_constructor']; ?> </h4>
                        <h6> <?php echo $course_details['course_constructor_learn']; ?> </h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="admin/upload/<?php echo $course_details['image1']; ?> " alt="">
                            </div>
                        </div>
                        <?php
                        if ($_SESSION["lang"] == "ar") { ?>
                            <p> <?php echo $course_details['course_constructor_info']; ?> </p>
                        <?php
                        } else { ?>
                            <p> <?php echo $course_details['course_constructor_info_en']; ?> </p>
                        <?php
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $course_price =  $course_details['course_price']; ?>
<!-- END COURSE CONTENT -->
<!-- END HERO SECTION -->
<!-- START CONTACT FORM -->

<!-- END CONTACT FORM -->
<?php
include $tem . 'footer_section.php';
?>






<?php
include $tem . 'footer.php';


?>
<script src="https://www.paypal.com/sdk/js?client-id=Aa6xGlT7CdEYFS463meNhvyq6Tovq_rlYBK0U2pEMalXKRMy-1GxSFwAd6_UrMFQkaYxQRn-Dop6Gk61&currency=USD"></script>


<script>
    paypal.Buttons({
        onClick() {
            var first_name = $("#first_name").val();
            var last_name = $("#last_name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            if (first_name.length == 0) {
                $(".first_name").text('<?= $lang['enter_first_name'] ?>');

            } else {
                $(".first_name").text("");

            }
            if (email.length == 0) {
                $(".email").text('<?= $lang['enter_email'] ?>');

            } else {
                $(".email").text("");
            }
            if (last_name.length == 0) {
                $(".last_name").text('<?= $lang['enter_last_name'] ?>');

            } else {
                $(".last_name").text("");
            }
            if (phone.length == 0) {
                $(".phone").text('<?= $lang['enter_mobile'] ?>');

            } else {
                $(".phone").text("");
            }
            if (first_name.length == 0 || last_name.length == 0 || phone.length == 0 || email.length == 0) {
                return false;
            }
        },
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?= $course_price; ?>' // Can also reference a variable or function
                    }
                }]
            });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
                //alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

                var first_name = $("#first_name").val();
                var last_name = $("#last_name").val();
                var email = $("#email").val();
                var phone = $("#phone").val();
                var country = $("#selectcountry").val();
                var course_id = $("#course_id").val();
                var course_price = $("#course_price").val();
                var data = {
                    'first_name': first_name,
                    'last_name': last_name,
                    'email': email,
                    'mobile': phone,
                    'country': country,
                    'course_id': course_id,
                    'payment_mode': 'pay with paypal',
                    'transaction_id': transaction.id,
                    'course_price': course_price,
                }
                $.ajax({
                    method: "POST",
                    url: "insert_reservation.php",
                    data: data,
                    datatype: "datatype",
                    success: function(response) {

                        alert("<?= $lang['course_alert']; ?>");
                        window.location.href = "courses.php";


                    },
                    error:function(){
                        alert("لم يتم حجز الكورس بنجاح");
                    }
                });
            });
        }
    }).render('#paypal-button-container');
</script>