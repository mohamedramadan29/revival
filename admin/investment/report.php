<div class="container customer_report">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> الاستثمارات </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-search"></i> الاستثمارات </h6>
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
                        <th> اسم الموسسة </th> 
                        <th> رقم الموهبة  </th>
                        <th> قسم الموهبة </th>
                        <th></th>
                       
                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare('SELECT * FROM investment');
                        $stmt->execute();
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?> <tr>
                        <td><?php echo $type['first_name']; ?> </td>
                        <td><?php echo $type['last_name']; ?> </td>
                        <td><?php echo $type['email']; ?> </td>
                        <td><?php echo $type['mobile']; ?> </td>
                        <td><?php echo $type['facility_name']; ?> </td>
                        <td><?php echo $type['talent_id']; ?> </td>
                        <td><?php echo $type['cat_name']; ?> </td>
                        <td>
                            <a class=" btn btn-success btn-sm"
                                href="main.php?dir=investment&page=edit&invest_id=<?php echo $type['invest_id']; ?> ">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="confirm btn btn-danger btn-sm"
                                href="main.php?dir=investment&page=delete&invest_id=<?php echo $type['invest_id']; ?> ">
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