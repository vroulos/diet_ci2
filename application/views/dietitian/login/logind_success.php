<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link rel="stylesheet" href="assets/style.css" type="text/css">
<!DOCTYPE html>
<html>
<head>
  <title></title>

<style type="text/css">

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
				<button type="button" class="btn btn-primary btn-md">Logout <?php echo $name ?></button>
				<h1>Login success!</h1>
			</div>
			<p>You are now logged in dietitian.</p>
		</div>
	</div><!-- .row -->
</div><!-- .container -->

    <div class="row">
      <div class="col-md-3">
        Section 1
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

