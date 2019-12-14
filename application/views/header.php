<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Πελάτης</title>

 <!-- Firebase App is always required and must be first -->
<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-app.js"></script>

<!-- Add additional services that you want to use -->
<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-messaging.js"></script>

<script src="https://www.gstatic.com/firebasejs/5.7.1/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCMMDvFcKrcMduuwJx0gVUh5wVwSjRZEW4",
    authDomain: "sendy-c324f.firebaseapp.com",
    databaseURL: "https://sendy-c324f.firebaseio.com",
    projectId: "sendy-c324f",
    storageBucket: "sendy-c324f.appspot.com",
    messagingSenderId: "506097740603"
  };
  firebase.initializeApp(config);
</script>

<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->

<script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous">
			  	
</script>

    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

  </head>
  <body>

    <header id="site-header">
	
	<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> -->
	<nav class="navbar navbar-fixed-top navbar-expand-md navbar-dark bg-dark">
	<a class="navbar-brand" href="#">DietCi2</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<?php 
			if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : 
			?>
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo base_url('user/index') ?>">Αρχική<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">

				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Προσωπικά δεδομένα
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo base_url('user/add_weight') ?>">προσθήκη προσωπικών δεδομένων<br> και εμφάνισή τους</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?php echo base_url('user/add_user_note'); ?>">προσωπικές σημειώσεις</a>
						<a class="dropdown-item" href="<?=base_url('user/messages')?>">μηνύματα</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?php echo base_url('upload/'); ?>">Ανέβασμα Φωτογραφίας</a>
						<a class="dropdown-item" href="<?php echo base_url('upload/display_images'); ?>">Οι φωτογραφίες μου</a>
						
					</div>
				</li>

				<li><a class="nav-link" href="<?=base_url('user/view_program')?>">Πρόγραμμα διατροφής</a>
				</li>
				<li><a class="nav-link" href="<?=base_url('user/my_meals')?>">Γεύματα</a>
				</li>
				<li><a class="nav-link" href="<?= base_url('logout') ?>">Αποσύνδεση</a>
				</li>
			
			</ul>
			<form class="form-inline my-2 my-lg-0" action="<?php echo base_url('user/search_food') ?>">
				<input class="form-control mr-sm-2" name="user_search_input" type="search" placeholder="Search" aria-label="Search">
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

