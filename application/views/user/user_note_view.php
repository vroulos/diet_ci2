<?php echo form_open('user/add_user_note'); ?>

  <script>
    $(document).ready(function() {
      $('#change').submit(function() {
        alert("deleted");
        var id = $('#message').val();
        $.ajax({
          type:'POST',
          url: '<?php echo base_url('user/delete_note1') ?>',
          data:{'id':id},
          success:function(data){
            alert("id deleted now");
          }
        });
      });
    });
  </script>


<div class="form-group" style="max-width: 700px; margin-left: 50px ">
  <label for="exampleFormControlTextarea1">Προσθήκη σημείωσης</label>
  <textarea class="form-control" name="add_note" id="new_note" rows="3"></textarea>
  <?php echo validation_errors(); //display validation errors ?>
</div>
<!-- <button type="submit" class="btn btn-primary">Αποστολή</button> -->

<input type="submit" value="Προσθήκη σημείωσης" name="add" class="btn btn-dark" id="buttonAddNote" style="margin-left: 50px">
<div>
<hr/>
</div>
<?php echo form_close(); ?>

<div class="row">
	<?php foreach ($notes as $row) { ?>

    <div class="col-sm-6" style="max-width: 600px; margin-left: 50px; margin-top: 30px">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Σημείωση</h5>
          <p class="card-text"><?php echo $row->note; //echo $row->id ?><br>ημερομηνία : <?php echo $row->date_inserted; ?></p>
          <form action=" <?php echo base_url('user/delete_note') ?>" method="post" id="change">
            <input type="hidden" id  = "message" name="note_to_delete" value="<?php echo $row->id ?>">
            <input id = "aButton" type="submit" name="note" class="btn btn-primary" value="διαγραφή" >

          </form>
         


        </div>
      </div>
    </div>
    
  <?php } ?>




