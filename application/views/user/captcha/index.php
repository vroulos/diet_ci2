<div class="container" style="margin-top: 50px"></div>
<div class="container">
	<h4>Υποβολή Captcha Code</h4>
	<?php if (isset($message)) {

    echo '<p class="alert alert-info">'.$message.'</p>';
} elseif (isset($error)) {

    echo '<p class="alert alert-danger"><strong>Σφάλμα: </strong>'.$error.'</p>';
}?>


			<p id="captImg" ><?php echo $captchaImg;  ?></p>
		

	
	<p>Δεν μπορείς να διαβάσεις την εικόνα; πάτησε  <a href="javascript:void(0);" class="refreshCaptcha">εδώ</a> για ανανέωση.</p>
		<?php echo form_open('user/indexCaptcha'); ?>
		<div class="form-group">
	    Πληκτρολόγησε τον κωδικό : 
	    <input type="text" class="form-control" name="captcha" value=""/>
	</div>
	    <!-- <input type="submit" name="submit" value="SUBMIT"/> -->
	    <button type="submit" name="submit" value="submit" class="btn btn-alert">Υποβολή</button>

	<?php echo form_close(); ?>
</div>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- captcha refresh code -->
<script>
$(document).ready(function(){
    $('.refreshCaptcha').on('click', function(){
        $.get('<?php echo base_url().'user/refresh'; ?>', function(data){
            $('#captImg').html(data);
        });
    });
});
</script>