<?php

if (isset($_GET['register_id']) && is_numeric($_GET['register_id'])) {
    $register_id = $_GET['register_id'];
    $stmt = $connect->prepare('SELECT * FROM agency_register WHERE id=?');
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
                            <li class="breadcrumb-item active" aria-current="page"> مشاهدة المستخدم </li>
                        </ol>
                    </nav>
                </div>
                <div class="title text-right">
                    <h6> <i class="fa fa-edit"></i> مشاهدة المستخدم </h6>
                </div>

                <div class="myform">
                    <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <input type="hidden" name="register_id" value="<?php echo $register_id; ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box">
                                    <label id="name"> اسم الشركة </label>
                                    <input class="form-control" type="text" name="car_name" value="<?php echo $alltype['name']; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> البريد الالكتروني </label>
                                    <input class="form-control" type="text" name="car_name" value="<?php echo $alltype['email']; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> رقم الهاتف </label>
                                    <input class="form-control" type="text" name="car_name" value="<?php echo $alltype['phone']; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> الرقم الضريبي </label>
                                    <input class="form-control" type="text" name="car_name" value="<?php echo $alltype['tax_number']; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> الدولة </label>
                                    <input class="form-control" type="text" name="car_name" value="<?php echo $alltype['country']; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> اسم المستخدم  </label>
                                    <input class="form-control" type="text" name="car_name" value="<?php echo $alltype['username']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="box">
                                    <label id="name"> اكتب رسالة خاصة للمستخدم </label>
                                    <textarea name="customer_message" class="form-control"><?php echo $alltype['customer_message']; ?></textarea>
                                </div>
                                <div class="box">
                                    <label id="name"> حالة المستخدم </label>
                                    <select class="form-control" name="user_status" id="">
                                        <option value=""> اختر حالة المستخدم </option>
                                        <option <?php if ($alltype['user_status'] == 'active')  echo 'selected'; ?> value="active"> تفعيل </option>
                                        <option <?php if ($alltype['user_status'] == 'pending')  echo 'selected'; ?> value="pending"> تحت المراجعه </option>
                                    </select>
                                </div>
                                <?php
                                if (!empty($alltype['logo'])) {
                                ?>
                                    <div class="box">
                                        <label id="name"> لوجو الشركة </label>
                                        <img src="agency/uploads/<?php echo $alltype['logo']; ?>" alt="">
                                    </div>
                                <?php
                                }
                                ?>

                                <div class="box">
                                    <label id="name"> المرفقات </label>
                                    <div class="row">
                                        <?php
                                        $files1 = $alltype['attachment'];
                                        $files1 = explode(" ", $files1);
                                        $countfile = count($files1) - 1;
                                        if ($countfile > 0) {
                                            for ($i = 0; $i < $countfile; ++$i) {
                                        ?>
                                                <div class="col-12">

                                                    <div class="files_style">
                                                        <p> <a class="btn bg-gradient-light" target="_blank" href="agency/uploads/<?= $files1[$i] ?>">
                                                                <i class="fa fa-file"></i>
                                                                <?= $files1[$i] ?></a></p>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        } else { ?>
                                            <div class="alert alert-danger"> لا يوجد ملفات </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box submit_box">
                            <input class="btn btn-primary text-center" name="add_car" type="submit" value=" تعديل الحساب ">
                        </div>
                    </form>
                </div>
            </div>
            <!-- end new data -->
        </div>
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_status =  $_POST['user_status'];
            $customer_message =  $_POST['customer_message'];
            $stmt = $connect->prepare("UPDATE agency_register SET user_status=?,customer_message=? WHERE id =? ");
            $stmt->execute([
                $user_status,
                $customer_message,
                $register_id,
            ]);
            if ($stmt) { ?>
                <div class="container">
                    <div class="alert-success">
                        تم تعديل المستخدم بنجاح
                        <?php header('refresh:3;url=main.php?dir=agency&page=report'); ?>
                    </div>
                </div>
    <?php
                if ($alltype['user_active'] != 'active') {
                    // START GET EMAIL CONTENT  -->
                    $stmt = $connect->prepare("SELECT * FROM email_message WHERE email_section='تفعيل الحساب'");
                    $stmt->execute();
                    $emaildata = $stmt->fetchAll();
                    $stmt = $connect->prepare("SELECT * FROM agency_register WHERE user_status = 'active' AND id =?  ");
                    $stmt->execute(array($register_id));
                    $userdata = $stmt->fetch();
                    $useremail = $userdata["email"];
                    $to_email = $useremail;
                    $subject = "تفعيل حسابك في ريفايفال";
                    foreach ($emaildata as $data) {
                        if ($_SESSION['lang'] == 'ar') {
                            $body =  $data['email_text'];
                        } else {
                            $body =  $data['email_text_en'];
                        }
                    }
                    $headers = "From: info@revivals.site";
                    mail($to_email, $subject, $body, $headers);
                }
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
