<?php echo form_open('dietitians/send_message'); ?>

 <div class="form-group" style="margin: 50px">
    <label for="exampleFormControlTextarea1">Μήνυμα</label>
    <textarea class="form-control" name="send_message" id="exampleFormControlTextarea1" rows="3" style="width: 700px"></textarea>
  </div>
  	<!-- <button type="submit" class="btn btn-primary">Αποστολή</button> -->
  <?php echo form_submit('send', 'Αποστολή', "class = 'btn btn-dark' style = 'margin-left:50px' "); 

$error = $this->session->flashdata('error');
$success = $this->session->flashdata('success');

	//if the validation is not correct display the error message
	if (validation_errors() != false) {
	echo "<div style = 'width: 300px; margin: 40px'>";
	echo "<div class='alert alert-danger' role='alert' >";
	echo validation_errors('<span class="error">', '</span>');
	
	echo "</div>";
	echo "</div>";
	}

	//display the error or sucess message
 if (isset($error) or isset($success) ) {
	echo "<div style = 'width: 300px; margin: 40px'>";
	echo "<div class='alert alert-success' role='alert' >";
	echo $error;
	echo $success;
	
	echo "</div>";
	echo "</div>";

  
 }



  ?>

