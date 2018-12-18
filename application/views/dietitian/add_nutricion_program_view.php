
<h3>πρόσθεσε το εβδομαδιαίο γεύμα στον <?php if (isset($_SESSION['customer_name'])){
	echo $_SESSION['customer_name'];
} ?> </h3>

<h1></h1>

<?php if (isset($foods)){ ?>
<div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Γεύματα
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <?php foreach ($foods as $row) { ?>
  	<a class="dropdown-item" href="#"><?php echo $row->foodname ?></a>
  <?php  } ?>
  </div>
</div>
<?php } ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Δευτέρα</th>
      <th scope="col">Τρίτη</th>
      <th scope="col">Τετάρτη</th>
      <th scope="col">Πέμπτη</th>
      <th scope="col">Παρασκευή</th>
      <th scope="col">Σάββατο</th>
      <th scope="col">Κυριακή</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    	<?= form_open('dietitians/add_nutricion_program'); ?>
    	   <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="breakfast_monday" class="sr-only">πρωινό</label>
    <input type="text" class="form-control" name = "breakfast_monday" placeholder="πρωινό">
  </div>
 </td>
     
       <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="breakfast_tuesday" class="sr-only">πρωινό</label>
    <input type="text" class="form-control" name = "breakfast_tuesday" placeholder="πρωινό">
  </div>
 </td>
     <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="breakfast_tuesday" class="sr-only">πρωινό</label>
    <input type="text" class="form-control" name = "breakfast_wendsday" placeholder="πρωινό">
  </div>
 </td>
     <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="breakfast_tuesday" class="sr-only">πρωινό</label>
    <input type="text" class="form-control" name = "breakfast_thursday" placeholder="πρωινό">
  </div>
 </td>
     <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="breakfast_tuesday" class="sr-only">πρωινό</label>
    <input type="text" class="form-control" name = "breakfast_friday" placeholder="πρωινό">
  </div>
 </td>
     <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="breakfast_tuesday" class="sr-only">πρωινό</label>
    <input type="text" class="form-control" name = "breakfast_saturday" placeholder="πρωινό">
  </div>
 </td>
     <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="breakfast_tuesday" class="sr-only">πρωινό</label>
    <input type="text" class="form-control" name = "breakfast_sunday" placeholder="πρωινό">
  </div>
 </td>
    </tr>
    <tr>
         <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="lunch_monday" class="sr-only">μεσημεριανό</label>
    <input type="text" class="form-control" name = "lunch_monday" placeholder="μεσημεριανό">
  </div>
 </td>
              <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="lunch_tuesday" class="sr-only">μεσημεριανό</label>
    <input type="text" class="form-control" name = "lunch_tuesday" placeholder="μεσημεριανό">
  </div>
 </td>
              <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="lunch_wendsday" class="sr-only">μεσημεριανό</label>
    <input type="text" class="form-control" name = "lunch_wendsday" placeholder="μεσημεριανό">
  </div>
 </td>
              <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="lunch_thursday" class="sr-only">μεσημεριανό</label>
    <input type="text" class="form-control" name = "lunch_thursday" placeholder="μεσημεριανό">
  </div>
 </td>
         <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="lunch_friday" class="sr-only">μεσημεριανό</label>
    <input type="text" class="form-control" name = "lunch_friday" placeholder="μεσημεριανό">
  </div>
 </td>
         <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="lunch_saturday" class="sr-only">μεσημεριανό</label>
    <input type="text" class="form-control" name = "lunch_saturday" placeholder="μεσημεριανό">
  </div>
 </td>
          <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="lunch_sunday" class="sr-only">μεσημεριανό</label>
    <input type="text" class="form-control" name = "lunch_sunday" placeholder="μεσημεριανό">
  </div>
 </td>

    </tr>
    <tr>
           <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="dinner_monday" class="sr-only">βραδινό</label>
    <input type="text" class="form-control" name = "dinner_monday" placeholder="βραδινό">
  </div>
 </td>
               <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="dinner_tuesday" class="sr-only">βραδινό</label>
    <input type="text" class="form-control" name = "dinner_tuesday" placeholder="βραδινό">
  </div>
 </td>
                     <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="dinner_wendsday" class="sr-only">βραδινό</label>
    <input type="text" class="form-control" name = "dinner_wendsday" placeholder="βραδινό">
  </div>
 </td>
                   <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="dinner_thursday" class="sr-only">βραδινό</label>
    <input type="text" class="form-control" name = "dinner_thursday" placeholder="βραδινό">
  </div>
 </td>
                <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="dinner_friday" class="sr-only">βραδινό</label>
    <input type="text" class="form-control" name = "dinner_friday" placeholder="βραδινό">
  </div>
 </td>
                <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="dinner_saturday" class="sr-only">βραδινό</label>
    <input type="text" class="form-control" name = "dinner_saturday" placeholder="βραδινό">
  </div>
 </td>
                <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="dinner_sunday" class="sr-only">βραδινό</label>
    <input type="text" class="form-control" name = "dinner_sunday" placeholder="βραδινό">
  </div>
 </td>
    </tr>
 
  </tbody>
</table>
<?php echo form_submit('program_submit', 'υποβολή', "class='btn btn-dark'"); ?>

<?php if(isset($_POST['program_submit'])){ ?>
<div class="alert alert-danger" role="alert">
  <?php echo validation_errors() ?>
</div>
<?php } ?>