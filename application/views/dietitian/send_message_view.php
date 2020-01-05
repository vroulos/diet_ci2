
<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
<div class="container-fluid"> 
<?php echo form_open('dietitians/send_message'); ?>

 <div class="form-group" id="sendMessageId" style="max-width: 700px">
    <label for="exampleFormControlTextarea1">Μήνυμα</label>
    <textarea class="form-control" name="send_message" id="sendMessageId" rows="3" ></textarea>
  </div>
  	<!-- <button type="submit" class="btn btn-primary">Αποστολή</button> -->
  <?php echo form_submit('send', 'Αποστολή', "class = 'btn btn-dark' "); 

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


  <?php 
  //display the messages
  if(isset($messages)){ ?>
<div class="container-fluid">
	<?php foreach ($messages as $row) { 
		

					?>

 
    <div class="card" id="card_send_message_dietitian" >
    	<div class="card-body">
        <h5 class="card-title">Μήνυμα</h5>
        <p class="card-text" ><?php echo $row->message; //echo $row->id ?></p>
        <?php 
        //display all the answers
        foreach ($answers as $row2 ) {
        	if ($row->id == $row2->message_id) {
        		
        
        if ($row2->who_send_it  == 'dietitian') {
        		echo "<div class='card' id = 'dietitian_answer'>"; 
        		echo "<p class='card-text'>". $row2->answer; "</p>";
        		echo '</div><br>';
        	}elseif ($row2->who_send_it  == 'user') {
        		echo "<div class='card' id = 'user_answer'>"; 
        		echo "<p class='card-text'>". $row2->answer; "</p>";
        		echo '</div><br>';
        	}	
         ?>
       
    <?php }} ?>
        <form action="<?php echo base_url('dietitians/send_message') ?>" method="post">
          <input type="hidden" name="message_id" value="<?php echo $row->id ?>">
          
          <div class="card-body" id="search">

          		 <input class="form-control" name="reanswer" id="term" type="text" placeholder="απάντηση..." />
            <input style="margin-top: 10px; max-width: 100%;" type="submit" id="reply" name="reply" class="btn btn-dark" value="Απάντηση">
          	
           
          </div>
          <input type="submit" style=" max-width: 100%;" name="delete_message" class="btn btn-primary" value="διαγραφή μηνύματος" >
        </form>
        
      </div>
    </div>
  
  <?php 
	} 
  ?>


</div>
<?php }else{
  echo "Δεν έχεις στείλει ακόμη μήνυμα";
} ?>

</div>

