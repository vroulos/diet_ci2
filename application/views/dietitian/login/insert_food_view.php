<div class="container">


  

  <table class="table">
    <thead>
      <th>πελάτης</th>
    </thead>
    <tbody>
      <?php // emfanizontai oloi oi pelates se morfi pinaka ?>
      <?php foreach ($users as $row) { ?>
        <tr>
      <td><a href="http://localhost/diet_ci2/dietitians/customer?id=<?php echo $row->id  ?>"><?php echo $row->username; ?></a></td>
      </tr>
     <?php } ?>
    </tbody>

  </table>



  <h2>Εισαγωγή φαγητού</h2>

<?= form_open('dietitians/customer'); ?>
    <div id="meal" class="form-group">
      <label for="food">φαγητό:</label>
      <input type="text" class="form-control" id="food" name="food">
    </div>
<!--       <button type="submit" class="btn btn-primary">Submit</button>
 -->  <?php echo form_submit('submit_food', 'Υποβολή'); ?>

 <div class="alert alert-success" role="alert">
<?php 
  if (isset($foodname)) {
    echo $foodname;
  }else{
    echo 'δεν έχεις εισάγη κάποιο φαγητό ακόμη';
  }
 ?>  
</div>
</div>