<div class="container">

  <h2>Εισαγωγή φαγητού</h2>

  <!-- forma eisagogis fagitou -->
  <?= form_open('dietitians/insert_food'); ?>

  <div id="meal" class="form-group">
    <label for="food">φαγητό:</label>
    <input type="text" class="form-control" id="food" name="food">
    <label for="type">τύπος φαγητού</label>
    <input type="text" class="form-control" name="type" id="type">
    <label for="calories">θερμίδες ανά 100 γραμμάρια</label>
    <input type="number" class="form-control" name="calories" id="calories">
  </div>

  <?php echo form_submit('submit_food', 'Υποβολή' , "class = 'btn btn-dark' "); ?>

  <?php echo validation_errors(); //display validation errors ?>

  <div class="alert alert-success" role="alert">
    <?php 
    //$success variable is set on dietitian model . if the query success
    if (isset($success)){
       
      echo 'Το φαγητό μπήκε στη βάση επιτυχώς';
    }else{
      echo 'δεν έχεις εισάγη κάποιο φαγητό ακόμη';
    
    }
   
    ?>  
  </div>
</div>