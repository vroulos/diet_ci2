<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- load the jquery from cdn because the toggle navigation was not working -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<!-- load local bootstrap css -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">



	
	</head>
	<body>

		<div class="container-fullwidth" >

			<!-- <nav class="navbar navbar-expand-xl navbar-light bg-light"> -->
				<nav class="navbar navbar-expand-md navbar-dark bg-dark " >
				<a class="navbar-brand" href="<?= base_url('dietitians/initial'); ?>">DietCi2</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#">κάτι θα βάλω <span class="sr-only">(current)</span></a>
						</li>
						<?php if (isset($_SESSION['dietitian_name'])){ ?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('dietitians/choose_customer') ?>">επιλογή πελάτη</a>
						</li>
					<?php } ?>
						<?php if(isset($_SESSION['customer_name'])) {?>
						
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								πελάτης
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?= base_url('dietitians/insert_food') ?>">προσθήκη γεύματος</a>
								<a class="dropdown-item" href="<?= base_url('dietitians/send_message')  ?>">αποστολή μυνήματος</a>
								<a class="dropdown-item" href="<?= base_url('dietitians/add_nutricion_program')  ?>">προσθήκη προγράμματος</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" href="">κενό</a>
						</li>
					<?php } ?>
						<li class="nav-item">
							<a class="nav-link disabled" href="<?= base_url('dietitians/logoutd') ?>">Αποσύνδεση</a>
						</li>
					</ul>
					<form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form>
				</div>
			</nav>

		</div>

