<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title; ?></title>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

  </head>
  <body>

    <header id="site-header">
		
		<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> -->
			<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
			<a class="navbar-brand" href="#">DietCi2</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>

						<li class="nav-item active">
							<a class="nav-link" href="<?php echo base_url('user/index') ?>">Αρχική<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">

						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								προσωπικά δεδομένα
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?php echo base_url('user/add_weight') ?>">προσθήκη βάρους</a>
								<a class="dropdown-item" href="<?php echo base_url('user/add_percent_fat') ?>">ποσοστό λίπους</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?php echo base_url('user/add_user_note'); ?>">προσωπικές σημειώσεις</a>
								<a class="dropdown-item" href="<?php echo base_url('user/add_waistline'); ?>">περιφέρεια μέσης</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?php echo base_url('upload/'); ?>">Ανέβασμα Φωτογραφίας</a>
								<a class="dropdown-item" href="<?php echo base_url('upload/display_image'); ?>">Οι φωτογραφίες μου</a>
								<a class="dropdown-item" href="<?php //echo base_url('upload/delete_image'); ?>">Διαγραφή φωτογραφίας</a>
							</div>
						</li>

						<li><a class="nav-link" href="<?=base_url('user/messages')?>">μηνύματα</a></li>
						<li><a class="nav-link" href="<?=base_url('user/view_program')?>">πρόγραμμα διατροφής</a></li>
						<li><a class="nav-link" href="<?= base_url('logout') ?>">Αποσύνδεση</a></li>

						
					
					</ul>
					<form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form>
					<?php else : ?>
						<li ><a class="nav-link" href="<?= base_url('mywebapp/first') ?>">Αρχική</a></li>
						<li><a class="nav-link" href="<?= base_url('register') ?>">Εγγραφή</a></li>
						<li><a class="nav-link" href="<?= base_url('login') ?>">Σύνδεση</a></li>
					<?php endif; ?>
				</div>
			</nav>
			



			<main id="site-content" role="main">

				<?php if (isset($_SESSION)) : ?>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
						<?php// var_dump($_SESSION); //This function displays structured 
													//information about  $SESSION
						?>
					</div>
				</div><!-- .row -->
			</div><!-- .container -->
		<?php endif; ?>
		
