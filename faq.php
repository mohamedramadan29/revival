<?php
ob_start();
session_start();
include 'init.php';
?>

<div class="cars hero faq">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["faq_head1"]; ?></h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->

<!-- START FAQ SECTION -->
<div class="faq_section">
    <div class="container">
        <div class="accordion">
            <?php
            $stmt = $connect->prepare("SELECT * FROM faq");
            $stmt->execute();
            $allfaq = $stmt->fetchAll();
            foreach ($allfaq as $faq) { ?>
            <div class="accordion-item">
                <?php
                    if ($_SESSION["lang"] == "ar") { ?>
                <a><?php echo $faq["faq_q"]; ?></a>
                <div class="content">
                    <p> <?php echo $faq["faq_an"]; ?> </p>
                </div>
                <?php
                    } else { ?>
                <a> <?php echo $faq["faq_q_en"]; ?> </a>
                <div class="content">
                    <p> <?php echo $faq["faq_an_en"]; ?></p>
                </div>
                <?php
                    }
                    ?>

            </div>
            <?php
            }
            ?>
        </div>

    </div>
</div>
<!-- END FAQ SECTION -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>