<?php
ob_start();
$pagetitle = ' لوحة تحكم ريفايفال ';
?>
<div class="container dashboard">
    <div class="bread bread_dasha">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> الاحداث </a> <i class="fa fa-chevron-left"></i> </li>
                <li class="breadcrumb-item active" aria-current="page"> <?php echo $lang['dashboard']; ?> </li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="small_box">
                <div class="icon">
                    <span> <i class="fa fa-cart-plus"></i> </span>
                </div>
                <div class="inner">
                    <span> المقالات </span>
                    <?php
                    $stmt = $connect->prepare(
                        'SELECT COUNT(article_id) FROM articles '
                    );
                    $stmt->execute();
                    $count = $stmt->fetchcolumn();
                    ?>
                    <h3> <?php echo $count; ?> </h3>
                </div>
                <div class="small_box_footer">
                    <p> <a href="main.php?dir=articles&page=add"> اضافة مقال </a> </p>
                    <p> <a href="main.php?dir=articles&page=report"> المقالات </a> </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="small_box">
                <div class="icon">
                    <span> <i class="fa fa-cart-plus"></i> </span>
                </div>
                <div class="inner">
                    <span> الاسئلة الشائعه </span>
                    <?php
                    $stmt = $connect->prepare(
                        'SELECT COUNT(faq_id) FROM faq '
                    );
                    $stmt->execute();
                    $count = $stmt->fetchcolumn();
                    ?>
                    <h3> <?php echo $count; ?> </h3>
                </div>
                <div class="small_box_footer">
                    <p> <a href="main.php?dir=faqs&page=add"> اضافة سوال </a> </p>
                    <p> <a href="main.php?dir=faqs&page=report"> الاسئلة </a> </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="small_box small_box2">

                <div class="icon">
                    <span> <i class="fa fa-cart-plus"></i> </span>
                </div>

                <div class="inner">
                    <span> الاخبار </span>
                    <?php
                    $stmt = $connect->prepare(
                        'SELECT COUNT(new_id) FROM news '
                    );
                    $stmt->execute();
                    $count = $stmt->fetchcolumn();
                    ?>
                    <h3> <?php echo $count; ?> </h3>

                </div>


                <div class="small_box_footer">
                    <p> <a href="main.php?dir=news&page=add"> اضافة خبر </a> </p>
                    <p> <a href="main.php?dir=news&page=report"> الاخبار </a> </p>
                </div>
            </div>
        </div>


    </div>

</div>


<?php ob_end_flush();
?>