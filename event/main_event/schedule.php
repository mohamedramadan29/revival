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
<div class="text-center event_scad_title">
    <h2> <?php echo $event_name;  ?> </h2>
</div>
<section class="timeline">
    <ul>
        <?php
        $stmt = $connect->prepare("SELECT * FROM event_programme WHERE event_page=?");
        $stmt->execute(array($event_name));
        $about_event = $stmt->fetchAll();
        foreach ($about_event as $about) { ?>
            <li>
                <div>
                    <time> <?php
                    if($_SESSION["lang"] == "ar"){
                        echo $about["main_head"];
                    }else{
                        echo $about["main_head_en"];
                    }
                     ?></time>
                    <p> 
                        <?php
                        if($_SESSION["lang"] == "ar"){
                            echo $about["sub_head"];
                        }else{
                            echo $about["sub_head_en"];
                        }
                        ;?>
                    </p>
                    <?php
                    if ($_SESSION["lang"] == "ar") {
                        $learn = $about['prog_desc'];
                    } else {
                        $learn = $about['prog_desc_en'];
                    }
                    $learn = explode(",", $learn);
                    $countfile = count($learn) - 1;
                    for ($i = 0; $i < $countfile; ++$i) { ?>
                        <p> <?= $learn[$i] ?> </p>
                    <?php
                    }
                    ?>

                </div>
            </li>
        <?php
        }
        ?>
    </ul>
</section>

<?php
include '../../' . $tem . 'footer_section.php';
include '../../' . $tem . 'footer.php';


?>