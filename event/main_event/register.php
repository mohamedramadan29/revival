<?php
ob_start();
session_start();
$artificial_event = 'artificial_event';
include 'init.php';
if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];
    //  echo $event_id;

    $stmt = $connect->prepare("SELECT * FROM main_events WHERE event_id=?");
    $stmt->execute(array($event_id));
    $event_data = $stmt->fetch();
    $event_name = $event_data["event_name"];
    //echo $event_name;
}
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

                                <?php
                                if (isset($_GET['true']) == "created") {
                                ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>راائع!</strong> تم اضافة الحجز بنجاح الي السلة
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="event_table_price table-responsive">
                                <table class="table table-resposive table-hover table-bordered align-middle table-striped">
                                    <thead>
                                        <tr>
                                            <th> اسم الحدث </th>
                                            <th> ورش العمل </th>
                                            <th> الدورات التدريبية </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $connect->prepare("SELECT * FROM event_programme WHERE event_page=?");
                                        $stmt->execute(array($event_name));
                                        $event_work_data = $stmt->fetchAll();
                                        foreach ($event_work_data as $event_data) { ?>
                                            <tr>
                                                <td> <?php echo $event_data["prog_name"]; ?></td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <?php
                                                    if (!empty($event_data["work_name"])) { ?>
                                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropworks<?php echo $event_data["prog_id"]; ?>">
                                                            مشاهدة <i class="fa fa-eye"></i>
                                                        </button>
                                                        <a class="btn btn-primary" href="addCart.php?id=<?php echo $event_data['prog_id']; ?>&event_id=<?php echo $event_id ?>"> اضافة الي سلة الحجوزات <i class="fa fa-cart-plus"></i> </a>
                                                    <?php
                                                    } else { ?>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                            لا يوجد ورشة عمل
                                                        </button>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (!empty($event_data["train_name"])) { ?>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdroplearn<?php echo $event_data["prog_id"]; ?>">
                                                            مشاهدة <i class="fa fa-eye"></i>
                                                        </button>
                                                        <a class="btn btn-primary" href="addCart2.php?id=<?php echo $event_data['prog_id']; ?>&event_id=<?php echo $event_id ?>"> اضافة الي سلة الحجوزات <i class="fa fa-cart-plus"></i> </a>
                                                    <?php
                                                    } else { ?>
                                                        <button type="button" class="btn btn-danger">
                                                            لا يوجد دورات تدريبية
                                                        </button>
                                                    <?php
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                            <div class="modal fade" id="staticBackdropworks<?php echo $event_data["prog_id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel"> احجز ورشة العمل </h5>
                                                        </div>
                                                        <div class="modal-body work_data_reserve">
                                                            <ul class="list-unstyled">
                                                                <li> <span> اسم الورشة : </span> <?php echo $event_data['work_name'];  ?> </li>
                                                                <li> <span>تاريخ الورشة :</span> <?php echo $event_data['work_date'];  ?> </li>
                                                                <li> <span> توقيت الورشة :</span> <?php echo $event_data['work_time'];  ?> </li>
                                                                <li> <span> مكان الورشة :</span> <?php echo $event_data['work_place'];  ?> </li>
                                                                <li> <span> مقدم الورشة :</span> <?php echo $event_data['work_speakers'];  ?> </li>
                                                                <li> <span> سعر الورشة :</span> <?php echo $event_data['work_price'];  ?> <span> $ </span></li>
                                                                <!--  <li> <span> سعر التسجيل المبكر :</span> <?php echo $event_data['work_dis_price'];  ?> <span> $ </span> </li> -->
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer flex-row justify-content-between">
                                                            <button type="button" class="btn btn-danger flex-start" data-bs-dismiss="modal">
                                                                <i class="fa fa-close"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="staticBackdroplearn<?php echo $event_data["prog_id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel"> احجز ورشة العمل </h5>
                                                        </div>
                                                        <div class="modal-body work_data_reserve">
                                                            <ul class="list-unstyled">
                                                                <li> <span> اسم الدورة : </span> <?php echo $event_data['train_name'];  ?> </li>
                                                                <li> <span>تاريخ الدورة :</span> <?php echo $event_data['train_date'];  ?> </li>
                                                                <li> <span> توقيت الدورة :</span> <?php echo $event_data['train_time'];  ?> </li>
                                                                <li> <span> مكان الدورة :</span> <?php echo $event_data['train_place'];  ?> </li>
                                                                <li> <span> مقدم الدورة :</span> <?php echo $event_data['train_speaker'];  ?> </li>
                                                                <li> <span> عدد ايام الدورة :</span> <?php echo $event_data['train_days'];  ?> </li>
                                                                <li> <span> عدد ساعات الدورة :</span> <?php echo $event_data['train_hours'];  ?> </li>
                                                                <li> <span> سعر الدورة :</span> <?php echo $event_data['train_price'];  ?> <span> $ </span></li>

                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer flex-row justify-content-between">
                                                            <button type="button" class="btn btn-danger flex-start" data-bs-dismiss="modal">
                                                                <i class="fa fa-close"></i></button>
                                                            <button class="btn button flex-end"> حجز </button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="cart_section">
                        <h2> الحجوزات الخاصة بك </h2>
                        <div class="table-responsive">
                            <table class="table text-center table-resposive table-hover table-bordered align-middle table-striped">
                                <thead>
                                    <tr>
                                        <th> اسم الحدث </th>
                                        <th> اسم الورشة </th>
                                        <th> السعر </th>
                                        <th> اسم الدورة </th>
                                        <th> السعر </th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //   print_r($_SESSION['cart2']);
                                    if (isset($_SESSION['cart']) || isset($_SESSION['cart2'])) {
                                        if (isset($_SESSION['cart'])) {
                                            $wherein = implode(",", $_SESSION['cart']);
                                        } else {
                                            $wherein = 0;
                                        }
                                        if (isset($_SESSION['cart2'])) {
                                            $wherein2 = implode(",", $_SESSION['cart2']);
                                        } else {
                                            $wherein2 = 0;
                                        }



                                        $stmt = $connect->prepare("SELECT * FROM event_programme WHERE prog_id IN ($wherein,$wherein2)");
                                        $stmt->execute();
                                        $alldata = $stmt->fetchAll();
                                        $total_price = 0;
                                        $total_price2 = 0;
                                        foreach ($alldata as $value) {
                                            $total_price = $total_price + (int) $value['work_price'];
                                            $total_price2 = $total_price2 + (int) $value['train_price'];
                                    ?>
                                            <tr>
                                                <td>
                                                    <?php echo $value['prog_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['work_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['work_price']; ?> <span> $ </span>
                                                </td>
                                                <td>
                                                    <?php echo $value['train_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['train_price']; ?> <span> $ </span>
                                                </td>
                                                <td> <a href="deleteitem.php?id=<?php echo $value['prog_id'] ?>&event_id=<?php echo $event_id; ?>" class="btn btn-danger"> <i class="fa fa-trash"></i> </a> </td>
                                            </tr>
                                            <?php
                                            //  echo "</br>";
                                            // echo $value['work_price'];
                                            //$total_price = $total_price + $value['work_price'];
                                            ?>
                                    <?php
                                        }
                                    } else {
                                        echo " لا يوجد حجوزات خاصة بك في الوقت الحالي ";
                                    }
                                    ?>
                                    <?php
                                    if (isset($_SESSION['cart']) || isset($_SESSION['cart2'])) { ?>
                                        <tr>
                                            <td> المجموع </td>
                                            <td></td>
                                            <td class="total_price"> <?php echo $total_price; ?> <span> $ </span> </td>
                                            <td></td>
                                            <td class="total_price"> <?php echo $total_price2; ?> <span> $ </span> </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td> المجموع الكلي</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="total_price" id="total_price"> <?php echo ($total_price + $total_price2) ?> <span> $ </span></td>
                                            <td></td>
                                        </tr>
                                    <?php
                                    }

                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
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
                        value: <?= $total_price + $total_price2 ?>, // Can also reference a variable or function
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