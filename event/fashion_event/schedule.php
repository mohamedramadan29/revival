<?php
ob_start();
session_start();
$fashion_event = 'fashion_event';
include 'init.php';
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
    <h2> <?php echo $lang["sch_h2"];  ?> </h2>
</div>
<section class="timeline">

    <ul>
        <li>
            <div>
                <time> <?php echo $lang["sch_h3"];  ?></time>
                <p><?php echo $lang["sch_h4"];  ?></p>
                <p> <?php echo $lang["sch_h6"];  ?></p>


            </div>
        </li>
        <li>
            <div>
                <time> <?php echo $lang["sch_h7"];  ?> </time>
                <h6> <?php echo $lang["sch_h8"];  ?></h6>
                <p> <?php echo $lang["sch_h9"];  ?></p>
                <p> <?php echo $lang["sch_h10"];  ?> </p>
                <p> <?php echo $lang["sch_h11"];  ?> </p>
                <p> <?php echo $lang["sch_h12"];  ?> </p>
                <p> <?php echo $lang["sch_h13"];  ?> </p>
                <p> <?php echo $lang["sch_h14"];  ?> </p>
            </div>
        </li>
        <li>
            <div>
                <time> <?php echo $lang["sch_h16"];  ?></time>
                <h6><?php echo $lang["sch_h17"];  ?> </h6>
                <p> <?php echo $lang["sch_h18"];  ?> </p>
                <p> <?php echo $lang["sch_h19"];  ?> </p>
                <p> <?php echo $lang["sch_h20"];  ?> </p>
                <p> <?php echo $lang["sch_h21"];  ?> </p>

            </div>
        </li>
        <li>
            <div>
                <time> <?php echo $lang["sch_h22"];  ?> </time>
                <h6><?php echo $lang["sch_h23"];  ?> </h6>
                <p> <?php echo $lang["sch_h24"];  ?> </p>
                <p> <?php echo $lang["sch_h26"];  ?> </p>
                <p> <?php echo $lang["sch_h27"];  ?> </p>
                <p> <?php echo $lang["sch_h28"];  ?> </p>
                <p> <?php echo $lang["sch_h29"];  ?> </p>
                <p> <?php echo $lang["sch_h30"];  ?> </p>
                <p> <?php echo $lang["sch_h31"];  ?> </p>
                <p> <?php echo $lang["sch_h32"];  ?> </p>


            </div>
        </li>
        <li>
            <div>
                <time> <?php echo $lang["sch_h33"];  ?> </time>

                <p> <?php echo $lang["sch_h34"];  ?> </p>
            </div>
        </li>
        <li>
            <div>
                <time> <?php echo $lang["sch_h36"];  ?> </time>
                <h6> <?php echo $lang["sch_h37"];  ?>
                </h6>
                <p> <?php echo $lang["sch_h38"];  ?> </p>
                <p> <?php echo $lang["sch_h39"];  ?> </p>
                <p> <?php echo $lang["sch_h40"];  ?> </p>
                <p> <?php echo $lang["sch_h41"];  ?> </p>
                <p> <?php echo $lang["sch_h42"];  ?> </p>
                <p> <?php echo $lang["sch_h43"];  ?> </p>
                <p> <?php echo $lang["sch_h44"];  ?> </p>

            </div>
        </li>
        <li>
            <div>
                <time><?php echo $lang["sch_h46"];  ?> </time>
                <h6> <?php echo $lang["sch_h47"];  ?> </h6>
                <p> <?php echo $lang["sch_h48"];  ?> </p>
                <p> <?php echo $lang["sch_h49"];  ?> </p>
                <p> <?php echo $lang["sch_h60"];  ?> </p>
                <p> <?php echo $lang["sch_h61"];  ?> </p>
                <p> <?php echo $lang["sch_h62"];  ?> </p>
                <p> <?php echo $lang["sch_h63"];  ?> </p>
            </div>
        </li>
        <li>
            <div>
                <time> <?php echo $lang["sch_h64"];  ?> </time>

                <p> <?php echo $lang["sch_h66"];  ?> </p>
                <p> <?php echo $lang["sch_h67"];  ?>

            </div>
        </li>

        <li>
            <div>
                <time> <?php echo $lang["sch_h68"];  ?> </time>
                <p> <?php echo $lang["sch_h69"];  ?> </p>
                <p> <?php echo $lang["sch_h70"];  ?> </p>
                <p> <?php echo $lang["sch_h71"];  ?> </p>
                <p> <?php echo $lang["sch_h72"];  ?> </p>
                <p> <?php echo $lang["sch_h73"];  ?> </p>

            </div>
        </li>

    </ul>
</section>

<?php
include '../../' . $tem . 'footer_section.php';
include '../../' . $tem . 'footer.php';


?>