<div class="container customer_report">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> تسجيلات المواهب من خلال وسيط </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-search"></i> تسجيلات المواهب من خلال وسيط </h6>
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
                        <th> التخصص </th>
                        <th> مجال التسجيل </th>
                        <th> الوسيط </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare('SELECT * FROM company_register');
                        $stmt->execute();
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?> <tr>
                            <td><?php echo $type['first_name']; ?> </td>
                            <td><?php echo $type['last_name']; ?> </td>
                            <td><?php echo $type['email']; ?> </td>
                            <td><?php echo $type['mobile']; ?> </td>
                            <td><?php echo $type['specialist']; ?> </td>
                            <?php
                            $stmt = $connect->prepare("SELECT * FROM art_register WHERE username=?");
                            $stmt->execute(array($type['username']));
                            $count  = $stmt->rowCount();
                            if($count > 0){?>
                                <td> مسجل في الذكاء الاصطناعي </td>
                                <?php
                            }
                            $stmt = $connect->prepare("SELECT * FROM fash_register WHERE username=?");
                            $stmt->execute(array($type['username']));
                            $count  = $stmt->rowCount();
                            if($count > 0){?>
                                <td> مسجل في  الازياء والموضة </td>
                                <?php
                            }

                            $stmt = $connect->prepare("SELECT * FROM register WHERE username=?");
                            $stmt->execute(array($type['username']));
                            $count  = $stmt->rowCount();
                            if($count > 0){?>
                                <td> مسجل في   ريفايفال </td>
                                <?php
                            }
                            $stmt = $connect->prepare("SELECT * FROM sport_register WHERE username=?");
                            $stmt->execute(array($type['username']));
                            $count  = $stmt->rowCount();
                            if($count > 0){?>
                                <td> مسجل في الرياضة</td>
                                <?php
                            }

                            ?>
                            <td class="bg bg-blue"> <a class="" href="#"> <?php echo $type['username']; ?> </a> </td>
                            <td>
                                <a class=" btn btn-success" href="main.php?dir=company_talent&page=edit&register_id=<?php echo $type['reg_id']; ?> ">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="confirm btn btn-danger" href="main.php?dir=company_talent&page=delete&register_id=<?php echo $type['reg_id']; ?> ">
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