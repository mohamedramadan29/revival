<!-- START PROFILE DATA -->
<div class="profile_data">

    <div class="container">
        <div class="data">
            <div class="row">
                <div class="col-lg-4">
                    <div class="info">

                        <form action="" method="POST" enctype="multipart/form-data">
                            <?php

                            if (strlen($userinfo['personal_image']) > 0) { ?>
                            <div class="personal_image">
                                <img src="admin/upload/<?php echo $userinfo['personal_image']; ?>" alt="">
                                <input name="personal_image" type="file"> <i class="fa fa-upload"></i>
                            </div>
                            <?php
                            } else { ?>


                            <div class="personal_image">
                                <img src="uploads/avatar.png" alt="">
                                <input name="personal_image" type="file"> <i class="fa fa-upload"></i>
                            </div>

                            <?php
                            }

                            ?>
                            <br>
                            <input class="btn btn-primary" type="submit"
                                value="   <?php echo $lang["edit_profile_image"]; ?>  ">
                        </form>

                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $file = '';
                            $file_tmp = '';
                            $location = '';
                            $uploadplace = "admin/upload/";
                            // START UPLOAD CV FIELS

                            $file = $_FILES['personal_image']['name'];
                            $file_tmp = $_FILES['personal_image']['tmp_name'];
                            move_uploaded_file($file_tmp, $uploadplace . $file);
                            $location = $file . " ";
                            if ($file_tmp != "") {
                                $stmt = $connect->prepare("UPDATE register SET  personal_image=? WHERE username=?");
                                $stmt->execute(array($location, $_SESSION["username"]));
                            }

                            if ($stmt) {
                                header("refresh: 0");
                            }
                        }

                        ?>

                        <h2> <?php echo $userinfo['first_name']; ?> <?php echo $userinfo['last_name'];  ?> </h2>
                        <p> <?php echo $userinfo['email']; ?> </p>

                    </div>
                </div>
                <div class="col-lg-8">
                    <br>
                    <div class="info2">
                        <div class="buttons_links">
                            <ul class="list-unstyled">
                                <li> <a href="update_profile.php" class="btn button">
                                        <?php echo $lang["account_update"]; ?> <i class="fa fa-edit"></i> </a>
                                </li>
                                <li> <a href="ticket.php" class="btn button"> <?php echo $lang["open_ticket"]; ?> <i
                                            class="fa fa-message"></i> </a>
                                </li>
                                <li class="dropdown-share">
                                    <a href="#" class="btn button"> <?php echo $lang["business_sharing"]; ?> <i
                                            class="fa fa-chevron-down"></i>
                                    </a>
                                    <ul class="list-unstyled">
                                        <li> <a href="share_works_indvidual.php">
                                                <?php echo $lang["Individually_share"]; ?> </a> <i
                                                class="fa fa-user"></i>
                                        </li>
                                        <li> <a href="share_works_team.php"> <?php echo $lang["collectively_share"]; ?>
                                            </a> <i class="fa fa-users"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li> <a href="add_individual_project.php" class="btn button">
                                        <?php echo $lang["add_new_project"]; ?> <i class="fa fa-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- START GET DATA -->
                    <div class="personal_information">
                        <div class="data2">
                            <h4> <?php echo $lang["personal_information"]; ?></h4>
                            <div class="information">
                                <ul class="list-unstyled">
                                    <li> <?php echo $lang["first_name"]; ?><span>:</span></li>
                                    <li> <?php echo $lang["last_name"]; ?> <span>:</span></li>
                                    <li> <?php echo $lang["email"]; ?> <span>:</span></li>
                                    <li><?php echo $lang["mobile"]; ?><span>:</span></li>
                                    <li> <?php echo $lang["specialist"]; ?> <span>:</span></li>
                                    <li> <?php echo $lang["certificate"]; ?><span>:</span></li>

                                </ul>
                                <ul class="list-unstyled">

                                    <li> <?php echo $userinfo['first_name']; ?> </li>
                                    <li> <?php echo $userinfo['last_name']; ?> </li>
                                    <li> <?php echo $userinfo['email']; ?> </li>
                                    <li> <?php echo $userinfo['mobile']; ?> </li>
                                    <li> <?php echo $userinfo['specialist']; ?> </li>
                                    <li> <?php echo $userinfo['certificate']; ?> </li>
                                </ul>
                            </div>
                        </div>

                        <div class="data2">
                            <h4> <?php echo $lang["Brief_about_you"]; ?> </h4>
                            <div class="information">
                                <textarea readonly
                                    placeholder="<?php echo $lang["your_experiences"]; ?> ">  <?php echo $userinfo['personal_information']; ?> </textarea>
                            </div>
                        </div>
                        <!--
                        <div class="data2">
                            <h4> السيرة الذاتية والمستندات</h4>
                            <div class="person_files">
                                <div class="row">
                                    <?php
                                    $files1 = $userinfo['cv'];
                                    $files1 = explode(" ", $files1);
                                    $countfile = count($files1) - 1;
                                    for ($i = 0; $i < $countfile; ++$i) {
                                    ?>
                                    <div class="col-lg-6 col-12">
                                        <img src="admin/upload/<?= $files1[$i] ?>" alt="<?= $files1[$i] ?>" />
                                    </div>
                                    <?php
                                    }
                                    // echo "<p style='color:green;font-size:26px'>عدد " . $count . " images found.";
                                    ?>


                                </div>
                            </div>
                        </div>
                                -->
                        <!--
                        <div class="data2">
                            <h4> الفيديوهات </h4>
                            <div class="person_files">
                                <div class="row">
                                    <?php
                                    $files1 = $userinfo['videos'];
                                    $files1 = explode(" ", $files1);
                                    $countfile = count($files1) - 1;
                                    for ($i = 0; $i < $countfile; ++$i) {
                                    ?>
                                    <div class="col-lg-6 col-12">
                                        <video src="admin/upload/<?= $files1[$i] ?>" width="320" height="240" controls>
                                            <source src="admin/upload/<?= $files1[$i] ?>" type="">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                    <?php
                                    }
                                    // echo "<p style='color:green;font-size:26px'>عدد " . $count . " images found.";
                                    ?>


                                </div>
                            </div>
                        </div>
                                -->
                    </div>
                    <!-- END GET DATA -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PROFILE DATA -->