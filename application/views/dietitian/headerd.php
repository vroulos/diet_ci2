<!DOCTYPE html>
<html>
<head>
	
	<title>Διαιτολόγος</title>
	<link rel="icon"  href="<?php echo base_url('assets/images/favicon.png'); ?>">

	<!-- Firebase App is always required and must be first -->
<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-app.js"></script>


<!-- Add additional services that you want to use -->
<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-messaging.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="node_modules/primer-css/build/build.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/8.5.0/build.css">

<script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous">
			  	
</script>

	<!-- load local bootstrap css -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <!-- material icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<style type="text/css">
		.material-icons.md-48 { font-size: 25px;color: #808080; margin-top: 10px;  }
	</style>

</head>
<body>	

<div class="container-fullwidth" >

	<!-- <nav class="navbar navbar-expand-xl navbar-light bg-light"> -->
		<nav class="navbar navbar-fixed-top navbar-expand-md navbar-dark bg-dark " >
		<a class="navbar-brand" href="<?= base_url('dietitians/initial'); ?>">DietCi2</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				

				<?php if (!isset($_SESSION['dietitian_name'])){ ?>
					<li class="nav-item active">
					<a class="nav-link" href="<?php echo base_url('mywebapp/first') ?>">Αρχική</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="#">κάτι θα βάλω <span class="sr-only">(current)</span></a>
				</li>
			<?php } ?>

				<?php if (isset($_SESSION['dietitian_name'])){ ?>
			
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('dietitians/choose_customer') ?>">επιλογή πελάτη</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('dietitians/create_customer_secret_key') ?>">Ταυτοποίηση πελάτη</a>
				</li>
			<?php } ?>
				<?php if(isset($_SESSION['customer_name'])) {?>
				
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						πελάτης
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?= base_url('dietitians/insert_food') ?>">Προσθήκη γεύματος</a>
						<a class="dropdown-item" href="<?= base_url('dietitians/send_message')  ?>">Αποστολή μυνήματος</a>
						<a class="dropdown-item" href="<?= base_url('dietitians/add_nutricion_program_v2')  ?>">Προσθήκη και προβολή <br>προγράμματος</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?php echo base_url('dietitians/customer_progress') ?>">Πρόοδος πελάτη</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?php echo base_url('dietitians/my_meals') ?>">Τα γεύματά μου</a>

					</div>
				</li>
				<?php } ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						διαιτολόγος
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?= base_url('dietitians/add_template')  ?>">Προσθήκη και επιλογή <br>προτύπου</a>
				</li>
				
				
			
			<!-- if the dietitian has logged in -->
			<?php if (isset($_SESSION['dietitian_name'])) { ?>
				<li class="nav-item">
					<a class="nav-link disabled" href="<?= base_url('dietitians/settings') ?>">Προφίλ</a>
				</li>
				
					<li class="nav-item">
					<a class="nav-link disabled" href="<?= base_url('dietitians/logoutd') ?>">Αποσύνδεση</a>
				</li>

			<?php } ?>
			
			</ul>
			<?php // if the dietitian is logged in the search tool is available
			if (isset($_SESSION['dietitian_name'])) {?>
				<form class="form-inline my-2 my-lg-0" action ="<?= base_url('dietitians/search') ?>">
				<input class="form-control mr-sm-2" type="search" name="search_something"    placeholder="Search"  aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0"  type="submit">Search</button>
			</form>
			<?php } ?>


			 
			
		</div>
	</nav>

</div>



