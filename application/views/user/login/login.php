<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-md-12">
			<div class="page-header">
				<h1 style="font-family: sans-serif;">Σύνδεση</h1>
			</div>
			<?= form_open() ?>
				<div class="form-group">
					<label for="username">Όνομα Χρήστη</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Το Όνομα σου" style="max-width: 230px">
				</div>
				<div class="form-group">
					<label for="password">Κωδικός</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Ο Κωδικός σου" style="max-width: 230px" >
					<input type="checkbox" name="mybox" onclick="myFunction()"> 
					<label class="form-check-label" for="exampleCheck1">Εμφάνιση κωδικού</label>
				<div class="form-group">
					<input type="submit" class="btn btn-dark" value="Σύνδεση" style="margin-top: 10px">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->

<script type="text/javascript">
	function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 
</script>