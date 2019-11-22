<?php 
	// if (isset($program)) {
	// 	foreach ($program as $row) {
	// 		echo $row->day."  ";
	// 		echo $row->hour."  ";
	// 		echo $row->food."<br>";
	// 	}
	// }else{
	// 	echo "meals is not set";
	// }
	

	?>

	<table class="table" style="margin-right: 200px; margin-bottom: 200px; margin-top: 100px">
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
		$i=0;
		$number = 0;
		$days = array("Δευτέρα", "Τρίτη","Τετάρτη", "Πέμπτη", "Παρασκευή","Σάββατο","Κυριακή");
  	foreach ($program as $meal) {

  		if ($i == 0) {
  			echo "<tr>";
  			echo "<td>".$days[$number]."</td>";
  			$number++;
  		}
  		$i++;
  		$comma = substr_count($meal->food, ",");
  	
  		if ($comma > 0) {
  			$some_meals = str_replace(',','<br>', $meal->food);
  			echo "<td>".$some_meals."</td><br>"; 			
  		}else{
  			echo "<td>".$meal->food."</td>";
  		}
  		
  		if ($i== 3) {
  			echo "</tr>";
  		
  			$i=0;
  		}

  		}?>
 


    </tr>

  </tbody>
</table>