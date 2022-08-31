<?php

if (isset($_GET['order_id']) && is_numeric($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $stmt = $connect->prepare('SELECT * FROM revival_order_services WHERE order_id=?');
    $stmt->execute([$order_id]);
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
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> طلب الخدمات </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-edit"></i> طلب الخدمات </h6>
        </div>

        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <input type="hidden" name="register_id" value="<?php echo $order_id; ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> الاسم الاول </label>
                            <input required class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['first_name']; ?>">
                        </div>
                        <div class="box">
                            <label id="name"> الاسم الاخير </label>
                            <input required class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['last_name']; ?>">
                        </div>
                        <div class="box">
                            <label id="name"> البريد الالكتروني </label>
                            <input required class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['email']; ?>">
                        </div>
                        <div class="box">
                            <label id="name"> رقم الهاتف </label>
                            <input required class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['mobile']; ?>">
                        </div>
                        <div class="box">
                            <label id="name"> الدولة </label>
                            <input required class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['country']; ?>">
                        </div>


                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> اسم الخدمة </label>
                            <input required class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['service_name']; ?>">
                        </div>
                        <div class="box">
                            <label id="name"> رسالة العميل </label>
                            <textarea name="" class="form-control"><?php echo $alltype['message']; ?></textarea>

                        </div>

                        <div class="box">

                            <label id="name"> الملفات </label>
                            <div class="row">
                                <?php
                                        $files1 = $alltype['files'];
                                        $files1 = explode(" ", $files1);
                                        $countfile = count($files1) - 1;
                                        if ($countfile > 0) {
                                            for ($i = 0; $i < $countfile; ++$i) {
                                        ?>
                                <div class="col-12">

                                    <div class="files_style">
                                        <p> <a class="btn bg-gradient-light" target="_blank"
                                                href="upload/<?= $files1[$i] ?>">
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
                <div class="box submit_box d-none">
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

            $stmt = $connect->prepare("UPDATE  art_register SET user_status=?,customer_message=? WHERE art_register_id  =? ");
            $stmt->execute([
                $user_status,
                $customer_message,
                $register_id,


            ]);

            if ($stmt) { ?>
<div class="container">
    <div class="alert-success">
        تم تعديل المستخدم بنجاح
        <?php header('refresh:3;url=main.php?dir=art_register&page=report'); ?>
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