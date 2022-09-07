<?php
ob_start();
session_start();
include 'init.php';

$page_name = $_GET["page"];
//echo $page_name;

$stmt = $connect->prepare("SELECT * FROM revival_terms WHERE term_page=?");
$stmt->execute(array($page_name));
$allterms = $stmt->fetchall();

//$terms = $stmt->fetch();
?>
<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2>
                <?php

                foreach ($allterms as $terms) {
                    if ($_SESSION["lang"] == "ar") {

                        echo $terms["term_name"];
                    } else {

                        echo $terms["term_name_en"];
                    }
                }


                ?>
            </h2>

        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<!-- START HERO SECTION -->

<div class="privacy">
    <div class="container">
        <div class="data">

    <?php

            foreach ($allterms as $terms) {
                if ($_SESSION["lang"] == "ar") {
                    $data =  $terms["term_data"];
                } else {
                    $data =  $terms["term_data_en"];
                }
                $data = explode(",", $data);
                $countfile = count($data) - 1;
                for ($i = 0; $i < $countfile; ++$i) { ?>
                <p><i class="fa fa-check"></i> <?= $data[$i] ?> </p>
                <?php
                }
                
            }


            ?>
 
        </div>
    </div>
</div>
 
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>