<?php 
echo form_open('dietitians/add_template'); ?>
<div class="container-fluid" style="margin-left: 100px; margin-top: 30px">
  <div class="row">
	<div class="col-sm-6 col-md-6 col-lg-4">
		<div class="form-group" style="width: 200px ">
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
		
		  <div class="form-group" style=" width: 200px ">
		    <label for="meal">Ώρα γεύματος</label>
		    <select class="form-control" id="mealtime" name="mealtime_category">
		      <option value="breakfast">Πρωινό</option>
		      <option value="brunch">Δεκατιανό</option>
		      <option value="lunch">Μεσημεριανό</option>
		      <option value="dinner">Βραδινό</option>
		    </select>
			</div>
		<div class="form-group" style=" width: 200px ">
			<label for="item">Γεύμα</label>
			<input type="text" name="food" class="form-control" placeholder="φαγητό" id="meal">

			
		</div>

		<button type="submit" name="submit_program" value="nothing" style="margin-top: 20px; margin-bottom: 20px; " class="btn btn-dark" >Υποβολή Γεύματος</button>
		
	<!-- 	<div class="form-group" style="margin-left: 50px; ">

			<?php //echo form_submit('submit_program', 'Υποβολή Γεύματος',  'class = "btn btn-dark"'); ?>
		</div>	
		 -->
		
	</div>
	<div class="col-sm-3 col-md-6">
		<div class="form-group" style=" width: 300px ">
			<label for="item">Όνομα προτύπου</label>
			<input type="text" name="template_name" class="form-control" placeholder="όνομα προτύπου" id="meal">
			<button type="submit" name="addTemplate" value="nothing" style="margin-top: 20px; margin-bottom: 20px;" class="btn btn-info" >Προσθήκη Προτύπου</button>
		</div>
		<div class="form-group" style=" width: 300px ">
			<label for="weekweek">Καταχωρημένα πρότυπα</label>
			<select  class="form-control" name="add_template">
				<?php 
				//$selected = $_SESSION['week'];
				$selected = $_SESSION['choosenTemplate'];
				if (isset($templates)) {
					echo 'the $template is running!!** ** **';
					
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

			<button type="submit" name="chooseTemplate" value="nothing" style="margin-top: 20px; margin-bottom: 20px;" class="btn btn-info" >Επιλογή Προτύπου</button>
			<?php 
				if (!isset($_SESSION['choosenTemplate'])) {
					echo '<div class="alert alert-danger" role="alert">';
					echo 'Επέλεξε πρότυπο!';
					echo '</div>';
				}
			 ?>	
     </div>
 </div>
 </div>
 
</div>

<?php echo form_close(); ?>


