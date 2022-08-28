<div class="container customer_report">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> جميع المقالات </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-search"></i> جميع الكورسات </h6>
        </div>
        <!-- Content Row -->
        <div class="table-responsive">
            <table id="table" class="table table-light table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th> اسم الكورس </th>
                        <th> سعر الكورس </th>
                        <th> مقدم الكورس </th>
                        <th> مكان الكورس </th>
                        <th> عدد ايام الكورس </th>
                        <th> حالة الكورس </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare('SELECT * FROM courses');
                        $stmt->execute();
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?> <tr>
                        <td><?php echo $type['course_name']; ?> </td>
                        <td><?php echo $type['course_price']; ?> </td>
                        <td><?php echo $type['course_constructor']; ?> </td>
                        <td><?php echo $type['course_place']; ?> </td>
                        <td><?php echo $type['course_num_days']; ?> </td>
                        <?php if ($type['course_status'] == 'active') { ?>
                        <td> <button class="btn btn-success btn-sm"> مفعل </button> </td>
                        <?php
                            } else {
                            ?>
                        <td> <button class="btn btn-warning btn-sm"> غير مفعل </button> </td>
                        <?php

                            } ?>
                        <td>
                            <a class=" btn btn-success"
                                href="main.php?dir=courses&page=edit&course_id=<?php echo $type['course_id']; ?> ">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="confirm btn btn-danger"
                                href="main.php?dir=courses&page=delete&course_id=<?php echo $type['course_id']; ?> ">
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