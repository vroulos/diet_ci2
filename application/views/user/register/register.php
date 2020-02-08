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
					<input type="password" class="form-control" id="password" name="password_identity" placeholder="ταυτοποίση ">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-warning" value="Εγγραφή" style="margin-top: 10px">
				</div>
			</form>
			<hr/>
			<?php //echo form_open('get_unique_password_to_email'); ?>
			<div class="form-group">
					<label>Email:</label>
					<input type="text" name="email" id="email_user" class="form-control" placeholder="συμπλήρωσε το email σου">
				</div>
			<button type="submit" id="btn" class="btn btn-secondary" value="register" style="margin-top: 30px">Λάβε τον κωδικό στο email σου</button>
		</div>
	</div><!-- .row -->
</div><!-- .container -->

<script>
	//this script is using ajax and send to new user his registration password via email
	$(function(){
		$("#btn").click(function(event) {
			/* Act on the event */
			event.preventDefault();
			var email = $('#email_user').val();
			//var email = 'lalala';
			

			$.ajax(
					{
						type: "post",
						url: "<?php echo base_url(); ?>get_unique_password_to_email",
						datatype:'json',
						data:{email:email},
						success:function(response)
						{
							console.log(response);
							$("#message").html(response);
							$('#cartmessage').show();
						},
						error: function(XMLHttpRequest, textStatus, errorThrown) {
     						alert("some error");
     						console.log(errorThrown);
     						console.log(XMLHttpRequest.status);
  						}
					}
				);
		});
	});
</script>