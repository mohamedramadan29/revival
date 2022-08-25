<?php
ob_start();
session_start();
include 'init.php';
?>
<!-- START HERO SECTION -->
<div class="hero artif">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="overlay">
                </div>
                <img src="../uploads/art1.jpg" class="d-block w-100" alt="image1">
            </div>
            <div class="carousel-item">
                <div class="overlay"> </div>
                <img src="../uploads/art2.jpg" class="d-block w-100" alt="image2">
            </div>
            <div class="carousel-item">
                <div class="overlay"> </div>
                <img src="../uploads/art3.jpg" class="d-block w-100" alt="image3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="data container ">
        <h2> Aivr City </h2>
        <p> مدينة الذكاء الإصطناعي والواقع الإفتراضي</p>
    </div>
</div>
</div>
<!-- END HERO SECTION -->

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
<!-- START ABOUT -->
<div class="about about_artificial">
    <div class="container">
        <div class="data">
            <div class="row">
                <div class="col-lg-6 col-12 about_events">
                    <div class="d-flex align-items-center pt-5">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="../uploads/video.mp4"
                            data-bs-target="#videoModal">
                            <span></span>
                        </button>

                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="info">
                        <h3> انضم الان </h3>
                        <p> انضم الآن الى قائمة محترفي التقنية في نادي الذكاء الاصطناعي والميتافيرس التابع لمدينة Aivr
                            City أول مدينة ذكاء اصطناعي وواقع افتراضي في الشرق الأوسط التي تعمل على تطوير مشاريع
                            اقتصادية واجتماعية خاصة ومبتكرة في عالم الميتافيرس بعقول عباقرة العالم العربي والإسلامي لرسم
                            مستقبل الميتا فيرس ودعم التطوير التقني في العالم من خلال استثمار العقول الموهوبة ودعم
                            الأبحاث التقنية بطريقة تفاعلية جديدة ومبتكرة، تسهم في تحقيق نمو مستدام في الاقتصاد المعرفي،
                            وتحقيق التقدم التقني والمالي للمشاركين.... </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ABOUT -->
<!-- START EVENT PROGRAME -->
<div class="event_programe">
    <div class="container">
        <div class="data">
            <h2 class="text-center"> الأنشطة الرئيسية للنادي </h2>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="info">
                        <div class="image">
                            <img src="../uploads/art2.jpg" alt="">
                        </div>
                        <p> تكون فريق عمل عربي إسلامي لتطوير الانترنت والتقنية بشكل عام وفق آليات مخصصة لمواكبة
                            التقدم التقني بتقنيات وعقول إسلامية بطريقة تشاركية مبتكرة.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="info">
                        <div class="image">
                            <img src="../uploads/art1.jpg" alt="">
                        </div>
                        <p> انشاء مدينة متخصصة افتراضية تؤسس لصناعة وتطوير منتجات تعزز مجال "الذكاء الاصطناعي و
                            الواقع الافتراضي والمعزز والميتا فيرس، وتخدم الأبحاث في المجالات المذكورة وفق آلية مبتكرة
                            ومخطط لها تهدف الى وضع العالم العربي بشكل عام والدولة الحاضنة بشكل خاص في مصافي الدول
                            المتقدمة بتقنيات وعقول عربية وإسلامية لصناعة الاستقلال التقني.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END EVENT PROGRAME -->
<!-- START CONTACT SECTION -->
<div class="contact_us">
    <div class="overlay">
        <div class="container">
            <div class="data">
                <h2> سجل معا الان </h2>
                <p> بانضمامكم إلى نادي الذكاء الاصطناعي والميتافيرس ستعيدون تأكيد اكتشاف مواهبكم وابداعاتكم وتتاح لكم
                    الفرص بشكل تفاعلي للمشاركة في احداث عالمية والمساهمة في تأسيس مشاريع تقنية رائدة تنقلكم الى عالم
                    الابداع والحرية المالية، وبناء علاقات وشراكات دولية والالتقاء بالنخب العالمية في مجال الذكاء
                    الاصطناعي والميتافيرس لاكتساب الخبرات...لا تتردد بادر بالانضمام الينا..! المستقبل المشرق في انتظارك
                </p>
                <a href="revival_register.php" class="btn button"> سجل الان </a>
            </div>
        </div>
    </div>
</div>
<!-- END CONTACT SECTION -->
<!-- START VISION SECTION -->
<div class="vision">
    <div class="container">
        <div class="data">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="info">
                        <i class="fa-solid fa-bullseye"></i>
                        <h3> اهدافنا </h3>
                        <ul class="list-unstyled">
                            <li> ابتكار مشاريع إبداعية في مجال عالم الذكاء الافتراضي والميتا فيرس </li>
                            <li> استثمار المواهب والمعرفة لصناعة مستقبل تقني واعد</li>
                            <li> مواكبة العالم لإنتاج مشاريع تقنية تتوافق مع النظرة المستقبلية لتوجه العالم </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="info">
                        <i class="fa fa-signal"></i>
                        <h3> الرؤية </h3>
                        <p> الريادة العالمية في تطوير تقنيات الذكاء الإصطناعي في المجالات الصناعية والعلمية والتجارية
                            المستخدمة في الميتافيرس </p>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="info">
                        <i class="fa-solid fa-handshake-angle"></i>
                        <h3> رسالتنا </h3>
                        <p> المساهمة في تطوير تقنيات الذكاء الإصطناعي ودعم الأبحاث المخصصة فيها لإبتكار أجهزة جديدة تدعم
                            الميتا فيرس من خلال إستثمار نتاج عقول المواهب في العالم العربي والإسلامي وصناعة الإستدامة في
                            الإقتصاد المعرفي </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE SECTION -->

<!-- START ARTIFICIAL iNTELLIEGENCE PROJECT -->
<section class="ftco-section ftco-no-pt bg-light cars_sections art_sub_projects">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <h2 class="mb-2"> المشاريع </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-car owl-carousel">
                    <div class="item">
                        <div class="car-wrap ftco-animate">
                            <div class="img d-flex align-items-end" style="background-image: url(../uploads/art1.jpg);">
                            </div>
                            <div class="text">
                                <h3 class="mb-0"><a href="#"> paragraphs in websites </a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="car-wrap ftco-animate">
                            <div class="img d-flex align-items-end" style="background-image: url(../uploads/art2.jpg);">
                            </div>
                            <div class="text">
                                <h3 class="mb-0"><a href="#">Is it an alien language </a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="car-wrap ftco-animate">
                            <div class="img d-flex align-items-end" style="background-image: url(../uploads/art3.jpg);">
                            </div>
                            <div class="text">
                                <h3 class="mb-0"><a href="#"> construction </a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="car-wrap ftco-animate">
                            <div class="img d-flex align-items-end"
                                style="background-image: url(../uploads/fashion.jpg);">
                            </div>
                            <div class="text">
                                <h3 class="mb-0"><a href="#"> ready or available</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="car-wrap ftco-animate">
                            <div class="img d-flex align-items-end"
                                style="background-image: url(../uploads/header2.jpg);">
                            </div>
                            <div class="text">
                                <h3 class="mb-0"><a href="#"> real content is not ready </a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="car-wrap ftco-animate">
                            <div class="img d-flex align-items-end"
                                style="background-image: url(../uploads/header3.jpg);">
                            </div>
                            <div class="text">
                                <h3 class="mb-0"><a href="#"> Medical Project </a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="car-wrap ftco-animate">
                            <div class="img d-flex align-items-end"
                                style="background-image: url(../uploads/header4.jpg);">
                            </div>
                            <div class="text">
                                <h3 class="mb-0"><a href="#"> construction </a></h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="all-vec">
                <a href="artificial_project.php" class="btn text-center button m-auto"> جميع المشاريع </a>
            </div>
        </div>
    </div>
</section>
<!-- START ARTIFICIAL iNTELLIEGENCE PROJECT -->
<?php
include '../' . $tem . 'footer_section.php';
include '../' . $tem . 'footer.php';


?>