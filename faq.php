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
                            <?php
                            $faq_content = $faq['faq_an'];
                            if (strpos($faq_content, ",")) { ?>
                                <ul class="list-unstyled">
                                    <?php
                                    if ($_SESSION["lang"] == "ar") {
                                        $faq_content = $faq['faq_an'];
                                    }  
                                    $faq_content = explode(",", $faq_content);
                                    $countfile = count($faq_content) - 1;
                                    for ($i = 0; $i < $countfile; ++$i) { ?>
                                        <li>  <?= $faq_content[$i] ?> </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            <?php
                            }else{
                                ?>
                                <p> <?php echo $faq["faq_an"]; ?> </p>
                                <?php

                            } ?>
                        </div>
                    <?php
                    } else { ?>
                        <a> <?php echo $faq["faq_q_en"]; ?> </a>
                        <div class="content">
                            <?php
                            $faq_content = $faq['faq_an_en'];
                            if (strpos($faq_content, ",")) { ?>
                                <ul class="list-unstyled">
                                    <?php
                                    if ($_SESSION["lang"] == "ar") {
                                        $faq_content = $faq['faq_an_en'];
                                    }  
                                    $faq_content = explode(",", $faq_content);
                                    $countfile = count($faq_content) - 1;
                                    for ($i = 0; $i < $countfile; ++$i) { ?>
                                        <li>  <?= $faq_content[$i] ?> </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            <?php
                            }else{
                                ?>
                                <p> <?php echo $faq["faq_an_en"]; ?> </p>
                                <?php

                            } ?>
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