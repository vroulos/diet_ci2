<!-- <?php foreach ($messages as $row) { ?>
		<p class="lead"><?php echo $row->message; ?></p>
<?php } ?> -->

<?php if(isset($messages)){ ?>
<div class="row">
	<?php foreach ($messages as $row) { ?>

  <div class="col-sm-6">
    <div class="card" style="margin: 50px">
      <div class="card-body">
        <h5 class="card-title">Μήνυμα</h5>
        <p class="card-text"><?php echo $row->message; //echo $row->id ?></p>
        <form action="<?php echo base_url('user/messages') ?>" method="post">
          <input type="hidden" name="message_to_delete" value="<?php echo $row->id ?>">
          <input type="submit" name="message" class="btn btn-primary" value="διαγραφή" >
          
        </form>
        
      </div>
    </div>
  </div>
  <?php } ?>


</div>
<?php }else{
  echo "you have not messages yet";
} ?>

