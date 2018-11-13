<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">

	<div class="row">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="<?= base_url('mywebapp/first') ?>">Αρχική</a></li>
		</ul>
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
				<h1>Είσοδος</h1>
			</div>
		<?= form_open(); ?>
		<div class="form-group">
			<div class="form-group">
					<label for="dietname">Όνομα χρήστη</label>
					<input type="text" class="form-control" id="dietname" name="dietname" placeholder="Όνομα">
				</div>
				<div class="form-group">
					<label for="password">Κωδικός</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Κωδικός">
				</div>
			<?php echo form_submit('mysubmit', 'Υποβολή'); ?>
		</div>

	</div>

</div>