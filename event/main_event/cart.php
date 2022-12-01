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


    // echo $day_now;
    // echo "</br>";


}
?>
<div class='cars hero faq booking'>
    <div class='overlay'>
        <div class='container data'>
            <h2> <?php echo $lang['watch_cart']; ?> </h2>
        </div>
    </div>
</div>
<div class='reservation'>

    <div class='container'>
        <div class='data'>
            <?php
            if (isset($_SESSION['cart'])) {
            ?>

                <div class='cart_section'>
                    <h2> <?php echo $lang['match_is_reserv'] ?></h2>

                    <div class='table-responsive'>
                        <table class='table text-center table-resposive table-hover table-bordered align-middle table-striped'>
                            <thead>
                                <tr>
                                    <th><?php echo $lang['event_name'] ?></th>
                                    <th><?php echo $lang['first_name'] ?></th>
                                    <th><?php echo $lang['second_team'] ?></th>
                                    <th> <?php echo $lang['price'] ?> </th>

                                </tr>
                            </thead>
                            <tbody>
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
                                                <?php echo $value['prog_name'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $value['first_team'];
                                                ?>
                                            </td>
                                            <td> <?php echo $value['second_team'];
                                                    ?> </td>
                                            <?php
                                            if ($day_now >= $early_register_start && $day_now <= $early_register_end) { ?>
                                                <td>
                                                    <?php echo $value['match_price_disc']; ?> <span> $ </span>
                                                </td>
                                            <?php

                                            } else {
                                            ?>
                                                <td>
                                                    <?php echo $value['match__price'];
                                                    ?> <span> $ </span>
                                                </td>
                                            <?php
                                            }

                                            ?>
                                            <!--
                                <td> <a href="deleteitem.php?id=<?php echo $value['prog_id']; ?>&event_id=<?php echo $event_id; ?>" class='btn btn-danger'> <i class='fa fa-trash'></i> </a> </td>
        -->
                                        </tr>
                                <?php
                                    }
                                } else {
                                    $wherein = 0;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            <?php

            }
            ?>

            <?php
            if (isset($_SESSION['cart2'])) {
            ?>

                <div class='cart_section'>
                    <h2> <?php echo $lang['course_booking'] ?></h2>

                    <div class='table-responsive'>
                        <table class='table text-center table-resposive table-hover table-bordered align-middle table-striped'>
                            <thead>
                                <tr>
                                    <th><?php echo $lang['event_name'] ?></th>
                                    <th><?php echo $lang['course_name'] ?></th>
                                    <th><?php echo $lang['course_date'] ?></th>
                                    <th> <?php echo $lang['price'] ?> </th>

                                </tr>
                            </thead>
                            <tbody>
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
                                                <?php echo $value['prog_name'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $value['train_name'];
                                                ?>
                                            </td>
                                            <td> <?php echo $value['train_date'];
                                                    ?> </td>
                                            <?php
                                            if ($day_now >= $early_register_start && $day_now <= $early_register_end) { ?>
                                                <td>
                                                    <?php echo $value['train_dis_price']; ?> <span> $ </span>
                                                </td>
                                            <?php
                                            } else {
                                            ?>
                                                <td>
                                                    <?php echo $value['train_price'];
                                                    ?> <span> $ </span>
                                                </td>
                                            <?php
                                            }

                                            ?>
                                            <!--
                                <td> <a href="deleteitem.php?id=<?php echo $value['prog_id']; ?>&event_id=<?php echo $event_id; ?>" class='btn btn-danger'> <i class='fa fa-trash'></i> </a> </td>
        -->
                                        </tr>
                                <?php
                                    }
                                } else {
                                    $wherein = 0;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            <?php

            }

            ?>

            <?php
            if (isset($_SESSION['cart3'])) {
            ?>
                <div class='cart_section'>
                    <h2> <?php echo $lang['reserve_all_days']; ?> </h2>

                    <div class='table-responsive'>
                        <table class='table text-center table-resposive table-hover table-bordered align-middle table-striped'>
                            <thead>
                                <tr>
                                    <th><?php echo $lang['event_name']; ?></th>
                                    <th><?php echo $lang['event_title']; ?></th>
                                    <th><?php echo $lang['event_date']; ?></th>
                                    <th> <?php echo $lang['price']; ?> </th>
                                </tr>
                            </thead>
                            <tbody>
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
                                                <?php echo $value['prog_name'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $value['main_head'];
                                                ?>
                                            </td>
                                            <td> <?php echo $value['prog_date'];
                                                    ?> </td>
                                            <?php
                                            if ($day_now >= $early_register_start && $day_now <= $early_register_end) { ?>
                                                <td>
                                                    <?php echo $value['prog_date_price_disc']; ?> <span> $ </span>
                                                </td>
                                            <?php

                                            } else {
                                            ?>
                                                <td>
                                                    <?php echo $value['prog_date_price'];
                                                    ?> <span> $ </span>
                                                </td>
                                            <?php
                                            }

                                            ?>

                                            <!--
                                <td> <a href="deleteitem.php?id=<?php echo $value['prog_id']; ?>&event_id=<?php echo $event_id; ?>" class='btn btn-danger'> <i class='fa fa-trash'></i> </a> </td>
        -->
                                        </tr>
                                <?php
                                    }
                                } else {
                                    $wherein = 0;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            <?php
            }

            ?>
            <br>
            <br>
            <div class='cart_section'>
                <div class='table-responsive'>
                    <table class='table text-center table-resposive table-hover table-bordered align-middle table-striped'>
                        <thead>
                            <tr>
                                <th> <?php echo $lang['total_price']; ?></th>
                                <th></th>
                                <th></th>
                                <th> <?php echo $total_price + $total_price2 + $total_price3 ?> <span> $ </span> </th>

                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
            <div class='complete_button'>
                <a href='checkout.php?event_id=<?php echo $event_id; ?>' class='btn btn-primary btn-block'>
                    <?php echo $lang['payment_is_completed']; ?>
                </a>
            </div>
            <br>
            <br>
        </div>
    </div>
</div>

<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';
?>