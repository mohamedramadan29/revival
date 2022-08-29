<div class="container customer_report">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"><?php echo $lang['website_title']; ?></a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> <?php echo $lang['watch_banner']; ?></li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-search"></i> <?php echo $lang['watch_banner']; ?> </h6>
        </div>
        <!-- Content Row -->
        <div class="table-responsive">
            <table id="table" class="table table-light table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th> <?php echo $lang['banner_name']; ?> </th>
                        <th> <?php echo $lang['banner_place']; ?></th>
                        <th> <?php echo $lang['banner_image']; ?> </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare('SELECT * FROM banner ORDER BY ban_id DESC LIMIT 400');
                        $stmt->execute();
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?> <tr>
                        <td><?php echo $type['ban_name']; ?> </td>
                        <td><?php echo $type['ban_place']; ?> </td>
                        <td> <img src="../uploads/<?php echo $type['ban_image']; ?>" alt=""> </td>
                        <td>
                            <a class=" btn btn-success"
                                href="main.php?dir=banner&page=edit&ban_id=<?php echo $type['ban_id']; ?> ">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="confirm btn btn-danger"
                                href="main.php?dir=banner&page=delete&ban_id=<?php echo $type['ban_id']; ?> ">
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