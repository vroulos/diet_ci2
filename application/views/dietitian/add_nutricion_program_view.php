
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
    	<?= form_open('dietitians/insert_program'); ?>
    	   <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="breakfast_monday" class="sr-only">πρωινό</label>
    <input type="text" class="form-control" name = "breakfast_monday" placeholder="πρωινό">
  </div>
 </td>
     
      <td>Otto</td>
    </tr>
    <tr>
         <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="lunch_monday" class="sr-only">μεσημεριανό</label>
    <input type="text" class="form-control" name = "lunch_monday" placeholder="μεσημεριανό">
  </div>
 </td>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
           <td>  
  <div class="form-group mx-sm-3 mb-2">
    <label for="dinner_monday" class="sr-only">βραδινό</label>
    <input type="text" class="form-control" name = "dinner_monday" placeholder="βραδινό">
  </div>
 </td>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
 
  </tbody>
</table>
<?php echo form_submit('program_submit', 'υποβολή', "class='btn btn-dark'"); ?>