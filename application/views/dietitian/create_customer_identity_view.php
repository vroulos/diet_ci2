<?php echo form_open('dietitians/create_customer_identity'); ?>
<div class="form-group">
	<label>προσθήκη κωδικού</label>
<input type="text" class="form-control" name="register_password" class="">
</div>
<input type="submit" name="submit_register_password" class="btn btn-secondary">
<?php echo form_close(); ?>

<?php echo validation_errors(); ?>
<hr>
<P>Προσθέτεις τον κωδικό . Το δίνεις στον πελάτη για να κάνει εγγραφή . Μετά την εγγραφή του πελάτη ο κωδικός διαγράφεται. </P>
<table class="table col-sm-4">
  <thead>
    <tr>
      <th scope="col">#</th>
<!--       <th scope="col">Όνομα πελάτη</th>
 -->      <th scope="col">Κωδικός ταυτοποίσης</th>     
    </tr>
  </thead>
  <tbody>
  	<?php if (isset($password)){ ?>
    	<?php foreach ($password as $row) { ?> 	
    <tr>
      	<th scope="row"><?php echo $row->id; ?></th>
		<td><?php echo $row->password_id ?></td>
    </tr>
<?php } } ?>
  </tbody>
</table>