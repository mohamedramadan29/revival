<?php
ob_start();
session_start();
include 'init.php';
?>

<div class="cars hero faq">
    <div class="overlay">
        <div class="container data">
            <h2> اسم الموهبة </h2>
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
                            <li> <span> مجال العمل : </span> الذكاء الاصطناعى</li>
                            <li> <span> التخصص : </span> البرمجة </li>
                            <li> <span> الموهل العلمي : </span> هندسة حاسبات ومعلومات</li>
                            <li> <span> اللغات : </span> العربية والانجليزية </li>

                        </ul>

                    </div>
                    <div class="info2">
                        <h2> نبذة عن الموهبة </h2>
                        <p>كن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار النشوة وتمجيد الألم نشأت بالفعل،
                            وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب
                            الشعور بالسعادة،
                            ول استنكار النشوة وتمجيد الألم نشأت بالفعل،
                            وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب
                            الشعور بالسعادة،
                            ول استنكار النشوة وتمجيد الألم نشأت بالفعل،
                            وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب
                            الشعور بالسعادة،
                        </p>
                        <a href="invest_project.php" class="btn button"> استثمر الان <i class="fa fa-chart-bar"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2> الصور والفيديو الخاص بالموهبة </h2>
                    <div class="talent_images">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="uploads/art1.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="uploads/art2.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="uploads/art3.jpg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="talent_video">
                        <div class="d-flex align-items-center pt-5">
                            <button type="button" class="btn-play" data-bs-toggle="modal" data-src="uploads/video.mp4"
                                data-bs-target="#videoModal">
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
<div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"> شركه ريفايفال </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                        allow="autoplay"></iframe>
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