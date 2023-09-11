<!-- START NEW NAVABR  -->
<!-- START TOP NAVBAR -->
<nav class="top_navbar">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled login_links">

                    <?php if ($_SESSION['lang'] == 'ar') { ?>
                        <li class="change_lang"> <button class="btn btn-default btn-sm" type="button" name="button"> <a href="index?lang=en"> English </a> </button> </li>
                    <?php } else { ?>

                        <li class="change_lang"> <button class="btn btn-default btn-sm" type="button" name="button"> <a href="index?lang=ar"> عربي </a> </button> </li>
                    <?php } ?>


                    <?php
                    if (isset($_SESSION["username"])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="profile"> <?php echo $lang["account"] ?> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout"><?php echo $lang["logout"] ?> </a>
                        </li>
                    <?php
                    } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login"> <?php echo $lang["login"] ?> </a>
                        </li>
                        <li class="nav-item dropdown dropdown_register">
                            <a class="nav-link dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" href="#"> <?php echo $lang["register"] ?> </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="artificial_intellegent_register"> <?php echo $lang["drop_register_artifi"] ?> </a></li>
                                <li><a class="dropdown-item" href="sport_talent_register"> <?php echo $lang["drop_register_sport"] ?> </a></li>
                                <li><a class="dropdown-item" href="fashion_register"> <?php echo $lang["drop_register_fash"] ?> </a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="contact"> <?php echo $lang["contact_us"] ?> </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 date">
                <?php
                //Check what time zone the server is currently in
                echo date("F j, Y, g:i a") . "\n";
                ?>
            </div>
        </div>
    </div>
</nav>
<!-- END TOP NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index"> <img class="logo_class" src="uploads/logo3.png" alt=""> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index"> <?php echo $lang["home"] ?> </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="artificial_intellegent"><?php echo $lang["artificial"] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sports_talent"> <?php echo $lang["sports"] ?> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="fashion_jawelery"><?php echo $lang["fashion"] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="exhibition"> <?php echo $lang["exhibition"] ?> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="agency"> <?php echo $lang["agency"] ?> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="event/events"> <?php echo $lang["events"] ?> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="articles"> <?php echo $lang["articles"] ?> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="news"> <?php echo $lang["news"] ?> </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="faq"> <?php echo $lang["faqs"] ?> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="courses"> <?php echo $lang["courses"] ?> </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END NEW NAVBAR -->