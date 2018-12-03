<?php echo form_open('dietitians/send_message'); ?>

 <div class="form-group">
    <label for="exampleFormControlTextarea1">Μήνυμα</label>
    <textarea class="form-control" name="send_message" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  	<!-- <button type="submit" class="btn btn-primary">Αποστολή</button> -->
  <?php echo form_submit('send', 'Αποστολή'); ?>