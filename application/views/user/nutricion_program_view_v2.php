<?php //use \Datetime; ?>

<script>
$(document).ready(function() {
	
		
		$("#mealInProgram, #meal").click(function(event) {
			$(this).find(".feedback").show();
		});
		$(".feedback").find("#editText").click(function(event) {
			$(this).next().toggle();
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
						$("#success-alert").show();
					setTimeout(function() { 
						$("#success-alert").hide(); 
					}, 1000);
				}
			})
		});

		$(".feedback").find("#thumbsDown").click(function(event) {

			var $value = $(this).parent().find("#thumbsDown").attr("value");
			$.ajax({
				url: '<?php echo base_url('user/food_feedback') ?>',
				type: 'POST',
				
				data: {
					'reaction': 'dislike',
					'meal_id' : $value
				},
				success: function(msg){
					//$(this).parent().find("#inputT").show();
						$("#success-alert").show();
					setTimeout(function() { 
						$("#success-alert").hide(); 
					}, 1000);
				}

			})
			
		});

		$(".feedback").find("#sendMessage").click(function(event) {

				var $value =  $(this).parent().find("#sendMessage").attr("value");
				var $text = $(this).parentsUntil(".feedback").find("#inputValue").val();


			$.ajax({
				url: '<?php echo base_url('user/food_feedback') ?>',
				type: 'POST',
				
				data: {
					'textreaction': $text,
					'meal_id' : $value
				},
				success: function(msg){
					$("#success-alert").show();
					setTimeout(function() { 
						$("#success-alert").hide(); 
					}, 1000);
				}

			})
			
		});	
		
	
	});
	

</script>

<div class="container" style="margin-top: 90px; max-width: 90vw;">
	<div class="alert alert-success" id="success-alert" style="display:none"> Η αξιολόγηση στάλθηκε επιτυχώς</div>
	<div class="alert alert-success" id="success-feedback" style="display:none"> Η αξιολόγηση στάλθηκε επιτυχώς</div>
	<div class="row">
		<div class="alert alert-success" id="success-alert" style="display:none"> Success Message</div>
		
	
		
		<div style="margin: 10px">
			
		
	<?php if (isset($_SESSION['customer_name']) or isset($_SESSION['username'])) {

		if (isset($_SESSION['customer_name'])) {

			echo "<p>Πρόγραμμα διατροφής για τον πελάτη ". $_SESSION['customer_name'].". ";
		}
		
	
		if (isset($program) and !empty($program)) {
			foreach ($program as $value) {
			$date = $value->date;
			$date_object=date_create($date);
			$date_object_formated = date_format($date_object,"d-m-Y");

			date_add($date_object,date_interval_create_from_date_string("7 days"));
			$my_date_plus_one_week =  date_format($date_object,"d-m-Y");
		}
		echo "      Ημερομηνία από : ".$date_object_formated." έως : ". $my_date_plus_one_week;
		}
		echo "</div>";
	}

	if (isset($_SESSION['username'])) { 
		$user_id = $_SESSION['user_id'];
		$thisDate = $this->user_model->get_current_date($user_id);
	
		?>


		<div class="row" id = "directonalButtons">
			<?php echo form_open('user/view_program'); ?>
			<button type="submit" name="choosePreviousWeek" id="previousWeek" class="btn btn-info">
                    <i class="fa fa-chevron-left"></i> Προηγούμενη
                </button>
                <button type="submit" name="chooseNextWeek" id="nextWeek" class="btn btn-info">
                     Επόμενη<i class="fa fa-chevron-right"></i>
                </button>
		</div>
			<script type="text/javascript">
				$('.toast').toast('show');
			</script>

	
	<?php 

	form_close();  
		}
	 ?>
	 </div>

	 	<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 20px;">
			<div class="toast" style="position: absolute; top: 0; right: 0;">
				<div class="toast-header">
					<img src="..." class="rounded mr-2" alt="...">
					<strong class="mr-auto">Bootstrap</strong>
					<small>11 mins ago</small>
					<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="toast-body">
					Η εβδομάδα προστέθηκε.
				</div>
			</div>
		</div>
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
								echo '<div id="meal" >';
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

								  	echo '<div id="inputGroup" class="input-group">';
								 	 	echo '<input id="inputValue" class="form-control" type="text" placeholder="αξιολόγηση">';
								 		echo ' <div id="'.$rs->id.'" class="input-group-append">';

								  	 	echo '<span id = "sendMessage"class="input-group-text" value="'.$rs->id.'"><i  class="fa fa-send fa-fw"></i></span>';
								  	echo '</div>';
								  echo '</div>' ;
								  echo '</div>';
								echo '</div>';
								}

								if (isset($_SESSION['dietitian_name'])) {
									$this->load->model('user_model');
									//fetch the reaction for specific meal
									$meal_reaction = $this->user_model->check_reaction($rs->id);
									if ($meal_reaction) {
										if ($meal_reaction->reaction == 'like') {
											echo '<i  id = "heartd" value = "'.$rs->id.'" class="fa fa-heart-o" ></i>';	
										}else if($meal_reaction->reaction == 'dislike'){
											echo '<i  id = "disliked" value = "'.$rs->id.'" class="fa fa-thumbs-down" ></i>';	
										}
										if (!empty($meal_reaction->text_reaction)) {
											echo '<div style = "padding: 0px;" class="alert alert-info" role="alert">';
											echo $meal_reaction->text_reaction;
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
<!-- <p>
  <a class="btn btn-info" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="margin: 50px;">
    Επιπρόσθετες πληροφορίες
  </a>
  <button class="btn btn-primary" type="button"  data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="display: none;">
    Button with data-target
  </button>
</p> -->
<div class="collapse" id="collapseExample">
  <div class="card card-body">
   Το πρόγραμμα διατροφής του περιλαμβάνει 
  </div>
</div>
</div>

