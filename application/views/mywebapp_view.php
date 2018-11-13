<!DOCTYPE html>
<html>
<head>

	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

	<title>connect to eat better</title>

<style type="text/css">
	.container {
  display: flex; /* or inline-flex */
  justify-content: space-around;
}

img{
	height: 300px;
	width: 300px;
}
h1{
	font-family: "Comic Sans MS", cursive, sans-serif;
}
</style>

</head>
<body>
	<h1>welcome to mywebapp</h1>



<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						
						<li><a href="<?= base_url('user/login') ?>">Είσοδος Χρήστη</a></li>
						<li><a href="<?= base_url('dietitians/logind') ?>">Είσοδος Διαιτολόγου</a></li>
					</ul>
</div>

<div class="container">
	<img src="<?= base_url('assets/images/nutricion.jpg')?>">
	<img src="<?= base_url('assets/images/consistency.jpg')?>">
	<img src="<?= base_url('assets/images/exercise.jpg')?>">

</div>
</body>
</html>