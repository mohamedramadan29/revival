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
                                        <td> <?php if($_SESSION['lang'] == 'ar'){
                                            echo $about['first_team'];
                                            echo " - ";
                                            echo $about['second_team'];
                                        }else{
                                            echo $about['first_team_en'];
                                            echo " - ";
                                            echo $about['second_team_en'];
                                        } ?> </td>
                                        <td><?php 
                                        if($_SESSION['lang']=='ar'){
                                            echo $about['match_stad'];
                                        }else{
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