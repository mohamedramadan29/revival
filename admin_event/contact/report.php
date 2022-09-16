<div class="container customer_report">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> الاحداث </a> <i class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> مشاهدة الرسائل </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-search"></i>مشاهدة الرسائل </h6>
        </div>
        <!-- Content Row -->
        <div class="table-responsive">
            <table id="tableone" class="table table-light table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th> الاسم </th>
                        <th> البريد الالكتروني </th>
                        <th> الرسالة </th>
                        <th> التاريخ </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare('SELECT * FROM event_contact');
                        $stmt->execute();
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?> <tr>
                            <td><?php echo $type['contact_name']; ?> </td>
                            <td><?php echo $type['contact_email']; ?> </td>
                            <td> <?php echo $type['contact_message']; ?> </td>
                            <td> <?php echo $type['contact_date']; ?> </td>
                            <td>
                                <a class="btn btn-success" href="main.php?dir=contact&page=edit&message_id=<?php echo $type['contact_id']; ?> ">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="confirm btn btn-danger" href="main.php?dir=contact&page=delete&message_id=<?php echo $type['contact_id']; ?> ">
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