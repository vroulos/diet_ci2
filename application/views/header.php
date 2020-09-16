<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Πελάτης</title>
	<link rel="icon"  href="<?php echo base_url('assets/images/favicon.png'); ?>">

	<!-- Firebase App is always required and must be first -->
	<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-app.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Add additional services that you want to use -->
	<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-messaging.js"></script>

	<script src="https://www.gstatic.com/firebasejs/5.7.1/firebase.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/8.5.0/build.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script>
  // Initialize Firebase
  var config = {
  	apiKey: "myApiKey",
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
			  src="https://code.jquery.com/jquery-3.5.1.js"
			  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
			  crossorigin="anonymous">			  	
</script>
<script src="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.0/dist/jBox.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.0/dist/jBox.all.min.css" rel="stylesheet">

<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/push/bin/push.min.js') ?>"></script>

</head>
<body>
	<header id="site-header">
		<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> -->
			<nav class="navbar navbar-fixed-top navbar-expand-md navbar-dark bg-dark">
				<a class="navbar-brand" href="#">nutricio</a>
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
									<a class="dropdown-item" href="<?=base_url('user/my_data');?>">Τα στοιχεία μου</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?php echo base_url('user/add_user_note'); ?>">προσωπικές σημειώσεις</a>
									<a class="dropdown-item" href="<?=base_url('user/messages')?>">μηνύματα</a>
									<a class="dropdown-item" href="<?=base_url('user/myCalendar')?>">Ημερολόγιο</a>
									<a class="dropdown-item" href="<?= base_url('user/video_user_call')  ?>">Video κλήση</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?php echo base_url('upload/'); ?>">Ανέβασμα Φωτογραφίας</a>
									<a class="dropdown-item" href="<?php echo base_url('upload/display_images'); ?>">Οι φωτογραφίες μου</a>
								</div>
							</li>
							<li><a class="nav-link" href="<?=base_url('user/view_program')?>">Πρόγραμμα διατροφής</a>
							</li>
							<li><a class="nav-link" href="<?=base_url('user/my_meals')?>">Γεύματα</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php echo $_SESSION['username']; ?> 
								</a>

								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="<?= base_url('logout') ?>">Αποσύνδεση</a>
								</div>
							</li>
						</ul>
						<form class="form-inline my-2 my-lg-0" action="<?php echo base_url('user/search_food') ?>">
							<input class="form-control mr-sm-2" name="user_search_input" type="search" placeholder="Search" aria-label="Search">
							<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						</form>
						<?php else : ?>
							<li ><a class="nav-link" href="<?= base_url('mywebapp/first') ?>">Αρχική</a></li>
							<!-- <li><a class="nav-link" href="<?= base_url('user/indexCaptcha') ?>">Εγγραφή</a></li> -->
							<li><a class="nav-link" href="<?= base_url('user/register') ?>">Εγγραφή</a></li>
							<li><a class="nav-link" href="<?= base_url('login') ?>">Σύνδεση</a></li>
						<?php endif; ?>
					</div>
				</nav>

		
				
		<!-- 		<script>
					$(document).ready(function(){
					  $('.toast').toast('show');
					});
				</script> -->
				
				<script>
				//this script is for notification. It uses push.js repository.					
				var now = new Date();
				var millisTill8 = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 8, 0, 0, 0) - now;
				var millisTill10 = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 10, 0, 0, 0) - now;
				var millisTill14 = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 14, 0, 0, 0) - now;
				var millisTill20 = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 20 , 0, 0, 0) - now;
				if (millisTill8 < 0) {
     		millisTill8 += 86400000; // it's after 10am, try 10am tomorrow.
     	}
     	if (millisTill10 < 0) {
     		millisTill10 += 86400000; // it's after 10am, try 10am tomorrow.
     	}
     	if (millisTill14 < 0) {
     		millisTill14 += 86400000; // it's after 10am, try 10am tomorrow.
     	}
     	if (millisTill20 < 0) {
     		millisTill20 += 86400000; // it's after 10am, try 10am tomorrow.
     	}
     	setTimeout(function(){
     		Push.create("Ώρα για πρωινό", {
     			body: "Να τρως αργά",
     			icon: '<?php echo base_url('assets/images/diet.png') ?>',
						    // timeout: 4000,
						    vibrate : [200,100],
						    requireInteraction : true,
						    onClick: function () {
						    	window.focus();
						    	this.close();
						    }
						});
     	}, millisTill8);
     	setTimeout(function(){
     		Push.create("Ώρα για δεκατιανό", {
     			body: "Ένα από τα πιο σημαντικά γεύματα της ημέρας",
     			icon: '<?php echo base_url('assets/images/diet.png') ?>',
						    // timeout: 4000,
						    requireInteraction : true,
						    onClick: function () {
						    	window.focus();
						    	this.close();
						    }
						});
     	}, millisTill10);
     	setTimeout(function(){
     		Push.create("Ώρα για μεσημεριανό", {
     			body: "Μην παραλείπεις τα γεύματα",
     			icon: '<?php echo base_url('assets/images/diet.png') ?>',
						    // timeout: 4000,
						    link : '<?php echo base_url('user/view_program') ?>',
						    requireInteraction : true,
						    onClick: function () {
						    	window.focus();
						    	this.close();
						    }
						});
     	}, millisTill14);
     	setTimeout(function(){
     		Push.create("Ώρα για φαγητό", {
     			body: "Το βράδυ να τρως ελαφριά",
     			icon: '<?php echo base_url('assets/images/diet.png') ?>',
						    // timeout: 4000,
						    ink : '<?php echo base_url('user/view_program') ?>',
						    requireInteraction : true,
						    onClick: function () {
						    	window.focus();
						    	this.close();
						    }
						});
     	}, millisTill20);
     	window.setInterval(function () {
     	},30000);

     </script>
     <main id="site-content" role="main">



