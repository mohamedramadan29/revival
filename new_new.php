<?php
ob_start();
session_start();
include 'init.php';
if (isset($_GET['new_id'])) {
    $new_id = $_GET['new_id'];

    $stmt = $connect->prepare('SELECT * FROM news WHERE new_id=?');
    $stmt->execute(array($new_id));
    $article_data = $stmt->fetch();
}
?>
<!-- START HERO SECTION -->
<div class="cars hero faq">
    <div class="overlay">
        <div class="container data">
            <?php
            if ($_SESSION["lang"] == "ar") { ?>
            <h2><?php echo $article_data["new_title"]; ?></h2>
            <?php
            } else { ?>
            <h2><?php echo $article_data["new_title_en"]; ?></h2>
            <?php
            }
            ?>

        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<!-- START ARTIFICAIL IDEA -->
<div class="idea">
    <div class="container">
        <div class="data">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="info">
                        <?php
                        if ($_SESSION["lang"] == "ar") { ?>
                        <img src="admin/upload/<?php echo $article_data["image1"]; ?>" alt="">
                        <?php
                        } else { ?>
                        <img src="admin/upload/<?php echo $article_data["image2"]; ?>" alt="">
                        <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="col-lg-12 col-12">
                    <div class="info">
                        <?php
                        if ($_SESSION["lang"] == "ar") { ?>
                        <h3 class="text-center mt-3"><?php echo $article_data["new_title"]; ?></h3>
                        <p class="text-center"> <?php echo $article_data["new_desc"]; ?> </p>
                        <?php
                        } else { ?>
                        <h3 class="text-center mt-3"><?php echo $article_data["new_title_en"]; ?></h3>
                        <p class="text-center"> <?php echo $article_data["new_desc_en"]; ?> </p>
                        <?php
                        }
                        ?>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ARTIFICIAL IDEA -->

<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>