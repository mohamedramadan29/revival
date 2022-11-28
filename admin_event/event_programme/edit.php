<?php

if (isset($_GET['prog_id']) && is_numeric($_GET['prog_id'])) {
    $prog_id = $_GET['prog_id'];
    $stmt = $connect->prepare('SELECT * FROM event_programme WHERE prog_id=?');
    $stmt->execute([$prog_id]);
    $alltype = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) { ?>
        <div class="container">
            <!-- start new data -->
            <div class="data">
                <div class="bread">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> الاحداث </a> <i class="fa fa-chevron-left"></i> </li>
                            <li class="breadcrumb-item active" aria-current="page"> تعديل البرنامج </li>
                        </ol>
                    </nav>
                </div>
                <div class="title text-right">
                    <h6> <i class="fa fa-edit"></i>تعديل البرنامج </h6>
                </div>
                <div class="myform">
                    <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <input type="hidden" name="typ_id" value="<?php echo $prog_id; ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box">
                                    <label id="name"> الاسم
                                    </label>
                                    <input type="text" class="form-control" name="prog_name" value="<?php echo $alltype["prog_name"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> تاريخ الحدث
                                    </label>
                                    <input type="date" class="form-control" name="prog_date" value="<?php echo $alltype["prog_date"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> حدد اليوم
                                    </label>
                                    <input type="text" placeholder="اليوم الاول,اليوم الثاني , .... " class="form-control" name="prog_date_name" value="<?php echo $alltype['prog_date_name'] ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> سعر حضور اليوم
                                    </label>
                                    <input type="text" class="form-control" name="prog_date_price" value="<?php echo $alltype['prog_date_price']; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> عنوان الحدث
                                    </label>
                                    <input type="text" class="form-control" name="main_head" value="<?php echo $alltype["main_head"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> عنوان الحدث الانجليزية
                                    </label>
                                    <input type="text" class="form-control" name="main_head_en" value="<?php echo $alltype["main_head_en"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> العنوان الفرعي للحدث
                                    </label>
                                    <input type="text" placeholder="يمكنك اضافة اكثر من عنوان باضافة , " class="form-control" name="sub_head" value="<?php echo $alltype["sub_head"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> العنوان الفرعي الانجليزية
                                    </label>
                                    <input type="text" placeholder="يمكنك اضافة اكثر من عنوان باضافة , " class="form-control" name="sub_head_en" value="<?php echo $alltype["sub_head_en"]; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="box">
                                    <label id="name"> الوصف
                                    </label>
                                    <textarea name="prog_desc" class="form-control" placeholder="اذا كان الوصف عبارة عن عناصر ادخل بين كل عنصر والاخر ب (,)"><?php echo $alltype["prog_desc"]; ?></textarea>
                                </div>
                                <div class="box">
                                    <label id="name"> الوصف باللغه الانجليزية
                                    </label>
                                    <textarea name="prog_desc_en" class="form-control" placeholder="اذا كان الوصف عبارة عن عناصر ادخل بين كل عنصر والاخر ب (,)"><?php echo $alltype["prog_desc_en"]; ?></textarea>
                                </div>
                                <div class="box">
                                    <label id="name_en"> اختر الحدث <span> * </span></label>
                                    <select required class="form-control" name="event_page" id="cat_active6">
                                        <option value="">
                                            اختر الحدث </option>
                                        <?php
                                        $stmt = $connect->prepare("SELECT * FROM main_events");
                                        $stmt->execute();
                                        $allevent = $stmt->fetchAll();
                                        foreach ($allevent as $event) { ?>
                                            <option value="<?php echo $event["event_name"]; ?>" <?php if ($alltype["event_page"] == $event["event_name"]) echo "selected"; ?>> <?php echo $event["event_name"]; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="bg bg-primary text-center" style="font-size: 17px; padding:5px;"> اضافة ورشة العمل </h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="info">
                                    <div class="box">
                                        <label id="name"> اسم الورشة
                                        </label>
                                        <input type="text" class="form-control" name="work_name" value="<?php echo $alltype["work_name"]; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> تاريخ الورشة
                                        </label>
                                        <input type="date" class="form-control" name="work_date" value="<?php echo $alltype["work_date"]; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> اختر التوقيت
                                        </label>
                                        <input type="time" class="form-control" name="work_time" value="<?php echo $alltype["work_time"]; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> مكان الورشة
                                        </label>
                                        <input type="text" class="form-control" name="work_place" value="<?php echo $alltype["work_place"]; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info">
                                    <div class="box">
                                        <label id="name"> مقدم الورشة
                                        </label>
                                        <input type="text" class="form-control" name="work_speakers" value="<?php echo $alltype["work_speakers"]; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> سعر الورشة
                                        </label>
                                        <input type="text" class="form-control" name="work_price" value="<?php echo $alltype["work_price"]; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> سعر التسجيل المبكر
                                        </label>
                                        <input type="text" class="form-control" name="work_dis_price" value="<?php echo $alltype["work_dis_price"]; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h4 class="bg bg-primary text-center" style="font-size: 17px; padding:5px;"> اضافة دورة تدريبية</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="info">
                                    <div class="box">
                                        <label id="name"> اسم الدورة
                                        </label>
                                        <input type="text" class="form-control" name="train_name" value="<?php echo $alltype["train_name"]; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> تاريخ الدورة
                                        </label>
                                        <input type="date" class="form-control" name="train_date" value="<?php echo $alltype["train_date"]; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> اختر التوقيت
                                        </label>
                                        <input type="time" class="form-control" name="train_time" value="<?php echo $alltype["train_time"]; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> مكان الدورة
                                        </label>
                                        <input type="text" class="form-control" name="train_place" value="<?php echo $alltype["train_place"]; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> عدد الايام
                                        </label>
                                        <input type="text" class="form-control" name="train_days" value="<?php echo $alltype["train_days"]; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info">
                                    <div class="box">
                                        <label id="name"> مقدم الدورة
                                        </label>
                                        <input type="text" class="form-control" name="train_speaker" value="<?php echo $alltype["train_speaker"]; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> سعر الدورة
                                        </label>
                                        <input type="text" class="form-control" name="train_price" value="<?php echo $alltype["train_price"]; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> سعر التسجيل المبكر
                                        </label>
                                        <input type="text" class="form-control" name="train_dis_price" value="<?php echo $alltype["train_dis_price"]; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> عدد الساعات
                                        </label>
                                        <input type="text" class="form-control" name="train_hours" value="<?php echo $alltype["train_hours"]; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> وصف الدورة
                                        </label>
                                        <textarea name="train_desc" id="" class="form-control"><?php echo $alltype['train_desc']; ?></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="bg bg-primary text-center" style="font-size: 17px; padding:5px;"> اضافة مباراة للحدث</h4>
                        <div class="row">

                            <div class="col-lg-6">

                                <div class="info">
                                    <div class="box">
                                        <label id="name">الفريق الاول
                                        </label>
                                        <input type="text" class="form-control" name="first_team" value="<?php echo $alltype['first_team']; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> الفريق الاول باللغه الانجليزية
                                        </label>
                                        <input type="text" class="form-control" name="first_team_en" value="<?php echo $alltype['first_team_en']; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name">الفريق الثاني
                                        </label>
                                        <input type="text" class="form-control" name="second_team" value="<?php echo $alltype['second_team']; ?>">
                                    </div>

                                    <div class="box">
                                        <label id="name">الفريق الثاني باللغه الانجليزية
                                        </label>
                                        <input type="text" class="form-control" name="second_team_en" value="<?php echo $alltype['second_team_en']; ?>">
                                    </div>


                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info">
                                    <div class="box">
                                        <label id="name"> تاريخ المباراة
                                        </label>
                                        <input type="date" class="form-control" name="match_date" value="<?php echo $alltype['match_date']; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> توقيت المباراة
                                        </label>
                                        <input type="time" class="form-control" name="match_time" value="<?php echo $alltype['match_time']; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> ملعب المباراة
                                        </label>
                                        <input type="text" class="form-control" name="match_stad" value="<?php echo $alltype['match_stad']; ?>">
                                    </div>

                                    <div class="box">
                                        <label id="name"> ملعب المباراة باللغه الانجليزية
                                        </label>
                                        <input type="text" class="form-control" name="match_stad_en" value="<?php echo $alltype['match_stad_en']; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> نتيجة المباراة
                                        </label>
                                        <input type="text" class="form-control" name="match_resault" value="<?php echo $alltype['match_resault']; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> سعر الحجز
                                        </label>
                                        <input type="text" class="form-control" name="match_price" value="<?php echo $alltype['match_price']; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> سعر الحجز المبكر
                                        </label>
                                        <input type="text" class="form-control" name="match_price_disc" value="<?php echo $alltype['match_price_disc']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h4 class="bg bg-primary text-center" style="font-size: 17px; padding:5px;"> اضافة جلسة حوارية</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="info">
                                    <div class="box">
                                        <label id="name"> عنوان الجلسة
                                        </label>
                                        <input type="text" class="form-control" name="session_name" value="<?php echo $alltype['session_name']; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> عنوان الجلسة باللغه الانجليزية
                                        </label>
                                        <input type="text" class="form-control" name="session_name_en" value="<?php echo $alltype['session_name_en']; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> مقدم الجلسة
                                        </label>
                                        <input type="text" class="form-control" name="session_instruct" value="<?php echo $alltype['session_instruct']; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> المحاورين
                                        </label>
                                        <input type="text" placeholder="افصل بين كل محاور والاخر ب , " class="form-control" name="session_team" value="<?php echo $alltype['session_team']; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> تاريخ الجلسة
                                        </label>
                                        <input type="date" class="form-control" name="session_date" value="<?php echo $alltype['session_date']; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> وقت الجلسة
                                        </label>
                                        <input type="time" class="form-control" name="session_time" value="<?php echo $alltype['session_time']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info">
                                    <div class="box">
                                        <label id="name"> مكان الجلسة
                                        </label>
                                        <input type="text" class="form-control" name="session_place" value="<?php echo $alltype['session_place']; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> محاور الجلسة
                                        </label>
                                        <input type="text" class="form-control" name="session_session_name" value="<?php echo $alltype['session_session_name']; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> سعر الجلسة
                                        </label>
                                        <input type="text" class="form-control" name="session_price" value="<?php echo $alltype['session_price']; ?>">
                                    </div>
                                    <div class="box">
                                        <label id="name"> سعر التسجيل المبكر
                                        </label>
                                        <input type="text" class="form-control" name="session_dis_price" value="<?php echo $alltype['session_dis_price']; ?>">
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="box submit_box">
                            <input class="btn btn-primary" name="add_car" type="submit" value="  تعديل المحتوي   ">
                        </div>
                    </form>
                </div>
            </div>
            <!-- end new data -->

        </div>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $prog_name = $_POST["prog_name"];
            $prog_date = $_POST["prog_date"];
            $prog_date_name = $_POST["prog_date_name"];
            $prog_date_price = $_POST["prog_date_price"];
            $main_head = $_POST["main_head"];
            $main_head_en = $_POST["main_head_en"];
            $sub_head = $_POST["sub_head"];
            $sub_head_en = $_POST["sub_head_en"];
            $prog_desc = $_POST["prog_desc"];
            $prog_desc_en = $_POST["prog_desc_en"];
            $event_page = $_POST["event_page"];
            $first_team = $_POST['first_team'];
            $first_team_en = $_POST['first_team_en'];
            $second_team = $_POST['second_team'];
            $second_team_en = $_POST['second_team_en'];
            $match_date     = $_POST['match_date'];
            $match_time     = $_POST['match_time'];
            $match_stad     = $_POST['match_stad'];
            $match_stad_en     = $_POST['match_stad_en'];
            $match_resault     = $_POST['match_resault'];
            $match_price     = $_POST['match_price'];
            $match_price_disc     = $_POST['match_price_disc'];
            $work_date     = $_POST['work_date'];
            $work_time     = $_POST['work_time'];
            $work_place     = $_POST['work_place'];
            $work_speakers     = $_POST['work_speakers'];
            $work_price     = $_POST['work_price'];
            $work_dis_price     = $_POST['work_dis_price'];
            $work_name     = $_POST['work_name'];
            $train_name     = $_POST['train_name'];
            $train_date     = $_POST['train_date'];
            $train_time     = $_POST['train_time'];
            $train_place     = $_POST['train_place'];
            $train_speaker     = $_POST['train_speaker'];
            $train_price     = $_POST['train_price'];
            $train_desc     = $_POST['train_desc'];
            $train_hours     = $_POST['train_hours'];
            $train_days     = $_POST['train_days'];
            $train_dis_price     = $_POST['train_dis_price'];
            $session_name     = $_POST['session_name'];
            $session_name_en     = $_POST['session_name_en'];
            $session_instruct     = $_POST['session_instruct'];
            $session_team     = $_POST['session_team'];
            $session_date     = $_POST['session_date'];
            $session_time     = $_POST['session_time'];
            $session_place     = $_POST['session_place'];
            $session_session_name     = $_POST['session_session_name'];
            $session_price     = $_POST['session_price'];
            $session_dis_price     = $_POST['session_dis_price'];
            $formerror = [];
            if (empty($formerror)) {
                $stmt = $connect->prepare("UPDATE event_programme SET 
                    prog_name=?,prog_date=?,prog_date_name=?,prog_date_price=?,main_head=?,main_head_en=?,sub_head=?,sub_head_en=?,
                    prog_desc=?,prog_desc_en=?,event_page=?,first_team=?,first_team_en=?,second_team=?,
                    second_team_en=?,match_date=?,match_time=?,match_stad=?,match_stad_en=?,match_resault=?,match_price=?,match_price_disc=?,
                    work_date=?,work_time=?,work_place=?,work_speakers=?,work_price=?,work_dis_price=?,work_name=?,
                train_name=?,train_date=?,train_time=?,train_place=?,train_speaker=?,train_price=?,train_desc=?,
                train_hours=?,train_days=?,train_dis_price=?,session_name=?,session_name_en=?,
                session_instruct=?,session_team=?,session_date=?,session_time=?,
                session_place=?,session_session_name=?,session_price=?,session_dis_price=?
                WHERE prog_id =?");
                $stmt->execute([
                    $prog_name,  $prog_date, $prog_date_name, $prog_date_price, $main_head, $main_head_en,
                    $sub_head, $sub_head_en, $prog_desc, $prog_desc_en,
                    $event_page,  $first_team, $first_team_en,
                    $second_team, $second_team_en, $match_date, $match_time,
                    $match_stad, $match_stad_en,  $match_resault,$match_price,$match_price_disc,
                    $work_date, $work_time, $work_place,   $work_speakers,
                    $work_price,  $work_dis_price, $work_name,
                    $train_name, $train_date, $train_time,
                    $train_place, $train_speaker, $train_price, $train_desc,
                    $train_hours, $train_days, $train_dis_price,
                    $session_name, $session_name_en,
                    $session_instruct, $session_team, $session_date, $session_time,
                    $session_place, $session_session_name, $session_price, $session_dis_price,
                    $prog_id
                ]);
                if ($stmt) { ?>
                    <div class="container">
                        <div class="alert-success">
                            تم تعديل المحتوي بنجاح
                            <?php header('refresh:3,url=main.php?dir=event_programme&page=report'); ?>
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
