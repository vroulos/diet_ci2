<div class="container-fluid" id ="my_meals_view">
  

      <style type="text/css">
      	/*#my_meals_view_div {
         margin-left: 200px;
         margin-right: 200px;
      }*/
      .footer{
      	
        left: 0;
        bottom: 0;
        width: 100%;
      }
      </style>


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
    	$x = 0;
    	 foreach ($my_meals as $value) {  ?>
          <tr>
            <th scope="row"><?php echo $x; ?></th>
            <td><?php echo $value->foodname."</td>"; ?>
            <td><?php echo $value->food_type."</td>";
             $x++; ?>
             <td><?php echo $value->calories_per_100;?></td>
             <?php 
             if (isset($_SESSION['dietitian_name'])) {
                echo form_open('dietitians/my_meals');
                echo '<input type = "hidden" name = "meal_id" value ="'.$value->id.'" >';
                //echo $value->id;
                echo '<td><input type="submit" value="Διαγραφή" class="btn btn-dark" ></td>';
                echo form_close();
             }
              ?>
           </td>
          </tr>
          <tr>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>   
</div>
</div>

