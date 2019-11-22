
<?php 
echo form_open('dietitians/add_nutricion_program_v2'); ?>
<div style="width: 240px; margin-left: 140px; margin-top: 30px">
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
<?php echo form_submit('submit_program', 'Υποβολή', 'class = "btn btn-dark"'); ?>

</div>
<p style="margin-left: 140px; margin-top: 20px">Εάν θες να βάλεις περισσότερες τροφές σε ένα γεύμα διαχώρισέ τες με κόμμα(,)</p>
