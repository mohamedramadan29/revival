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

                        <div class="row">

                            <?php
if (isset($_GET['true']) == "created") {
?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> <?php echo $lang["fants"]; ?> </strong>
                                <?php echo $lang["reserv_add_to_cart_suc"]; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php
}
?>
                        </div>
                        <div class="info">

                            <!-- START NEW REGISTERATION -->

                            <div class="event_table_price table-responsive">
                                <h2> <?php echo $lang["matches_table"]; ?> </h2>
                                <table
                                    class="table table-resposive table-hover table-bordered align-middle table-striped">
                                    <thead>
                                        <tr>
                                            <th> <?php echo $lang["event_name"]; ?> </th>
                                            <th> <?php echo $lang["matches"]; ?> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $connect->prepare("SELECT * FROM event_programme WHERE event_page=? AND first_team != ' ' ");
                                        $stmt->execute(array($event_name));
                                        $event_work_data = $stmt->fetchAll();
                                        foreach ($event_work_data as $event_data) { ?>
                                        <tr>
                                            <td> <?php echo $event_data["prog_name"]; ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <?php
                                                    if (!empty($event_data["first_team"])) { ?>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdropworks<?php echo $event_data["prog_id"]; ?>">
                                                    <?php echo $lang['show_details']; ?><i class="fa fa-eye"></i>
                                                </button>
                                                <a class="btn btn-primary btn-sm"
                                                    href="addCart.php?id=<?php echo $event_data['prog_id'];?>&event_id=<?php echo $event_id ?>">
                                                    <?php echo $lang['add_to_cart']; ?><i class="fa fa-cart-plus"></i>
                                                </a>
                                                <?php
                                                    } else { ?>
                                                <button type="button" class="btn btn-danger btn-sm">
                                                    لا يوجد مباريات
                                                </button>

                                                <?php
                                                    }
                                                    ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade"
                                            id="staticBackdropworks<?php echo $event_data["prog_id"]; ?>"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">
                                                            <?php echo $lang['book_matches']; ?>
                                                        </h5>
                                                    </div>
                                                    <div class="modal-body work_data_reserve">
                                                        <ul class="list-unstyled">
                                                            <li> <span> <?php echo $lang['first_team'] ?>: </span>
                                                                <?php echo $event_data['first_team'];  ?> </li>
                                                            <li> <span> <?php echo $lang['second_team'] ?>:</span>
                                                                <?php echo $event_data['second_team'];  ?> </li>
                                                            <li> <span> <?php echo $lang['match_date'] ?>:</span>
                                                                <?php echo $event_data['match_date'];  ?> </li>
                                                            <li> <span><?php echo $lang['match_time'] ?> :</span>
                                                                <?php echo $event_data['match_time'];  ?> </li>
                                                            <li> <span> <?php echo $lang['match_place'] ?> :</span>
                                                                <?php echo $event_data['match_stad'];  ?> </li>
                                                            <li> <span> <?php echo $lang['match_price'] ?>:</span>
                                                                <?php echo $event_data['match_price'];  ?> <span> $
                                                                </span></li>
                                                            <!--  <li> <span> سعر التسجيل المبكر :</span> <?php echo $event_data['work_dis_price'];  ?> <span> $ </span> </li> -->
                                                        </ul>
                                                    </div>
                                                    <div class="modal-footer flex-row justify-content-between">
                                                        <button type="button" class="btn btn-danger flex-start"
                                                            data-bs-dismiss="modal">
                                                            <i class="fa fa-close"></i></button>
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

                            <!-- END NEW REGISTERATION -->

                            <!-- START NEW REGISTERATION -->

                            <div class="event_table_price table-responsive">
                                <h2><?php echo $lang['sc_av_courses'] ?></h2>
                                <table
                                    class="table table-resposive table-hover table-bordered align-middle table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php echo $event_data["prog_name"]; ?></th>
                                            <th> <?php echo $lang['courses'] ?> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $connect->prepare("SELECT * FROM event_programme WHERE event_page=? AND train_name != ' ' ");
                                        $stmt->execute(array($event_name));
                                        $event_work_data = $stmt->fetchAll();
                                        foreach ($event_work_data as $event_data) { ?>
                                        <tr>
                                            <td> <?php echo $event_data["prog_name"]; ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <?php
                                                    if (!empty($event_data["train_name"])) { ?>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdropworkstrain<?php echo $event_data["prog_id"]; ?>">
                                                    <?php echo $lang['show_details']; ?><i class="fa fa-eye"></i>
                                                </button>
                                                <a class="btn btn-primary btn-sm"
                                                    href="addCart2.php?id=<?php echo $event_data['prog_id']; ?>&event_id=<?php echo $event_id ?>">
                                                    <?php echo $lang['add_to_cart']; ?><i class="fa fa-cart-plus"></i>
                                                </a>
                                                <?php
                                                    } else { ?>
                                                <button type="button" class="btn btn-danger btn-sm">
                                                    لا يوجد دورات
                                                </button>
                                                <?php
                                                    }
                                                    ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade"
                                            id="staticBackdropworkstrain<?php echo $event_data["prog_id"]; ?>"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">
                                                            <?php echo $lang['course_reserv']; ?>
                                                        </h5>
                                                    </div>
                                                    <div class="modal-body work_data_reserve">
                                                        <ul class="list-unstyled">
                                                            <li> <span> <?php echo $lang['course_name']; ?>: </span>
                                                                <?php echo $event_data['train_name'];  ?> </li>
                                                            <li> <span> <?php echo $lang['course_date']; ?> :</span>
                                                                <?php echo $event_data['train_date'];  ?> </li>
                                                            <li> <span><?php echo $lang['course_time']; ?>:</span>
                                                                <?php echo $event_data['train_time'];  ?> </li>
                                                            <li> <span><?php echo $lang['course_place']; ?>:</span>
                                                                <?php echo $event_data['train_place'];  ?> </li>
                                                            <li> <span><?php echo $lang['course_instructor']; ?>:</span>
                                                                <?php echo $event_data['train_speaker'];  ?> </li>
                                                            <li> <span><?php echo $lang['course_days_num']; ?>:</span>
                                                                <?php echo $event_data['train_days'];  ?> </li>
                                                            <li> <span><?php echo $lang['course_num_hour']; ?>:</span>
                                                                <?php echo $event_data['train_hours'];  ?> </li>
                                                            <li> <span> <?php echo $lang['course_price'];  ?>
                                                                    :</span>
                                                                <?php echo $event_data['train_price'];  ?> <span> $
                                                                </span></li>

                                                        </ul>
                                                    </div>
                                                    <div class="modal-footer flex-row justify-content-between">
                                                        <button type="button" class="btn btn-danger flex-start"
                                                            data-bs-dismiss="modal">
                                                            <i class="fa fa-close"></i></button>
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

                            <!-- END NEW REGISTERATION -->


                            <!-- START NEW REGISTERATION -->

                            <div class="event_table_price table-responsive">
                                <h2> <?php echo $lang['reserv_all_day']; ?> </h2>
                                <table
                                    class="table table-resposive table-hover table-bordered align-middle table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php echo $event_data["prog_name"]; ?></th>
                                            <th> <?php echo $lang['the_day']; ?> </th>
                                            <th> <?php echo $lang['price']; ?> </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $connect->prepare("SELECT * FROM event_programme WHERE event_page=? AND prog_date_name != ' ' ");
                                        $stmt->execute(array($event_name));
                                        $event_work_data = $stmt->fetchAll();
                                        foreach ($event_work_data as $event_data) { ?>
                                        <tr>
                                            <td> <?php echo $event_data["prog_name"]; ?></td>
                                            <td> <?php echo $event_data["prog_date_price"]; ?></td>
                                            <td> <?php echo $event_data["prog_date_name"]; ?></td>

                                            <td>
                                                <!-- Button trigger modal -->
                                                <?php
                                                    if (!empty($event_data["prog_date_name"])) { ?>

                                                <a class="btn btn-primary btn-sm"
                                                    href="addCart3.php?id=<?php echo $event_data['prog_id']; ?>&event_id=<?php echo $event_id ?>">
                                                    <?php echo $lang['add_to_cart']; ?><i class="fa fa-cart-plus"></i>
                                                </a>
                                                <?php
                                                    } else { ?>
                                                <button type="button" class="btn btn-danger btn-sm">
                                                    لا يوجد دورات
                                                </button>
                                                <?php
                                                    }
                                                    ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade"
                                            id="staticBackdropworkstrain<?php echo $event_data["prog_id"]; ?>"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel"> حجز الدورات
                                                        </h5>
                                                    </div>
                                                    <div class="modal-body work_data_reserve">
                                                        <ul class="list-unstyled">
                                                            <li> <span> اسم الدورة : </span>
                                                                <?php echo $event_data['train_name'];  ?> </li>
                                                            <li> <span>تاريخ الدورة :</span>
                                                                <?php echo $event_data['train_date'];  ?> </li>
                                                            <li> <span> توقيت الدورة :</span>
                                                                <?php echo $event_data['train_time'];  ?> </li>
                                                            <li> <span> مكان الدورة :</span>
                                                                <?php echo $event_data['train_place'];  ?> </li>
                                                            <li> <span> مقدم الدورة :</span>
                                                                <?php echo $event_data['train_speaker'];  ?> </li>
                                                            <li> <span> عدد ايام الدورة :</span>
                                                                <?php echo $event_data['train_days'];  ?> </li>
                                                            <li> <span> عدد ساعات الدورة :</span>
                                                                <?php echo $event_data['train_hours'];  ?> </li>
                                                            <li> <span> سعر الدورة :</span>
                                                                <?php echo $event_data['train_price'];  ?> <span> $
                                                                </span></li>

                                                        </ul>
                                                    </div>
                                                    <div class="modal-footer flex-row justify-content-between">
                                                        <button type="button" class="btn btn-danger flex-start"
                                                            data-bs-dismiss="modal">
                                                            <i class="fa fa-close"></i></button>
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
                            <?php if(isset($_SESSION['cart']) || isset($_SESSION['cart2']) || isset($_SESSION['cart3'])){?>
                            <div class="container">
                                <br>
                                <div class="cart_div text-center">
                                    <a href="cart.php?event_id=<?php echo $event_id ?>"
                                        class="btn btn-primary btn-block"> <?php echo $lang['watch_cart']; ?>
                                        <i class="fa fa-cart-plus"></i></a>
                                </div>
                                <br>
                                <br>
                            </div>
                            <?php

                            } ?>


                            <!-- END NEW REGISTERATION -->

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