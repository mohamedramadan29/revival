<div class="container customer_report">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> تسجيلات الوكالة </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-search"></i> تسجيلات الوكالة </h6>
        </div>
        <!-- Content Row -->
        <div class="table-responsive">
            <table id="table" class="table table-light table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th> اسم الشركة </th>
                        <th> البريد الالكتروني </th>
                        <th> الهاتف </th>
                        <th> الدولة </th>
                        <th> الرقم الضريبي </th>
                        <th> حالة المستخدم </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare('SELECT * FROM agency_register');
                        $stmt->execute();
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?> <tr>
                            <td><?php echo $type['name']; ?> </td>
                            <td><?php echo $type['email']; ?> </td>
                            <td><?php echo $type['phone']; ?> </td>
                            <td><?php echo $type['country']; ?> </td>
                            <td><?php echo $type['tax_number']; ?> </td>
                            <?php if ($type['user_status'] == 'active') { ?>
                                <td> <button class="btn btn-success btn-sm"> تم التفعيل </button> </td>
                            <?php
                            } else {
                            ?>
                                <td> <button class="btn btn-warning btn-sm"> تحت المراجعه </button> </td>
                            <?php
                            } ?>
                            <td>
                                <a class=" btn btn-success btn-sm" href="main.php?dir=agency&page=edit&register_id=<?php echo $type['id']; ?> ">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="confirm btn btn-danger btn-sm" href="main.php?dir=agency&page=delete&register_id=<?php echo $type['id']; ?> ">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr> <?php }
                                ?> </tbody>
            </table>
        </div>
    </div>
</div>
</div>