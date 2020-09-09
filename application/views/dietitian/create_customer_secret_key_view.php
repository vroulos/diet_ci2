<div id="create_customer_secret_key">
  <?php echo form_open('dietitians/create_customer_secret_key'); ?>
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
  <P>Προσθέτεις τον κωδικό . Στην συνέχεια αποστέλλεις τον κωδικό στον πελάτης ώστε να μπορεί να ολοκληρώσει την εγγραφή. </P>
  <table class="table col-sm-4">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Κωδικός ταυτοποίσης</th>   
        <th scope="col">email πελάτη</th>
        <th scope="col">Κατάσταση πελάτη</th>  
      </tr>
  </thead>
  <tbody>
      <?php if (isset($password)){ ?>
      <?php foreach ($password as $row) { ?> 	
       <tr>
         <th scope="row"><?php echo $row->id; ?></th>
         <td><?php echo $row->password_id ?></td>
         <td><?php echo $row->user_email; ?></td>
         <td><?php echo ($row->in_use == 1 ? "Εγγεγραμμένος": "Αναμονή για εγγραφή"); ?></td>
     </tr>
   <?php } } ?>
  </tbody>
  </table>
</div>