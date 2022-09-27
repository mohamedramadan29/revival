<?php

if (isset($_GET['invest_id']) && is_numeric($_GET['invest_id'])) {
    $invest_id = $_GET['invest_id'];
    $stmt = $connect->prepare('SELECT * FROM investment WHERE invest_id  =?');
    $stmt->execute([$invest_id]);
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
                            <li class="breadcrumb-item active" aria-current="page"> الاستثمار في المواهب </li>
                        </ol>
                    </nav>
                </div>
                <div class="title text-right">
                    <h6> <i class="fa fa-edit"></i> الاستثمار في المواهب </h6>
                </div>

                <div class="myform">
                    <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <input type="hidden" name="register_id" value="<?php echo $register_id; ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box">
                                    <label id="name"> الاسم الاول </label>
                                    <input class="form-control" type="text" name="car_name" value="<?php echo $alltype['first_name']; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> الاسم الاخير </label>
                                    <input class="form-control" type="text" name="car_name" value="<?php echo $alltype['last_name']; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> البريد الالكتروني </label>
                                    <input class="form-control" type="text" name="car_name" value="<?php echo $alltype['email']; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> رقم الهاتف </label>
                                    <input class="form-control" type="text" name="car_name" value="<?php echo $alltype['mobile']; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> الدولة </label>
                                    <input class="form-control" type="text" name="car_name" value="<?php echo $alltype['country']; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> اسم المنشأة </label>
                                    <input class="form-control" type="text" name="car_name" value="<?php echo $alltype['facility_name']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="box submit_box">
                            <input class="btn btn-primary text-center" name="add_car" type="submit" value=" تعديل   ">
                        </div>
                    </form>
                </div>
            </div>
            <!-- end new data -->

        </div>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user_status =  $_POST['user_status'];
            $user_show =  $_POST['user_show'];
            $customer_message =  $_POST['customer_message'];

            $stmt = $connect->prepare("UPDATE art_register SET user_status=?,user_show=?,customer_message=? WHERE art_register_id  =? ");
            $stmt->execute([
                $user_status,
                $user_show,
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
