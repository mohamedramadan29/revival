		<!-- START NEW NAVABR  -->
		<!-- START TOP NAVBAR -->
		<nav class="top_navbar">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-6">
		                <ul class="list-unstyled login_links">
		                    <?php if ($_SESSION['lang'] == 'ar') { ?>
		                    <li class="change_lang"> <button class="btn btn-default btn-sm" type="button" name="button"> <a
		                                href="talent.php?lang=en"> English </a> </button> </li>
		                    <?php } else { ?>

		                    <li class="change_lang"> <button class="btn btn-default btn-sm" type="button" name="button"> <a
		                                href="talent.php?lang=ar"> عربي </a> </button> </li>
		                    <?php } ?>
		                    <li class="nav-item">
		                        <a class="nav-link" href="register.php"> <?php echo $lang["register"] ?> </a>
		                    </li>
		                    <li class="nav-item">
		                        <a class="nav-link" href="goin_team.php"> <?php echo $lang["register_team"] ?></a>
		                    </li>

		                    <?php
							/*
							if (isset($_SESSION["username"])) { ?>
		                    <li class="nav-item">
		                        <a class="nav-link" href="profile.php"> <?php echo $lang["account"] ?> </a>
		                    </li>
		                    <?php
							} else { ?>
		                    <li class="nav-item">
		                        <a class="nav-link" href="login.php"> <?php echo $lang["login"] ?> </a>
		                    </li>
		                    <?php
							}
*/
							?>
		                    <li class="nav-item">
		                        <a class="nav-link" href="contact_us.php"><?php echo $lang["contact_us"] ?> </a>
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



		<!-- START NEW NAVABR  -->
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light">
		    <div class="container-fluid">
		        <a class="navbar-brand" href="index.php"><img class="logo_class" src="../../uploads/sport.png" alt=""></a>
		        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
		            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
		            aria-label="Toggle navigation">
		            <span class="navbar-toggler-icon"></span>
		        </button>
		        <div class="collapse navbar-collapse" id="navbarSupportedContent">
		            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

		                <li class="nav-item">
		                    <a class="nav-link active" aria-current="page"
		                        href="../../index.php"><?php echo $lang["revival"] ?></a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" href="../events.php"><?php echo $lang["events"] ?></a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" href="talent.php"> <?php echo $lang["art"] ?></a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" href="#about_event"> <?php echo $lang["about_event"] ?></a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" href="#goals"> <?php echo $lang["our_goals"] ?> </a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" href="#speakers"> <?php echo $lang["speakers"] ?> </a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" href="#sponser"> <?php echo $lang["sponser"] ?> </a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" href="schedule.php"> <?php echo $lang["programe"] ?> </a>
		                </li>

		                <li class="nav-item">
		                    <a class="nav-link" href="share_event.php"> <?php echo $lang["Take_event"] ?></a>
		                </li>
		                <li class="nav-item d-none">
		                    <a class="nav-link" href="articles.php"> المقالات </a>
		                </li>
		                <li class="nav-item d-none">
		                    <a class="nav-link" href="news.php"> الاخبار</a>
		                </li>


		            </ul>
		        </div>
		    </div>
		</nav>
		<!-- END NEW NAVBAR -->