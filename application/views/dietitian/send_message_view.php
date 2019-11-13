<?php echo form_open('dietitians/send_message'); ?>

 <div class="form-group" style="margin: 50px">
    <label for="exampleFormControlTextarea1">Μήνυμα</label>
    <textarea class="form-control" name="send_message" id="exampleFormControlTextarea1" rows="3" style="width: 700px"></textarea>
  </div>
  	<!-- <button type="submit" class="btn btn-primary">Αποστολή</button> -->
  <?php echo form_submit('send', 'Αποστολή', "class = 'btn btn-dark' style = 'margin-left:50px' "); ?>