<?php echo form_open('user/add_user_note'); ?>

 <div class="form-group">
    <label for="exampleFormControlTextarea1">Προσθήκη σημείωσης</label>
    <textarea class="form-control" name="add_note" id="new_note" rows="3"></textarea>
    <?php echo validation_errors(); //display validation errors ?>
  </div>
  	<!-- <button type="submit" class="btn btn-primary">Αποστολή</button> -->
  <?php echo form_submit('add', 'Προσθήκη'); ?>
  <div>
  	<p>another div from down there</p>
  </div>
  <?php echo form_close(); ?>

  <div class="row">
	<?php foreach ($notes as $row) { ?>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Σημείωση</h5>
        <p class="card-text"><?php echo $row->note; echo $row->id ?></p>
        <form action="<?php echo base_url('user/delete_note') ?>" method="post">
          <input type="hidden" name="note_to_delete" value="<?php echo $row->id ?>">
          <input type="submit" name="note" class="btn btn-primary" value="διαγραφή" >
          
        </form>
        
      </div>
    </div>
  </div>
  <?php } ?>


