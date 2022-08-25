<?php
ob_start();
session_start();
$fashion_event = 'fashion_event';
include 'init.php';
?>

<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["art_register_h1"]; ?></h2>
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
                                    <label for="floatingInput"> <?php echo $lang["first_name"]; ?> <span class="star"> *
                                        </span> </label>
                                    <input type="text" class="form-control" id="floatingInput" placeholder="">
                                </div>
                                <div class="box mb-3">
                                    <label for="floatingInput"> <?php echo $lang["email"]; ?> <span class="star"> *
                                        </span> </label>
                                    <input type="email" class="form-control" id="floatingInput" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="box mb-3">
                                    <label for="floatingInput"> <?php echo $lang["last_name"]; ?> <span class="star"> *
                                        </span> </label>
                                    <input type="text" class="form-control" id="floatingInput" placeholder="">

                                </div>
                                <div class="box mb-3">
                                    <!--
                                        <input name="mobile" type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com">-->
                                    <label for="floatingInput"> <?php echo $lang["mobile"];  ?> <span class="star">
                                            * </span></label>
                                    <input type="tel" name="mobile" id="phone" class="form-control"
                                        value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['mobile']; ?> ">

                                </div>
                                <div class="box mb-3">
                                    <label for="selectcountry"><?php echo $lang["country"];  ?></label>
                                    <select name="country" class="form-select country3" id="selectcountry"
                                        aria-label="Floating label select example">

                                        <?php
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                        <option
                                            value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['country']; ?>">
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
                                            <?php echo $country["country_arName"]; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="event_table_price table-responsive">
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
                                            <button type="button" class="btn button" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">
                                                <?php echo $lang["select_event"];  ?>
                                            </button>
                                        </td>
                                        <td> 100 <span> $ </span> </td>

                                    </tr>
                                    <tr>
                                        <td> <?php echo $lang["second_day"];  ?></td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn button" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">
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

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
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
                                        <label class="form-check-label" for="check1"> حضور ايفنت المواهب الرياضة
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
                <div class="col-lg-12 cars_sections">
                    <div class="item">
                        <div class="car-wrap rounded ftco-animate">
                            <div class="text">
                                <div class="">
                                    <div class="reservation_button">
                                        <button type="submit" class="btn btn-primary"> <?php echo $lang["register"];  ?>
                                        </button>
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