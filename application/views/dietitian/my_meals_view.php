
<style type="text/css">
	#my_meals_view_div {
   margin-left: 200px;
   margin-right: 200px;
}
.footer{
	
  left: 0;
  bottom: 0;
  width: 100%;
}
</style>

<div id="my_meals_view_div">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Όνομα</th>
      <th scope="col">Είδος</th>
      <th scope="col">Θερμίδες/100γρ.</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	$x = 1;
  	 foreach ($my_meals as $value) {  ?>
    <tr>
      <th scope="row"><?php echo $x; ?></th>
      <td><?php echo $value->foodname."</td>"; ?>
      <td><?php echo $value->food_type."</td>";
       $x++; ?>
       <td><?php echo $value->calories_per_100;?></td>
  	 
     </td>
    </tr>
    <tr>
       
     </td>
    </tr>
    <?php } ?>
   </tbody>
   </div>

