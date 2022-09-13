	<!-- START NEW NAVABR  -->
	<!-- START TOP NAVBAR -->
	<nav class="top_navbar">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-6">
	                <ul class="list-unstyled login_links">
	                    <?php if ($_SESSION['lang'] == 'ar') { ?>
	                    <li class="change_lang"> <button class="btn btn-default btn-sm" type="button" name="button"> <a
	                                href="events.php?lang=en"> English </a> </button> </li>
	                    <?php } else { ?>

	                    <li class="change_lang"> <button class="btn btn-default btn-sm" type="button" name="button"> <a
	                                href="events.php?lang=ar"> عربي </a> </button> </li>
	                    <?php } ?>

	                    <li class="nav-item">
	                        <a class="nav-link" href="contact.php"> <?php echo $lang["contact_us"] ?> </a>
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
	        <a class="navbar-brand" href="../index.php"><img class="logo_class" src="../uploads/logo3.png" alt=""></a>
	        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
	            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	            <span class="navbar-toggler-icon"></span>
	        </button>
	        <div class="collapse navbar-collapse" id="navbarSupportedContent">
	            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

	                <li class="nav-item">
	                    <a class="nav-link active" aria-current="page" href="../index.php"> <?php echo $lang["revival"] ?>
	                    </a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="events.php"> <?php echo $lang["events"] ?> </a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="artifiicial_event/artificial.php"> <?php echo $lang["artificial"] ?></a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="sport_talent_event/talent.php"> <?php echo $lang["sports"] ?></a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="fashion_event/fashion.php"> <?php echo $lang["fashion"] ?></a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="faq.php"> <?php echo $lang["faqs"] ?></a>
	                </li>

	            </ul>
	        </div>
	    </div>
	</nav>
	<!-- END NEW NAVBAR -->