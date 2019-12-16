
<?php 
echo form_open('dietitians/add_nutricion_program_v2'); ?>
<div class="container-fluid" style="width: 240px; margin-left: 140px; margin-top: 30px">



<div class="form-group">
	<label for="weekweek">Εβδομάδα</label>
	<select  class="form-control" name="week">
		<?php 
		$selected = $_SESSION['week'];
		if (isset($weeks)) {
			
			foreach ($weeks as $week) {
				if ($selected == $week->week) {
					echo '<option selected = "'.$selected.'" value ="'.$week->week.'" >'.$week->week.'</option> ';
				}else{
					echo '<option  value ="'.$week->week.'" >'.$week->week.'</option> ';
				}
				
				
			}
			
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
      <option value="lunch">Μεσημεριανό</option>
      <option value="dinner">Βραδινό</option>
    </select>
</div>
<div class="form-group">
	<label for="item">Γεύμα</label>
	<input type="text" name="food" class="form-control" placeholder="φαγητό" id="meal">
</div>
<button type="submit" name="addNewWeek" value="nothing" style="margin-top: 20px; margin-bottom: 20px;" class="btn btn-dark" >Προσθήκη Εβδομάδας</button>
<?php echo form_submit('submit_program', 'Υποβολή',  'class = "btn btn-dark"'); ?>







<p>Εβδομάδα <?php echo ""; ?></p>


</div>

