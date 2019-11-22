
	<div style="margin: 90px">
		<p>Πρόγραμμα διατροφής για τον πελάτη <?php echo $_SESSION['customer_name']; ?></p>
	<table class="table" >
  <thead>
    <tr>    
      <th scope="col">Ημέρα</th>
      <th scope="col">Πρωινό</th>
      <th scope="col">Μεσημεριανό</th>
      <th scope="col">Βραδινό</th>
    </tr>
  </thead>
  <tbody>
  	<?php  
		$i=0;//i am using it for line break
		$number = 0;
		$days = array("Δευτέρα", "Τρίτη","Τετάρτη", "Πέμπτη", "Παρασκευή","Σάββατο","Κυριακή");
  	//in this loop i am displaying the nutricion program of the choosen user
  	foreach ($program as $meal) {

  		if ($i == 0) {
  			echo "<tr>";//when i= 0 i add a new row in the table else i am putting table data
  			echo "<td>".$days[$number]."</td>";//display the day of the week from the table $days[]
  			$number++;//increase the index of the table $days[]
  		}
  		$i++;//increase the i . When becomes 3 i close the table line

  		//count how many commas contains the meal
  		$comma = substr_count($meal->food, ",");
  		
  		//if the string contains comma(,)
  		if ($comma > 0) {
  			//replace the , with <br> for new line
  			$some_meals = str_replace(',','<br>', $meal->food);
  			echo "<td>".$some_meals."</td><br>"; 			
  		}else{
  			echo "<td>".$meal->food."</td>";
  		}
  		
  		if ($i== 3) {
  			echo "</tr>";// finishing the table line
  		
  			$i=0;// index that i am using it to add new line
  		}

  		}?>

    </tr>

  </tbody>
</table>
</div>