<?php
ob_start();
session_start();
$nonavbar = 'nonavbar';
include 'init.php';
?>
<!-- START HERO SECTION -->
<div class="hero">
    <div id="carouselExampleFade" class="carousel carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="overlay">
                </div>
                <img src="../../uploads/fash2.jpg" class="d-block w-100" alt="image1">
            </div>
        </div>
    </div>
    <div class="data container ">
        <h2> COMING SOON </h2>
    </div>
</div>
</div>
<!-- END HERO SECTION -->


<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>