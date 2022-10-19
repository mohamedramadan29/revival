<?php
ob_start();
session_start();
include 'init.php';
if (isset($_GET['cat'])) {
    $cat = $_GET['cat'];
    if (isset($_GET['talent_id'])) {
        $talent_id = $_GET['talent_id'];
        $stmt = $connect->prepare("SELECT * FROM art_register WHERE art_register_id=?");
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
                    echo $talent_info['art_register_id'];
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
                        <h2> معلومات عن الموهبة </h2>
                        <ul class="list-unstyled">
                            <li> <span> الاسم الاول : </span> <?php echo $talent_info['first_name']; ?> </li>
                            <li> <span> الاسم الاخير : </span> <?php echo $talent_info['last_name']; ?> </li>
                            <li> <span> التخصص : </span> <?php echo $talent_info['specialist']; ?> </li>
                            <li> <span> الموهل العلمي : </span> <?php echo $talent_info['certificate']; ?> </li>
                            <li> <span> اللغات : </span> <?php echo $talent_info['language_speak']; ?></li>

                        </ul>

                    </div>
                    <div class="info2">
                        <h2> نبذة عن الموهبة </h2>
                        <p> <?php echo $talent_info['experience_info']; ?>
                        </p>
                        <a href="invest_project.php?cat=<?php echo $cat; ?>&talent_id=<?php if (isset($_GET['talent_id'])) {
                                                                                            echo $_GET['talent_id'];
                                                                                        } else {
                                                                                            echo $_GET['talent_id_sub'];
                                                                                        } ?> " class="btn button"> <?php echo $lang['invest_now']; ?> <i class="fa fa-chart-bar"></i>
                        </a>
                    </div>
                    <div class="return_talent">
                        <a href="artificial_project.php" class="btn btn-primary"> <?php echo $lang["return_to_talent"]; ?> <i class="fa fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2> الصور والفيديو الخاص بالموهبة </h2>
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $talent_images = $talent_info['talent_images'];
                            $talent_images = explode(" ", $talent_images);
                            $countfile = count($talent_images) - 1;
                            for ($i = 0; $i < 1; ++$i) { ?>
                                <div class="carousel-item active">
                                    <img src="admin/upload/<?= $talent_images[0] ?>" class="d-block w-100" alt="...">
                                </div>

                            <?php
                            }
                            for ($i = 1; $i < $countfile; ++$i) { ?>
                                <div class="carousel-item">
                                    <img src="admin/upload/<?= $talent_images[$i] ?>" class="d-block w-100" alt="...">
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="talent_video" style="background-image:url(admin/upload/<?php echo $talent_info['talent_images']; ?>)">
                        <div class="d-flex align-items-center pt-5">
                            <button type="button" class="btn-play" data-bs-toggle="modal" data-bs-target="#videoModal<?php
                                                                                                                        if (isset($_GET["talent_id"])) {
                                                                                                                            echo $talent_info['art_register_id'];
                                                                                                                        } elseif (isset($_GET["talent_id_sub"])) {
                                                                                                                            echo $talent_info['reg_id'];
                                                                                                                        }
                                                                                                                        ?>">
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-6 col-12">

                </div>
                <div class="col-lg-6 col-12">
                    <div class="info">


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- END PROJECT DETAILS -->
<!-- Video Modal Start -->
<div class="modal modal-video fade" id="videoModal<?php
                                                    if (isset($_GET["talent_id"])) {
                                                        echo $talent_info['art_register_id'];
                                                    } elseif (isset($_GET["talent_id_sub"])) {
                                                        echo $talent_info['reg_id'];
                                                    }
                                                    ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog video_model">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> 
                    <video width="100%" height="100%" controls src="admin/upload/<?php echo $talent_info['cv']; ?>">

                    </video>
                
            </div>
        </div>
    </div>
</div>
<!-- Video Modal End -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>