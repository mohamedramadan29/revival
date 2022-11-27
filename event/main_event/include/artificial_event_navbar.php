<?php if ($_GET["event_id"]) {
	$event_id = $_GET["event_id"];
	//echo $event_id;
} ?>
<!-- START NEW NAVABR  -->
<!-- START TOP NAVBAR -->
<nav class="top_navbar">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<ul class="list-unstyled login_links">
					<?php if ($_SESSION['lang'] == 'ar') { ?>
						<li class="change_lang"> <button class="btn btn-default btn-sm" type="button" name="button"> <a href="index.php?lang=en&event_id=<?php echo $event_id; ?>"> English </a> </button> </li>
					<?php } else { ?>

						<li class="change_lang"> <button class="btn btn-default btn-sm" type="button" name="button"> <a href="index.php?lang=ar&event_id=<?php echo $event_id; ?>"> عربي </a> </button> </li>
					<?php } ?>
					<li class="nav-item">
						<a class="nav-link" href="register.php?event_id=<?php echo $event_id; ?>"> <?php echo $lang["register"] ?> </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="goin_team.php?event_id=<?php echo $event_id; ?>"> <?php echo $lang["register_team"] ?></a>
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
						<a class="nav-link" href="contact_us.php?event_id=<?php echo $event_id; ?>"><?php echo $lang["contact_us"] ?> </a>
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
		<?php
		$stmt = $connect->prepare("SELECT * FROM main_events WHERE event_id=?");
		$stmt->execute(array($event_id));
		$event_data = $stmt->fetchAll();
		foreach ($event_data as $data) { ?>
			<a class="navbar-brand" href="index.php"><img class="logo_class" src="../../admin_event/upload/<?php echo $data["event_logo"]; ?>" alt=""></a>
		<?php
		} ?>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">

				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="../../index.php"><?php echo $lang["revival"] ?> </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../events.php"> <?php echo $lang["events"] ?> </a>
				</li>
				<?php
				$stmt = $connect->prepare("SELECT * FROM main_events WHERE event_id=?");
				$stmt->execute(array($event_id));
				$event_data = $stmt->fetchAll();
				foreach ($event_data as $data) { ?>
					<li class="nav-item">
						<a class="nav-link" href="index.php?event_id=<?php echo $event_id; ?>"> <?php
																								if ($_SESSION["lang"] == "ar") {
																									echo $data["event_name"];
																								} else {
																									echo $data["event_name_en"];
																								}
																								?>
						</a>
					</li>
				<?php
				}
				?>
				<li class="nav-item">
					<a class="nav-link" href="#about_event_id"> <?php echo $lang["about_event"] ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#kind"> <?php echo $lang["target_gruop"] ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#vision"> <?php echo $lang["our_goals"] ?> </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#speakers"> <?php echo $lang["speakers"] ?> </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#sponser"> <?php echo $lang["sponser"] ?> </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="schedule.php?event_id=<?php echo $event_id; ?>"> <?php echo $lang["programe"] ?> </a>
				</li>
				<!--
				<li class="nav-item">
					<a class="nav-link" href="share_event.php?event_id=<?php echo $event_id; ?>"><?php echo $lang["Take_event"] ?></a>
				</li>
			-->
				<li class="nav-item d-none">
					<a class="nav-link" href="articles.php"> <?php echo $lang["articles"] ?> </a>
				</li>
				<li class="nav-item d-none">
					<a class="nav-link" href="news.php"> <?php echo $lang["news"] ?></a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- END NEW NAVBAR -->