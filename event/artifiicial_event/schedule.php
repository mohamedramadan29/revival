<?php
ob_start();
session_start();
$artificial_event = 'artificial_event';
include 'init.php';
?>
<!-- START HERO SECTION -->
<div class="cars hero faq booking about_artificial_event">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["sch_h1"];  ?> </h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<div class="text-center event_scad_title">
    <h2> <?php echo $lang["sch_h2"];  ?></h2>
</div>
<section class="timeline">
    <ul>
        <li>
            <div>
                <time> <?php echo $lang["sch_h3"];  ?> </time>
                <?php echo $lang["sch_h4"];  ?>
            </div>
        </li>
        <li>
            <div>
                <time> <?php echo $lang["sch_h3"];  ?> </time>
                <?php echo $lang["sch_h4"];  ?>
            </div>
        </li>
        <li>
            <div>
                <time> <?php echo $lang["sch_h3"];  ?> </time>
                <?php echo $lang["sch_h4"];  ?>
            </div>
        </li>
        <li>
            <div>
                <time> <?php echo $lang["sch_h3"];  ?> </time>
                <?php echo $lang["sch_h4"];  ?>
            </div>
        </li>
        <li>
            <div>
                <time> <?php echo $lang["sch_h3"];  ?> </time>
                <?php echo $lang["sch_h4"];  ?>
            </div>
        </li>
        <li>
            <div>
                <time> <?php echo $lang["sch_h3"];  ?> </time>
                <?php echo $lang["sch_h4"];  ?>
            </div>
        </li>
        <li>
            <div>
                <time> <?php echo $lang["sch_h3"];  ?> </time>
                <?php echo $lang["sch_h4"];  ?>
            </div>
        </li>
        <li>
            <div>
                <time> <?php echo $lang["sch_h3"];  ?> </time>
                <?php echo $lang["sch_h4"];  ?>
            </div>
        </li>
        <li>
            <div>
                <time> <?php echo $lang["sch_h3"];  ?> </time>
                <?php echo $lang["sch_h4"];  ?>
            </div>
        </li>
        <li>
            <div>
                <time> <?php echo $lang["sch_h3"];  ?> </time>
                <?php echo $lang["sch_h4"];  ?>
            </div>
        </li>
    </ul>
</section>

<?php
include '../../' . $tem . 'footer_section.php';
include '../../' . $tem . 'footer.php';


?>