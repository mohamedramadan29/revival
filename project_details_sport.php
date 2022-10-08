<?php
ob_start();
session_start();
include 'init.php';
if (isset($_GET['cat'])) {
    $cat = $_GET['cat'];
    if (isset($_GET['talent_id'])) {
        $talent_id = $_GET['talent_id'];
        $stmt = $connect->prepare("SELECT * FROM sport_register WHERE sport_register_id=?");
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
            <h2><?php echo $talent_info['first_name2']; ?> #
                <?php
                if (isset($_GET["talent_id"])) {
                    echo $talent_info['sport_register_id'];
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
                            <li> <span> الاسم الاول : </span> <?php echo $talent_info['first_name2']; ?> </li>
                            <li> <span> الاسم الاخير : </span> <?php echo $talent_info['last_name']; ?> </li>
                            <li> <span> التخصص : </span> <?php echo $talent_info['specialist']; ?> </li> 
                            <li> <span> الطول : </span> <?php echo $talent_info['player_taller']; ?> <span> cm </span> </li>
                            <li> <span> الوزن : </span> <?php echo $talent_info['player_weight']; ?> <span> Kg </span> </li>
                            <li> <span> العمر : </span> <?php echo $talent_info['player_position']; ?> </li>
                        </ul>
                    </div>

                    <div class="info2">
                        <h2> نبذة عن الموهبة </h2>
                        <p> <?php echo $talent_info['experience_info']; ?>
                        </p>
                        <a href="invest_project.php?cat=<?php echo $cat;?>&talent_id=<?php if(isset($_GET['talent_id'])){ echo $_GET['talent_id'] ;} else{
                            echo $_GET['talent_id_sub'];
                        } ?> " class="btn button"> <?php echo $lang['invest_now']; ?> <i class="fa fa-chart-bar"></i>
                        </a>
                    </div>
                    <div class="return_talent">
                        <a href="talent_project.php" class="btn btn-primary">  <?php echo $lang["return_to_talent"]; ?>  <i class="fa fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2> الصور والفيديو الخاص بالموهبة </h2>
                    <div class="talent_images">
                        <img src="admin/upload/<?php echo $talent_info['talent_image']; ?>" alt="">
                    </div>
                    <div class="talent_video"  style="background-image:url(admin/upload/<?php echo $talent_info['talent_image']; ?>)">
                        <div class="d-flex align-items-center pt-5">
                            <button type="button" class="btn-play" data-bs-toggle="modal" data-src="admin/upload/<?php echo $talent_info['video_talent']; ?>" data-bs-target="#videoModal">
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
<div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal End -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>