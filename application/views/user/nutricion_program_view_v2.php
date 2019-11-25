
	<div style="margin: 90px">
		<?php if (isset($_SESSION['customer_name'])) {
			echo "<p>Πρόγραμμα διατροφής για τον πελάτη ". $_SESSION['customer_name'];
		} ?>
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

	$meal_hour = array('breakfast', 'lunch', 'dinner');
	$day_of_week = array ('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
	if ($program) {
		foreach ($day_of_week as $day) {
		echo "<tr>";
		echo "<td>".$day."</td>";
		foreach ($meal_hour as $hour) {
			// koitaw an exei eggrafh gia afth thn mera kai thn wra gevmatos
			// an exei eggrafh thn emfanizw, alliws aplws ektypwnw to keli
			echo "<td>";
			foreach ($program as $rs) {
				if ($rs->day == $day && $rs->hour == $hour) {
					echo $rs->food;
					// nea grammh se periprwsh poy exoume panw apo ena faghto
					// gia ka8e wra gevmatos
					echo "<br>";
				}
			}
			echo "</td>";
		}
		echo "</tr>";
	}
	}
		?>
    </tr>

  </tbody>
</table>
</div>