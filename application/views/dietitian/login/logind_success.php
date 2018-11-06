<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link rel="stylesheet" href="assets/style.css" type="text/css">

<!DOCTYPE html>
<html>
<head>
  <title></title>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/calendar.css') ?>">










</style>

</head>
<body>

</body>
</html>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php $name =  $this->input->post('dietname'); ?>
		    <!-- button to logout -->
        <ul class="nav navbar-nav navbar-left">
        <li><a href="<?= base_url('dietitians/logoutd') ?>">Logout</a></li>
      </ul>
				<h1>Login success!</h1>
			</div>
			<p>You are now logged in dietitian.</p>
		</div>
	</div><!-- .row -->
</div><!-- .container -->

    <div class="row">
      <div class="col-md-3">

      




       


<body>
<div id='wrap'>

<div id='calendar'></div>

<div style='clear:both'></div>
</div>
</body>





        </div>
      <div class="col-md-3">
        Section 2
        </div>
      <div class="col-md-3">
        Section 3
        </div>
      <div class="col-md-3">
        Section 4
        </div>
    </div>

</html>