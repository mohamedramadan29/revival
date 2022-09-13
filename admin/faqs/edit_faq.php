<?php

if (isset($_GET['faq_id']) && is_numeric($_GET['faq_id'])) {
    $faq_id = $_GET['faq_id'];
    $stmt = $connect->prepare('SELECT * FROM faq WHERE faq_id=?');
    $stmt->execute([$faq_id]);
    $alltype = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) { ?>
<div class="container">

    <!-- start new data -->
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> <?php echo $lang['website_title']; ?> </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page">الاسئلة الشائعه</li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-edit"></i> الاسئلة الشائعه </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <input type="hidden" name="typ_id" value="<?php echo $faq_id; ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> السوال
                            </label>
                            <input required class="form-control" type="text" name="ques"
                                value="<?php echo $alltype["faq_q"]; ?>">
                        </div>
                        <div class="box">
                            <label id="name"> السوال باللغه الانجليزية
                            </label>
                            <input required class="form-control" type="text" name="ques_en"
                                value="<?php echo $alltype["faq_q_en"]; ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <label for=""> اجابة السوال </label>
                            <textarea name="answer1" id=""
                                class="form-control">  <?php echo $alltype["faq_an"]; ?> </textarea>
                        </div>
                        <div class="box">
                            <label for=""> اجابة السوال باللغه الانجليزية</label>
                            <textarea name="answer2" id=""
                                class="form-control"> <?php echo $alltype["faq_an_en"]; ?></textarea>
                        </div>
                    </div>
                    <div class="box submit_box">
                        <input class="btn btn-primary" name="add_car" type="submit" value="تعديل السوال">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end new data -->

</div>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // START IMAGE car_imageside
            $ques = $_POST['ques'];
            $ques_en = $_POST['ques_en'];
            $answer1 = $_POST['answer1'];
            $answer2 = $_POST['answer2'];
            $formerror = [];
            if (empty($ques)) {
                $formerror[] = 'Please Insert Question';
            }
            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }

            if (empty($formerror)) {
                $stmt = $connect->prepare("UPDATE faq SET faq_q=?,faq_q_en=?,
    faq_an=?,faq_an_en=?
        WHERE faq_id=?");
                $stmt->execute([
                    $ques,
                    $ques_en,
                    $answer1,
                    $answer2,
                    $faq_id,
                ]);
                if ($stmt) { ?>
<div class="container">
    <div class="alert-success">
        تم تعديل السوال بنجاح

        <?php header('refresh:3,url=main.php?dir=faqs&page=report'); ?>


    </div>
</div>

<?php }
            }
        }
    }
} else {
    ?>
<div class="container">
    <div class="alert alert-danger"> لا يوجد بيانات لهذا العنصر </div>
</div>
<?php
}