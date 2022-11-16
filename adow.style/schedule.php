<?php
ob_start();
session_start();
$artificial_event = 'artificial_event';
include 'init.php';

$event_id = 4;
    //  echo $event_id;

    $stmt = $connect->prepare("SELECT * FROM main_events WHERE event_id=?");
    $stmt->execute(array($event_id));
    $event_data = $stmt->fetch();
    $event_name = $event_data["event_name"];
    //echo $event_name;
 
?>
<!-- START HERO SECTION -->
<div class="cars hero faq booking about_artificial_event">
    <div class="overlay">
        <div class="container data">
            <h2><?php echo $lang["sch_h1"];  ?></h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<div class="schedule">
    <div class="text-center event_scad_title">
        <h2> <?php echo $event_name;  ?> </h2>
    </div>
    <section class="timeline">

        <div class="outer">
            <?php
            $stmt = $connect->prepare("SELECT * FROM event_programme WHERE event_page=?");
            $stmt->execute(array($event_name));
            $about_event = $stmt->fetchAll();
            foreach ($about_event as $about) { ?>
                <div class="card">
                    <div class="info">
                        <h3 class="title"> <?php
                                            if ($_SESSION["lang"] == "ar") {
                                                echo $about["main_head"];
                                            } else {
                                                echo $about["main_head_en"];
                                            }
                                            ?> </h3>
                        <span> <?php echo $about["prog_date"]  ?> </span>
                        <h6> <?php
                                if ($_SESSION["lang"] == "ar") {
                                    echo $about["sub_head"];
                                } else {
                                    echo $about["sub_head_en"];
                                }; ?></h6>
                        <p>
                            <?php
                            if ($_SESSION["lang"] == "ar") {
                                $learn = $about['prog_desc'];
                            } else {
                                $learn = $about['prog_desc_en'];
                            }
                            $learn = explode(",", $learn);
                            $countfile = count($learn) - 1;
                            for ($i = 0; $i < $countfile; ++$i) { ?>
                        <p> <i class="fa fa-check"></i> <?= $learn[$i] ?> </p>
                    <?php
                            }
                    ?> </p>
                    <?php
                    if (!empty($about['first_team'])) { ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th> المبارة </th>
                                        <th> ملعب المبارة </th>
                                        <th> توقيت المبارة </th>
                                        <th> نتيجة المبارة </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <?php if ($_SESSION['lang'] == 'ar') {
                                                    echo $about['first_team'];
                                                    echo " - ";
                                                    echo $about['second_team'];
                                                } else {
                                                    echo $about['first_team_en'];
                                                    echo " - ";
                                                    echo $about['second_team_en'];
                                                } ?> </td>
                                        <td><?php
                                            if ($_SESSION['lang'] == 'ar') {
                                                echo $about['match_stad'];
                                            } else {
                                                echo $about['match_stad_en'];
                                            }
                                            ?> </td>
                                        <td><?php echo $about['match_time'];  ?></td>
                                        <td> <?php echo $about['match_resault'];  ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    }
                    ?>
                    <br>
                    <?php
                    if (!empty($about['work_name'])) { ?>
                        <div class="work_table">
                            <h2> <?php echo $about['work_name'];  ?> </h2>
                            <ul class="list-unstyled">
                                <li> <span> اسم الورشة : </span> <?php echo $about['work_name'];  ?> </li>
                                <li> <span>تاريخ الورشة :</span> <?php echo $about['work_date'];  ?> </li>
                                <li> <span> توقيت الورشة :</span> <?php echo $about['work_time'];  ?> </li>
                                <li> <span> مكان الورشة :</span> <?php echo $about['work_place'];  ?> </li>
                                <li> <span> مقدم الورشة :</span> <?php echo $about['work_speakers'];  ?> </li>
                                <li> <span> سعر الورشة :</span> <?php echo $about['work_price'];  ?> <span> $ </span></li>
                                <li> <span> سعر التسجيل المبكر :</span> <?php echo $about['work_dis_price'];  ?> <span> $ </span> </li>
                            </ul>
                        </div>
                    <?php
                    }
                    ?>
                    <br>
                    <?php
                    if (!empty($about['train_name'])) { ?>
                        <div class="work_table">
                            <h2> <?php echo $about['train_name'];  ?> </h2>
                            <ul class="list-unstyled">
                                <li> <span> اسم الدورة : </span> <?php echo $about['train_name'];  ?> </li>
                                <li> <span>تاريخ الدورة :</span> <?php echo $about['train_date'];  ?> </li>
                                <li> <span> توقيت الدورة :</span> <?php echo $about['train_time'];  ?> </li>
                                <li> <span> مكان الدورة :</span> <?php echo $about['train_place'];  ?> </li>
                                <li> <span> مقدم الدورة :</span> <?php echo $about['train_speaker'];  ?> </li>
                                <li> <span> عدد ايام الدورة :</span> <?php echo $about['train_days'];  ?> </li>
                                <li> <span> عدد ساعات الدورة :</span> <?php echo $about['train_hours'];  ?> </li>
                                <li> <span> سعر الدورة :</span> <?php echo $about['train_price'];  ?> <span> $ </span></li>
                                <li> <span> سعر التسجيل المبكر :</span> <?php echo $about['train_dis_price'];  ?> <span> $ </span> </li>
                            </ul>
                        </div>
                    <?php
                    }
                    ?>

                    </div>
                </div>
            <?php
            }
            ?>
            </ul>
        </div>
    </section>
</div>
<?php
include '../../' . $tem . 'footer_section.php';
include '../../' . $tem . 'footer.php';


?>