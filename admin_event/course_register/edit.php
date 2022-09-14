<?php

if (isset($_GET['register_id']) && is_numeric($_GET['register_id'])) {
    $register_id = $_GET['register_id'];
    $stmt = $connect->prepare('SELECT * FROM course_register WHERE reg_id=?');
    $stmt->execute([$register_id]);
    $alltype = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) {
?>
        <div class="container">

            <!-- start new data -->
            <div class="data">
                <div class="bread">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i class="fa fa-chevron-left"></i> </li>
                            <li class="breadcrumb-item active" aria-current="page"> مشاهدة تفاصيل التسجيل </li>
                        </ol>
                    </nav>
                </div>
                <div class="title text-right">
                    <h6> <i class="fa fa-edit"></i> مشاهدة تفاصيل التسجيل </h6>
                </div>

                <div class="myform">
                    <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <input type="hidden" name="register_id" value="<?php echo $register_id; ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box">
                                    <label id="name"> الاسم الاول </label>
                                    <input disabled required class="form-control" type="text" name="car_name" value="<?php echo $alltype['first_name']; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> الاسم الاخير </label>
                                    <input disabled required class="form-control" type="text" name="car_name" value="<?php echo $alltype['last_name']; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> البريد الالكتروني </label>
                                    <input disabled required class="form-control" type="text" name="car_name" value="<?php echo $alltype['email']; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> رقم الهاتف </label>
                                    <input disabled required class="form-control" type="text" name="car_name" value="<?php echo $alltype['mobile']; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> الدولة </label>
                                    <input disabled required class="form-control" type="text" name="car_name" value="<?php echo $alltype['country']; ?>">
                                </div>
                                <?php
                                $stmt = $connect->prepare("SELECT * FROM courses WHERE course_id=?");
                                $stmt->execute(array($alltype['course_id']));
                                $course_details = $stmt->fetch();

                                $course_name = $course_details['course_name'];
                                ?>


                            </div>
                            <div class="col-lg-6">
                                <?php
                                $stmt = $connect->prepare("SELECT * FROM courses WHERE course_id=?");
                                $stmt->execute(array($alltype['course_id']));
                                $course_details = $stmt->fetch();
                                $course_name = $course_details['course_name'];
                                ?>
                                <div class="box">
                                    <label id="name"> اسم الكورس </label>
                                    <textarea disabled name="" class="form-control"><?php echo $course_name; ?></textarea>
                                </div>
                                <div class="box">
                                    <label for=""> حالة التسجيل </label>
                                    <select class="form-control" name="register_status" id="country">
                                        <option value=""> اختر حالة التسجيل </option>
                                        <option value="قبول" <?php if ($alltype['country'] = "قبول") echo "selected" ?>> قبول </option>
                                        <option value="رفض" <?php if ($alltype['country'] = "رفض") echo "selected" ?>> رفض </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box submit_box">
                            <input class="btn btn-primary text-center" name="add_car" type="submit" value=" تعديل التسجيل ">
                        </div>
                    </form>
                </div>
            </div>
            <!-- end new data -->

        </div>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $register_status =  $_POST['register_status'];

            $stmt = $connect->prepare("UPDATE course_register SET reg_status=? WHERE reg_id=? ");
            $stmt->execute([
                $register_status,
                $register_id,
            ]);

            if ($stmt) { ?>
                <div class="container">
                    <div class="alert-success">
                        تم تعديل التسجيل بنجاح
                        <?php header('refresh:3;url=main.php?dir=course_register&page=report'); ?>
                    </div>
                </div>
    <?php }
        }
    }
} else {
    ?>
    <div class="container">
        <div class="alert alert-danger"> لا يوجد بيانات لهذا العنصر </div>
    </div>
<?php
}
