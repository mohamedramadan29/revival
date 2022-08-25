<?php
ob_start();
session_start();
include 'init.php';
if (isset($_GET['cat'])) {
    $cat_name = $_GET['cat'];

    $stmt = $connect->prepare('SELECT * FROM articles WHERE article_category=?');
    $stmt->execute(array($cat_name));
    $article_data = $stmt->fetch();
}
?>
<!-- START HERO SECTION -->
<div class="cars hero faq">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["article_head2"]; ?> </h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<div class="articles">
    <div class="container-fluid">
        <div class="data">

            <div class="row">

                <?php
                $stmt = $connect->prepare("SELECT * FROM articles WHERE article_category = ? ORDER BY article_id DESC");
                $stmt->execute(array($cat_name));
                $allsportnews = $stmt->fetchAll();
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
                            <a href="article.php?article_id=<?php echo $sport_new["article_id"] ?>">
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
                                $desc_en =  $sport_new["article_desc_en"];
                                ?>
                        <p> <?php echo substr($desc_en, 0, 100); ?> <a
                                href="article.php?article_id=<?php echo $sport_new["article_id"] ?>">
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