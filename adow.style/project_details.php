<?php
ob_start();
session_start();
include 'init.php';
?>

<div class="cars hero faq">
    <div class="overlay">
        <div class="container data">
            <h2> Project Name </h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<!-- START PROJECT DETAILS -->
<div class="project_details">
    <div class="container">
        <div class="data">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="info">
                        <h2> Project Name </h2>
                        <img src="../uploads/art1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="info2">
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni atque doloribus nam velit
                            consectetur animi a dolor nemo architecto exercitationem, fugiat quisquam neque adipisci
                            impedit cum vel officia perferendis. Repudiandae?
                        </p>
                        <a href="invest_project.php" class="btn button"> Invest <i class="fa fa-chart-bar"></i> </a>
                    </div>
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