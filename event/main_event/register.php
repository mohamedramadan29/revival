<?php
ob_start();
session_start();
$artificial_event = 'artificial_event';
include 'init.php';
?>

<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["register"]; ?> </h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->

<!-- START CONTACT FORM -->
<div class="contact_form">
    <div class="container">
        <div class="data">
            <!-- <h4 class="text-center"> <?php echo $lang["add_data"]; ?> </h4>-->
            <form action="insert_reservation.php" method="POST">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="info">

                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="box mb-3">
                                        <input type="hidden" name="event_id" id="event_id" value="<?php echo $event_id; ?>">
                                        <input type="hidden" name="payment_mode" value="COD">
                                        <label for="floatingInput"> <?php echo $lang["first_name"]; ?> <span class="star"> *
                                            </span> </label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['first_name']; ?>">
                                        <small class="text-danger first_name"></small>
                                    </div>
                                    <div class="box mb-3">
                                        <label for="floatingInput"> <?php echo $lang["email"]; ?> <span class="star"> *
                                            </span> </label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['email']; ?>">
                                        <small class="text-danger email"></small>
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
                                                <option value=""><?php echo $lang["select"];  ?></option>

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
                                <div class="col-lg-6 col-12">
                                    <div class="box mb-3">
                                        <label for="floatingInput"> <?php echo $lang["last_name"]; ?> <span class="star"> *
                                            </span> </label>
                                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['last_name']; ?>">
                                        <small class="text-danger last_name"></small>

                                    </div>
                                    <div class="box mb-3">
                                        <!--
                                        <input name="mobile" type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com">-->
                                        <label for="floatingInput"> <?php echo $lang["mobile"];  ?> <span class="star">
                                                * </span></label>
                                        <input type="tel" name="mobile" id="phone" class="form-control" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['mobile']; ?>">
                                        <small class="text-danger phone"></small>

                                    </div>

                                </div>
                            </div>

                            <div class="event_table_price table-responsive d-none">
                                <table class="table table-resposive table-hover table-bordered align-middle table-striped">
                                    <thead>
                                        <tr>
                                            <th> <?php echo $lang["day"];  ?> </th>
                                            <th> <?php echo $lang["event_name"];  ?></th>
                                            <th> <?php echo $lang["price"];  ?> </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> <?php echo $lang["first_day"];  ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    <?php echo $lang["select_event"];  ?>
                                                </button>
                                            </td>
                                            <td> 100 <span> $ </span> </td>

                                        </tr>
                                        <tr>
                                            <td> <?php echo $lang["second_day"];  ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    <?php echo $lang["select_event"];  ?>
                                                </button>
                                            </td>
                                            <td> 200 <span> $ </span> </td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Modal 
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h2> احداث اليوم الاول </h2>
                                    <ul class="list-unstyled">
                                        <li> <input class="form-check-input" type="checkbox" value="" id="check1">
                                            <label class="form-check-label" for="check1"> حضور ايفنت الرياضة
                                        </li>
                                        <li><input class="form-check-input" type="checkbox" value="" id="check1">
                                            <label class="form-check-label" for="check1"> حضور ايفنت السياحة
                                        </li>
                                        <li><input class="form-check-input" type="checkbox" value="" id="check1">
                                            <label class="form-check-label" for="check1"> حضور ايفنت المواهب
                                                الرياضة
                                        </li>

                                    </ul>
                                </div>
                                <div class="modal-footer flex-row justify-content-between">
                                    <button type="button" class="btn btn-danger flex-start" data-bs-dismiss="modal">
                                        <i class="fa fa-close"></i></button>
                                    <button class="btn button flex-end"> اضافة </button>

                                </div>
                            </div>
                        </div>
                    </div>
                    -->
                    <div class="col-lg-12 cars_sections">
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="text">
                                    <div class="">
                                        <div class="reservation_button">
                                            <!--
                                            <button type="submit" class="btn btn-primary">
                                                <?php echo $lang["register"];  ?>
                                            </button>
                                        -->
                                            <p> سجل معنا الان </p>
                                            <div id="paypal-button-container">
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
</div>
<!-- END CONTACT FORM -->
<?php
include $tem . 'footer_section.php';
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
                        value: '100' // Can also reference a variable or function
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
                var event_id = $("#event_id").val();
                // var course_price = $("#course_price").val();
                var data = {
                    'first_name': first_name,
                    'last_name': last_name,
                    'email': email,
                    'mobile': phone,
                    'country': country,
                    'event_id': event_id,
                    'payment_mode': 'pay with paypal',
                    'transaction_id': transaction.id,
                    // 'course_price': course_price,
                }
                $.ajax({
                    method: "POST",
                    url: "insert_reservation.php",
                    data: data,
                    datatype: "datatype",
                    success: function(response) {

                        alert("<?= $lang['register_alert']; ?>");
                      //  window.location.href = "register.php";


                    },
                    error: function() {
                        alert(" لم يتم الحجز يوجد خطا ما ");
                    }
                });
            });
        }
    }).render('#paypal-button-container');
</script>