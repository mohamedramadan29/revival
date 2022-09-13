<div class="container customer_report">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> المشاريع الجديدة </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-search"></i> المشاريع الجديدة </h6>
        </div>
        <!-- Content Row -->
        <div class="table-responsive">
            <table id="table" class="table table-light table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th> اسم العميل </th>
                        <th> وصف المشروع </th>

                        <th> </th>
                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare('SELECT * FROM revival_add_project');

                        $stmt->execute();
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?> <tr>
                        <td><?php echo $type['project_name']; ?> </td>
                        <td><?php echo $type['project_desc']; ?> </td>

                        <?php if ($type['project_status'] == 'active') { ?>
                        <td> <button class="btn btn-success btn-sm"> تم التفعيل </button> </td>
                        <?php
                            } else {
                            ?>
                        <td> <button class="btn btn-warning btn-sm"> تحت المراجعه </button> </td>
                        <?php

                            } ?>


                        <td>
                            <a class=" btn btn-success"
                                href="main.php?dir=revival_add_new_project&page=edit&project_id=<?php echo $type['project_id']; ?> ">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="confirm btn btn-danger"
                                href="main.php?dir=revival_add_new_project&page=delete&project_id=<?php echo $type['project_id']; ?> ">
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