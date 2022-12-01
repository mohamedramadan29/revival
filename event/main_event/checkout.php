<?php
ob_start();
session_start();
$artificial_event = 'artificial_event';
include 'init.php';
if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];
    //  echo $event_id;
    $stmt = $connect->prepare('SELECT * FROM main_events WHERE event_id=?');
    $stmt->execute([$event_id]);
    $event_data = $stmt->fetch();
    $event_name = $event_data['event_name'];
    $early_register_start = $event_data['regsiter_early_start'];
    $early_register_end = $event_data['regsiter_early_end'];

    $day_now = date("Y-m-d");
}
?>
<div class='cars hero faq booking'>
    <div class='overlay'>
        <div class='container data'>
            <h2> <?php echo $lang['complete_reser_pro']; ?> </h2>
        </div>
    </div>
</div>

<!-- Send Information with cart  -->
<?php if (isset($_SESSION['cart'])) {
    $wherein = implode(',', $_SESSION['cart']);

    $stmt = $connect->prepare(
        "SELECT * FROM event_programme WHERE prog_id IN ($wherein)"
    );
    $stmt->execute();
    $alldata = $stmt->fetchAll();
    $total_price = 0;
    foreach ($alldata as $value) {
        if ($day_now >= $early_register_start && $day_now <= $early_register_end) {
            $total_price = $total_price + (int) $value['match_price_disc'];
        } else {
            $total_price = $total_price + (int) $value['match_price'];
        }
?>
        <tr>
            <td>
                <?php $value['prog_name'];
                ?>
            </td>
            <td>
                <?php $value['first_team'];
                ?>
            </td>
            <td> <?php $value['second_team'];
                    ?> </td>
            <td>
                <?php $value['match_price'];
                ?>
            </td>

        </tr>
<?php
    }
} else {
    $wherein = 0;
    $total_price = 0;
} ?>

<?php if (isset($_SESSION['cart2'])) {
    $wherein = implode(',', $_SESSION['cart2']);

    $stmt = $connect->prepare(
        "SELECT * FROM event_programme WHERE prog_id IN ($wherein)"
    );
    $stmt->execute();
    $alldata = $stmt->fetchAll();
    $total_price2 = 0;
    foreach ($alldata as $value) {
        if ($day_now >= $early_register_start && $day_now <= $early_register_end) {
            $total_price2 = $total_price2 + (int) $value['train_dis_price'];
        } else {
            $total_price2 = $total_price2 + (int) $value['train_price'];
        }
?>
        <tr>
            <td>
                <?php $value['prog_name'];
                ?>
            </td>
            <td>
                <?php $value['train_name'];
                ?>
            </td>
            <td> <?php $value['train_date'];
                    ?> </td>
            <td>
                <?php $value['train_price'];
                ?>
            </td>

        </tr>
<?php
    }
} else {
    $wherein = 0;
    $total_price2 = 0;
}
?>

<?php if (isset($_SESSION['cart3'])) {
    $wherein = implode(',', $_SESSION['cart3']);

    $stmt = $connect->prepare(
        "SELECT * FROM event_programme WHERE prog_id IN ($wherein)"
    );
    $stmt->execute();
    $alldata = $stmt->fetchAll();
    $total_price3 = 0;
    foreach ($alldata as $value) {
        if ($day_now >= $early_register_start && $day_now <= $early_register_end) {
            $total_price3 = $total_price3 + (int) $value['prog_date_price_disc'];
        } else {
            $total_price3 = $total_price3 + (int) $value['prog_date_price'];
        }
?>
        <tr>
            <td>
                <?php $value['prog_name'];
                ?>
            </td>
            <td>
                <?php $value['main_head'];
                ?>
            </td>
            <td> <?php $value['prog_date'];
                    ?> </td>
            <td>
                <?php $value['prog_date_price'];
                ?>
            </td>
        </tr>
<?php
    }
} else {
    $wherein = 0;
    $total_price3 = 0;
}
?>

<?php
if (isset($_SESSION['cart'])) {
    $sport_reservation = $_SESSION['cart'];
    $sport_reservation = implode(",", $sport_reservation);
} else {
    $sport_reservation = " ";
}

if (isset($_SESSION['cart2'])) {
    $train_reservation = $_SESSION['cart2'];
    $train_reservation = implode(",", $train_reservation);
} else {
    $train_reservation = " ";
}

if (isset($_SESSION['cart3'])) {
    $all_day_reservation = $_SESSION['cart3'];
    $all_day_reservation = implode(",", $all_day_reservation);
} else {
    $all_day_reservation = " ";
}
$total_prices = $total_price + $total_price2 + $total_price3;
?>


<!-- Send Information with cart  -->
<div class="contact_form">
    <div class="container">
        <div class="data">
            <form action="insert_reservation.php" method="POST">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="info">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="box mb-3">
                                        <input type="hidden" name="event_id" id="event_id" value="<?php echo $event_id; ?>">
                                        <input type="hidden" id="total_price" name="total_price" value="<?php echo $total_prices ?>">
                                        <input type="hidden" name="payment_mode" value="COD">
                                        <!-- Match Reservation -->
                                        <input type="hidden" id="sport_reservation" name="sport_reservation" value="<?php echo $sport_reservation; ?>">
                                        <input type="hidden" id="train_reservation" name="train_reservation" value="<?php echo $train_reservation; ?>">
                                        <input type="hidden" id="all_day_reservation" name="all_day_reservation" value="<?php echo $all_day_reservation; ?>">

                                        <label for="floatingInput"> <?php echo $lang["first_name"]; ?> <span class="star"> *
                                            </span> </label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['first_name']; ?>">
                                        <small class="text-danger first_name"></small>
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
                                        <label for="floatingInput"> <?php echo $lang["email"]; ?> <span class="star"> *
                                            </span> </label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['email']; ?>">
                                        <small class="text-danger email"></small>
                                    </div>


                                </div>
                            </div>

                            <div class="col-lg-12 cars_sections">
                                <div class="item">
                                    <div class="car-wrap rounded ftco-animate">
                                        <div class="text">
                                            <div class="">
                                                <div class="reservation_button">

                                                    <p><?php echo $lang['register_now']; ?></p>

                                                    <div id="paypal-button-container">
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
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';
?>

<script src="https://www.paypal.com/sdk/js?client-id=Aa6xGlT7CdEYFS463meNhvyq6Tovq_rlYBK0U2pEMalXKRMy-1GxSFwAd6_UrMFQkaYxQRn-Dop6Gk61&currency=USD">
</script>

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
                        value: <?= $total_prices ?>, // Can also reference a variable or function
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
                var total_price = $("#total_price").val();
                var sport_reservation = $("#sport_reservation").val();
                var train_reservation = $("#train_reservation").val();
                var all_day_reservation = $("#all_day_reservation").val();
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
                    'total_price': total_price,
                    'sport_reservation': sport_reservation,
                    'train_reservation': train_reservation,
                    'all_day_reservation': all_day_reservation,
                }
                $.ajax({
                    method: "POST",
                    url: "insert_reservation.php",
                    data: data,
                    datatype: "datatype",
                    success: function(response) {

                        alert("<?= $lang['register_alert']; ?>");

                        let url = "logout.php?event_id=<? $event_id; ?>";
                        window.location.href = url;
                    },
                    error: function() {
                        alert(" لم يتم الحجز يوجد خطا ما ");
                    }
                });
            });
        }
    }).render('#paypal-button-container');
</script>