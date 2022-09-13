<?php
ob_start();
session_start();
include 'init.php';
?>
<!-- START HERO SECTION -->
<div class="cars hero faq">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["news_head2"]; ?> </h2>
        </div>
    </div>
</div>

<?php
if (isset($_GET['cat'])) {
    $cat_name = $_GET['cat'];

    $stmt = $connect->prepare('SELECT * FROM news WHERE new_category=?');
    $stmt->execute(array($cat_name));
    $article_data = $stmt->fetch();
} else {
    $stmt = $connect->prepare('SELECT * FROM news');
    $stmt->execute();
    $article_data = $stmt->fetch();
}
?>

<!-- END HERO SECTION -->
<div class="articles">
    <div class="container-fluid">
        <div class="data">

            <div class="row">

                <?php
                if (isset($_GET['cat'])) {
                    $stmt = $connect->prepare("SELECT * FROM news WHERE new_category = ? ORDER BY new_id DESC");
                    $stmt->execute(array($cat_name));
                    $allsportnews = $stmt->fetchAll();
                } else {
                    $stmt = $connect->prepare("SELECT * FROM news ORDER BY new_id DESC");
                    $stmt->execute();
                    $allsportnews = $stmt->fetchAll();
                }

                foreach ($allsportnews as $sport_new) {
                    if ($_SESSION["lang"] == "ar") { ?>
                <div class="col-lg-4">
                    <div class="art_info">
                        <div class="image">
                            <img src="admin/upload/<?php echo $sport_new["image1"] ?>" alt="">
                        </div>
                        <?php
                                $desc_ar =  $sport_new["new_desc"];
                                ?>
                        <p> <?php echo substr($desc_ar, 0, 100); ?>
                            <a href="new_new.php?new_id=<?php echo $sport_new["new_id"] ?>">
                                <?php echo $lang["read_more"] ?> </a>
                        </p>

                    </div>
                </div>
                <?php
                    } else { ?>
                <div class="col-lg-4">
                    <div class="art_info">
                        <div class="image">
                            <img src="admin/upload/<?php echo $sport_new["image2"] ?>" alt="">
                        </div>
                        <?php
                                $desc_en =  $sport_new["new_desc_en"];
                                ?>
                        <p> <?php echo substr($desc_en, 0, 100); ?> <a
                                href="new_new.php?new_id=<?php echo $sport_new["new_id"] ?>">
                                <?php echo $lang["read_more"] ?></a>
                        </p>

                    </div>
                </div>
                <?php
                    } ?>

                <?php
                }
                ?>

            </div>


        </div>
    </div>
</div>
</div>

<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>