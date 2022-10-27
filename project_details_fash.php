<?php
ob_start();
session_start();
include 'init.php';
if (isset($_GET['cat'])) {
    $cat = $_GET['cat'];
    if (isset($_GET['talent_id'])) {
        $talent_id = $_GET['talent_id'];
        $stmt = $connect->prepare("SELECT * FROM fash_register WHERE fash_register_id=?");
        $stmt->execute(array($talent_id));
        $talent_info = $stmt->fetch();
    } elseif (isset($_GET['talent_id_sub'])) {
        $talent_id_sub = $_GET['talent_id_sub'];
        $stmt = $connect->prepare("SELECT * FROM company_register WHERE reg_id=?");
        $stmt->execute(array($talent_id_sub));
        $talent_info = $stmt->fetch();
    }
}
?>
<div class="cars hero faq">
    <div class="overlay">
        <div class="container data">
            <h2><?php echo $talent_info['first_name']; ?> #
                <?php
                if (isset($_GET["talent_id"])) {
                    echo $talent_info['fash_register_id'];
                } elseif (isset($_GET["talent_id_sub"])) {
                    echo $talent_info['reg_id'];
                }
                ?>
            </h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<!-- START PROJECT DETAILS -->
<div class="project_details">
    <div class="container">
        <div class="data">

            <div class="row">
                <div class="col-lg-6">
                    <div class="info2">
                        <h2>    <?php echo $lang['info_about_talent']; ?>   </h2>
                        <ul class="list-unstyled">
                            <li> <span><?php echo $lang['first_name']; ?>: </span> <?php echo $talent_info['first_name']; ?> </li>
                            <li> <span><?php echo $lang['last_name']; ?>: </span> <?php echo $talent_info['last_name']; ?> </li>
                            <li> <span> <?php echo $lang['specialist']; ?> : </span> <?php echo $talent_info['specialist']; ?> </li>
                            <li> <span> <?php echo $lang['cartificate']; ?>: </span> <?php echo $talent_info['certificate']; ?> </li>

                        </ul>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info2">
                        <h2><?php echo $lang['sub_about_talent']; ?> </h2>

                        <p> <?php echo $talent_info['personal_information']; ?>
                        </p>
                        <a href="invest_project.php?cat=<?php echo $cat; ?>&talent_id=<?php if (isset($_GET['talent_id'])) {
                                                                                            echo $_GET['talent_id'];
                                                                                        } else {
                                                                                            echo $_GET['talent_id_sub'];
                                                                                        } ?> " class="btn button"> <?php echo $lang['invest_now']; ?> <i class="fa fa-chart-bar"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <h2><?php echo $lang['talent_images']; ?></h2>
                <div class="row">

                    <?php
                    $talent_images = $talent_info['talent_images'];
                    $talent_images = explode(" ", $talent_images);
                    $countfile = count($talent_images) - 1;
                    for ($i = 1; $i < $countfile; ++$i) { ?>
                        <div class="col-lg-3">
                            <div class="talent_images">
                                <img src="admin/upload/<?= $talent_images[$i] ?>" alt="">
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="col-lg-3">
                        <div class="talent_images">
                            <img src="admin/upload/<?php echo $talent_info['talent_images']; ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <h2><?php echo $lang['video_talent_show']; ?></h2>
                <div class="row">
                    <?php
                    $talent_videos = $talent_info['video_talent'];
                    $talent_videos = explode(" ", $talent_videos);
                    $countfile = count($talent_videos) - 1;
                    for ($i = 0; $i < $countfile; ++$i) { ?>
                        <div class="col-lg-4">
                            <div class="talent_images">
                                <video controls src="admin/upload/<?= $talent_videos[$i] ?>"></video>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="return_talent">
                    <a href="fashion_project.php" class="btn btn-primary"> <?php echo $lang["return_to_talent"]; ?> <i class="fa fa-arrow-left"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PROJECT DETAILS -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>