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
				<h3>Εγγραφή</h3>
				<p>Η διαδικασία είναι εύκολη και γρήγορη</p> 
			</div>
			<?= form_open() ?>
				<div class="form-group">
					
					<input type="text" class="form-control" id="username" name="username" placeholder="Όνομα">
					<!-- <p class="help-block">Τουλαχιστον 4 χαρακτήρες, γράμματα ή αριθμοί μόνο</p> -->
				</div>
				<div class="form-group">
					<!-- <label for="email">Email</label> -->
					<input type="email" class="form-control" id="email" name="email" placeholder="email">
					<!-- <p class="help-block">Έγκυρη διεύθυνση email</p> -->
				</div>
				<div class="form-group">
					<input type="password" class="form-control" id="password" name="password" placeholder="κωδικός">
					<!-- <p class="help-block">Τουλάχιστον 6 χαρακτήρες</p> -->
				</div>
				<div class="form-group">
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Επαλήθευση κωδικού">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-warning" value="Εγγραφή" style="margin-top: 10px">
				</div>
			</form>		
		</div>
	</div><!-- .row -->
</div><!-- .container -->