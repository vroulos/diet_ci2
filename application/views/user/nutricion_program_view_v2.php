<?php //use \Datetime; ?>

<script>
$(document).ready(function() {
	//for (var i = 0; i < 28; i++) {
		// $("[id*='mealInProgram']").mouseenter(function(){
  // 		$("[id*='feedback']").show(); 
		// });
		// $('#meal,#mealInProgram').mouseleave(function(){
  // 		$('#feedback').hide();
		// });
	//}
	// for (var i = 0; i < 28; i++) {
	// 	$('#meal,#mealInProgram' +i).mouseenter(function(){
 //   		$('#feedback10').show();
	// 	});
	// 	$('#meal,#mealInProgram').mouseleave(function(){
 //   		$('#feedback10').hide();
	// 	});
	// }
	

	// -------------------------------------------------------------------------
		// $('#meal0,#feedback0', '#mealInProgram0').mouseenter(function(){
  //  		$('#feedback0').show();
		// });
		// $('#editText0').click(function(event) {
		// 	$('#inputT0').show();
		// });
		// $('#feedback0').mouseleave(function(){
  //  		$('#feedback0').delay(10000).fadeOut(3000);
		// });



		// $('#meal1,#mealInProgram1').mouseenter(function(){
  //  		$('#feedback1').show();
		// });
		// $('#feedback1').mouseleave(function(){
  //  		$('#feedback1').fadeOut('slow');
		// });

		// $('#meal2,#mealInProgram2').mouseenter(function(){
  //  		$('#feedback2').show();
		// });
		// $('#feedback2').mouseleave(function(){
  //  		$('#feedback2').fadeOut('slow');
		// });

		// $('#meal3,#mealInProgram3').mouseenter(function(){
  //  		$('#feedback3').show();
		// });
		// $('#feedback3').mouseleave(function(){
  //  		$('#feedback3').fadeOut('slow');
		// });

		// $('#meal5,#mealInProgram5').mouseenter(function(){
  //  		$('#feedback5').show();
		// });
		// $('#feedback5').mouseleave(function(){
  //  		$('#feedback5').fadeOut('slow');
		// });

		// ------------------------------------------------

		$("#mealInProgram, #meal").click(function(event) {
			$(this).find(".feedback").show();
		});
		$(".feedback").find("#editText").click(function(event) {
			alert("ldgfdsg");
			$(this).next().show();
		});


		$(".feedback").find("#heart").click(function(event) {
			var $value = $(this).parent().find("#heart").attr("value");
			alert($value);
			$.ajax({
				url: '<?php echo base_url('user/food_feedback') ?>',
				type: 'POST',
				
				data: {
					'reaction': 'like',
					'meal_id' : $value
				},
				success: function(msg){
					alert('wow ' + msg);
				}

			})
			
		});

			$(".feedback").find("#thumbsDown").click(function(event) {

				var $value = $(this).parent().find("#thumbsDown").attr("value");
				alert($value);
			$.ajax({
				url: '<?php echo base_url('user/food_feedback') ?>',
				type: 'POST',
				
				data: {
					'reaction': 'dislike',
					'meal_id' : $value
				},
				success: function(msg){
					alert('wow ' + msg);
					$(this).parent().find("#inputT").show();
				}

			})
			
		});

				$(".feedback").find("#editText").click(function(event) {

				var $value = $("#thumbsDown").attr("value");
				var $text = $("#inputValue").val();
				alert($value);
			$.ajax({
				url: '<?php echo base_url('user/food_feedback') ?>',
				type: 'POST',
				
				data: {
					'textreaction': $text,
					'meal_id' : $value
				},
				success: function(msg){
					alert('wow ' + msg);
				}

			})
			
		});	
		
	
	});
	

</script>

<div class="container" style="margin: 90px">
	<?php if (isset($_SESSION['customer_name'])) {
		echo "<p>Πρόγραμμα διατροφής για τον πελάτη ". $_SESSION['customer_name'];
		
	
		if (isset($program) and !empty($program)) {
			foreach ($program as $value) {
			$date = $value->date;
			$date_object=date_create($date);
			$date_object_formated = date_format($date_object,"Y-m-d");

			date_add($date_object,date_interval_create_from_date_string("7 days"));
			$my_date_plus_one_week =  date_format($date_object,"Y-m-d");
		}
		echo ".      Ημερομηνία από : ".$date_object_formated." έως : ". $my_date_plus_one_week;
		}
		
	} ?>
	<div class="table-responsive">
		
	
	<table class="table" style="border-collapse: collapse;" >
		<thead>
			<tr>    
				<th scope="col">Ημέρα</th>
				<th scope="col">Πρωινό</th>
				<th scope="col">Δεκατιανό</th>
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

		$meal_hour = array('breakfast','brunch', 'lunch', 'dinner');
		$day_of_week = array ('monday'=>'Δευτέρα', 'tuesday'=>'Τρίτη', 'wednesday'=>'Τετάρτη', 'thursday'=>'Πέμπτη', 'friday'=>'Παρασκευή', 'saturday'=>'Σάββατο', 'sunday'=>'Κυριακή');
		if ($program) {
			foreach ($day_of_week as $day=>$dayGreek) {
				echo "<tr>";
				echo "<td>".$dayGreek."</td>";
				foreach ($meal_hour as $hour) {
			// koitaw an exei eggrafh gia afth thn mera kai thn wra gevmatos
			// an exei eggrafh thn emfanizw, alliws aplws ektypwnw to keli
					echo "<td>";
					foreach ($program as $rs) {
						if ($rs->day == $day && $rs->hour == $hour) {
							
							echo '<div class= "row" id="mealInProgram">';
								echo '<div id="meal">';
									echo $rs->food;
								echo '</div>';
								if (isset($_SESSION['username'])) {
								echo '<div class = "feedback" id="'.$rs->id.'" style="display:none">';
								//echo '<button type="submit" id="completed-task" class="fabutton">'; 
      							
      								echo '<i  id="heart" value="'.$rs->id.'" class="fa fa-heart-o" ></i>';	
								//echo '</button>';
								
								echo '<i id = "thumbsDown" value = "'.$rs->id.'" class="fa fa-thumbs-down" ></i>';
								echo '<i id = "editText" class="fa fa-edit" ></i>';
								  echo '<div class="inputT" id="'.$rs->id.'" style="display:none">';
									//echo '<input type ="text'.$i.'", class="form-control">';

								  	echo '<div class="input-group">';
								 	 	echo '<input id="inputValue" class="form-control" type="text" placeholder="αξιολόγηση">';
								 		echo ' <div class="input-group-append">';

								  	 	echo '<span id = "sendMessage"class="input-group-text"><i class="fa fa-send fa-fw"></i></span>';
								  	echo '</div>';
								  echo '</div>' ;
								  echo '</div>';
								echo '</div>';
								}

								if (isset($_SESSION['dietitian_name'])) {
									$this->load->model('user_model');
									$meal_reaction = $this->user_model->check_reaction($rs->id);
									if ($meal_reaction) {
										if ($meal_reaction->reaction == 'like') {
											echo '<i  id = "heartd" value = "'.$rs->id.'" class="fa fa-heart-o" ></i>';	
										}else if($meal_reaction->reaction == 'dislike'){
										
											echo '<i  id = "disliked" value = "'.$rs->id.'" class="fa fa-thumbs-down" ></i>';	
										}
										if (!empty($meal_reaction->text)) {
											echo '<div style = "padding: 0px;" class="alert alert-info" role="alert">';
											echo $meal_reaction->text;
											echo '</div>';
										}
									}
								
									
								}
							echo '</div>';
							
					// nea grammh se periprwsh poy exoume panw apo ena faghto
					// gia ka8e wra gevmatos
							echo "<br>";
							$i++;
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
</div>

