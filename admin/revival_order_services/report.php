<div class="container customer_report">
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
            <h6> <i class="fa fa-search"></i> طلب الخدمات</h6>
        </div>
        <!-- Content Row -->
        <div class="table-responsive">
            <table id="table" class="table table-light table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th> الاسم الاول </th>
                        <th> الاسم الثاني </th>
                        <th> البريد الالكتروني </th>
                        <th> الهاتف </th>
                        <th> الدولة </th>

                        <th> </th>
                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare('SELECT * FROM revival_order_services');
                        $stmt->execute();
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?> <tr>
                        <td><?php echo $type['first_name']; ?> </td>
                        <td><?php echo $type['last_name']; ?> </td>
                        <td><?php echo $type['email']; ?> </td>
                        <td><?php echo $type['mobile']; ?> </td>
                        <td><?php echo $type['country']; ?> </td>
                        <td>
                            <a class=" btn btn-success"
                                href="main.php?dir=revival_order_services&page=edit&order_id=<?php echo $type['order_id']; ?> ">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="confirm btn btn-danger"
                                href="main.php?dir=revival_order_services&page=delete&order_id=<?php echo $type['order_id']; ?> ">
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