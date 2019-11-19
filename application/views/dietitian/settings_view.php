<?php 

if (isset($dietitian_profile_info)) {
	$name = $dietitian_profile_info->dietitian_name;
	$email = $dietitian_profile_info->dietitian_email;
	$age = $dietitian_profile_info->dietitian_age;
	$mobile = $dietitian_profile_info->dietitian_mobile;
	?>

<div id="col-1">
	<p>Όνομα : <?php echo $name ?></p>
	<p>email : <?php echo $email; ?></p>
	<p>Ηλικία : <?php echo $age; ?></p>
	<p>Τηλέφωνο : <?php echo $mobile; ?></p>
	<?php 
	}else {
	echo "Οι πληροφορίες δεν είναι τώρα διαθέσιμες";
	} 
	?>
	<button type="button" class="btn btn-dark" onclick="document.getElementById('col-2').style.display = 'block'">Επεξεργασία</button>
</div>

<div id="col-2">
	<?= form_open('dietitians/settings'); ?>
	<div class="form-group">
		<label for="exampleInputEmail1">Νέο Όνομα</label>
		<input type="text" class="form-control" name="newDietitianName" id="newName" aria-describedby="nameHelp" placeholder="Όνομα">
		<label for="exampleInputEmail1">Email</label>
		<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" name="newEmail">
		<small id="emailHelp" class="form-text text-muted">Ποτέ δεν θα μοιραστούμε το email σου.</small>

	</div>
	<div class="form-group">
		<label for="number">Τηλέφωνο</label>
		<input type="tel" class="form-control" id="mobileId" placeholder="Τηλέφωνο" name="newMobile">
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">Ηλικία</label>
		<input type="number" class="form-control" id="ageId" placeholder="Ηλικία" name="newAge" >
	</div>
	<div class="form-check">
		<input type="checkbox" class="form-check-input" id="exampleCheck1">
		<label class="form-check-label" for="exampleCheck1">Έλεγχος</label>
	</div>
	<?php echo form_submit('new_info_submit', 'υποβολή', "class='btn btn-dark'"); ?>
	<?php //echo form_button('new_info_submit', 'υποβολή'); ?>
</form>

</div>
<?php echo validation_errors(); ?>

<div id="demo">

</div>






