<div id="create_customer_identity">
  <?php echo form_open('dietitians/create_customer_identity'); ?>
  <div class="formOnCustomerIdentity">
  <div class="form-group" id="insertNewUserPassword">
   <label>προσθήκη κωδικού</label>
   <input type="text" class="form-control" name="register_password" class="" >
 </div>
 <div class="form-group" id="insertUserEmail">
  <label>προσθήκη email νέου πελάτη</label>
  <input type="email" name="user_email" class="form-control">
</div>
<input type="submit" name="submit_register_password" value="προσθήκη" class="btn btn-secondary">
</div>
<?php echo form_close(); ?>

<?php echo validation_errors(); ?>
<hr>
<P>Προσθέτεις τον κωδικό . Μετά ο πελάτης τον λαμβάνει μέσω email. </P>
<table class="table col-sm-4">
  <thead>
    <tr>
      <th scope="col">#</th>
<!--       <th scope="col">Όνομα πελάτη</th>
-->      <th scope="col">Κωδικός ταυτοποίσης</th>   
          <th scope="col">email πελάτη</th>  
</tr>
</thead>
<tbody>
 <?php if (isset($password)){ ?>
   <?php foreach ($password as $row) { ?> 	
    <tr>
     <th scope="row"><?php echo $row->id; ?></th>
     <td><?php echo $row->password_id ?></td>
     <td><?php echo $row->user_email; ?></td>
   </tr>
 
 <?php } } ?>
</tbody>
</table>
</div>