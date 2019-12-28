
<?php 
echo form_open('dietitians/add_nutricion_program_v2'); ?>
<div class="container-fluid" style="margin-left: 100px; margin-top: 30px">
	<div class="row">
		<div class="col-sm-6 col-md-6 col-lg-4" >
			<div class="form-group">
				
					<label for="weekweek">Εβδομάδα</label>
					<select  class="form-control" name="week">
						<?php 
						$selected = $_SESSION['week'];
						if (isset($weeks)) {
							foreach ($weeks as $week) {
								//get the date of this week and add 7 days and display them
								$date = $week->date;
								$date_object=date_create($date);
								$date_object_formated = date_format($date_object,"d/m");

								date_add($date_object,date_interval_create_from_date_string("7 days"));
								$my_date_plus_one_week =  date_format($date_object,"d/m/Y");


								if ($selected == $week->week) {

									echo '<option selected = "'.$selected.'" value ="'.$week->week.'" >'.$date_object_formated.' έως '.$my_date_plus_one_week.'</option> ';
								}else{
									echo '<option  value ="'.$week->week.'" >'.$date_object_formated.' έως '.$my_date_plus_one_week.'</option> ';
									echo "the else weeke is runnign ** ** *** ";

								}
								
								
							}
							
						}else {
							echo '<option selected = "1" value="1">1</option>';
						}
						
						 ?>
					</select>
				</div>	
				<div class="form-group">
					<label for="dayday">Ημέρα </label>
					<select class="form-control" name="day_of_week">
						<option value="monday">Δευτέρα</option>
						<option value="tuesday">Τρίτη</option>
						<option value="wednesday">Τετάρτη</option>
						<option value="thursday">Πέμπτη</option>
						<option value="friday">Παρασκευή</option>
						<option value="saturday">Σάββατο</option>
						<option value="sunday">Κυριακή</option>
					</select>
				</div>

				  <div class="form-group">
				    <label for="meal">Ώρα γεύματος</label>
				    <select class="form-control" id="mealtime" name="mealtime_category">
				      <option value="breakfast">Πρωινό</option>
				      <option value="brunch">Δεκατιανό</option>
				      <option value="lunch">Μεσημεριανό</option>
				      <option value="dinner">Βραδινό</option>
				    </select>
				</div>
				<div class="form-group">
					<label for="item">Γεύμα</label>
					<input type="text" name="food" class="form-control" placeholder="φαγητό" id="meal">
				</div>

				
				<button type="submit" name="submit_program" value="nothingSpecial" style="margin-top: 20px; margin-bottom: 20px;" class="btn btn-dark" >Υποβολή γεύματος</button>
			</div>
			<div class="col-sm-3 col-md-6" style="margin-top: 10px;">

			<button type="submit" name="addNewWeek" value="nothing" style="margin-top: 20px; margin-bottom: 20px;" class="btn btn-dark" >Προσθήκη Εβδομάδας</button>
			<button type="submit" name="chooseWeek" value="nothingSpecial" style="margin-top: 20px; margin-bottom: 20px;" class="btn btn-info" >Επιλογή Εβδομάδας</button>


			<div>
				
			
			<label for="weekweek">Επέλεξε ένα από τα καταχωρημένα πρότυπα</label>
			<select  class="form-control" name="load_template" style="width: 220px">
				<?php 
				
				$selected = $_SESSION['choosenTemplate'];
				if (isset($templates)) {
					
					
					foreach ($templates as $template) {
						if ($selected == $template->template_name) {
							echo '<option selected = "'.$selected.'" value ="'.$template->template_name.'" >'.$template->template_name.'</option> ';
						}else{
							echo '<option  value ="'.$template->template_name.'" >'.$template->template_name.'</option> ';
							echo "the else weeke is runnign ** ** *** ";
						}											
					}
					
				}else {
					echo '<option selected = "1" value="1">1</option>';
				}
				
				 ?>
			</select>

			<button type="submit" name="submitTemplate" value="nothing" style="margin-top: 20px; margin-bottom: 20px;" class="btn btn-warning" >Φόρτωμα Προτύπου</button>
			</div>
			</div>
		</div>
	</div>
	
</div>

<?php echo form_close(); ?>

