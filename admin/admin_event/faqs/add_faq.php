<div class="container">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> الاحداث </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> الاسئلة الشائعه </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-plus"></i> الاسئلة الشائعه </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> السوال
                            </label>
                            <input required class="form-control" type="text" name="ques">
                        </div>
                        <div class="box">
                            <label id="name"> السوال باللغه الانجليزية
                            </label>
                            <input required class="form-control" type="text" name="ques_en">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <label for=""> اجابة السوال </label>
                            <textarea name="answer1" id="" class="form-control"></textarea>
                        </div>
                        <div class="box">
                            <label for=""> اجابة السوال باللغه الانجليزية</label>
                            <textarea name="answer2" id="" class="form-control"></textarea>
                        </div>

                    </div>

                    <div class="box submit_box">
                        <input class="btn btn-primary" name="add_car" type="submit" value="اضافه سوال">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['add_car'])) {

            $ques = $_POST['ques'];
            $ques_en = $_POST['ques_en'];
            $answer1 = $_POST['answer1'];
            $answer2 = $_POST['answer2'];

            /// More Validation To Show Error
            $formerror = [];
            if (empty($ques)) {
                $formerror[] = 'Please Insert Ques';
            }
            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }

            if (empty($formerror)) {
                $stmt = $connect->prepare("INSERT INTO event_faq (faq_q,faq_q_en,
                faq_an , faq_an_en)
                VALUES (:zfaq_q,:zfaq_q_en,:zfaq_an,:zfaq_an_en)");
                $stmt->execute([
                    'zfaq_q' => $ques,
                    'zfaq_q_en' => $ques_en,
                    'zfaq_an' => $answer1,
                    'zfaq_an_en' => $answer2,
                ]);
                if ($stmt) { ?>
    <div class="alert-success">
        تم اضافة سوال جديد بنجاح
        <?php header('refresh:3;url=main.php?dir=faqs&page=report'); ?>
    </div>

</div>

<?php }
            }
        }
    }