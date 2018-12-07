<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>mywebapp</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<header id="site-header">
		
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
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
          <a class="dropdown-item" href="#">ποσοστό λίπους</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url('user/add_user_note'); ?>">προσωπικές σημειώσεις</a>
          <a class="dropdown-item" href="#">περιφέρεια μέσης</a>
        </div>
      </li>
      
							<li><a class="nav-link" href="<?=base_url('user/messages')?>">μηνύματα</a></li>
							<li><a class="nav-link" href="<?=base_url('user/view_program')?>">πρόγραμμα διατροφής</a></li>
							<li><a class="nav-link" href="<?= base_url('logout') ?>">Αποσύνδεση</a></li>

						
      <li class="nav-item">
        <a class="nav-link disabled" href="#">κάτι θα μπει και εδώ</a>
      </li>
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
		
