<div class="row">
	<div class="col-md-1"></div>
	<?php echo form_open('User/add_waistline'); ?>
	<div class="form-group">
		<label for="water">Περιφέρεια μέσης</label>
		<input type="number" class="form-control" name="waistline" id="cm"  placeholder="cm">
			<input type="submit" name="addWaistline" value="Υποβολή" class="btn btn-secondary">
	<?php echo form_close(); ?>

<div class="col-md-offset-10">
		
		<form action="<?php echo base_url('user/add_waistline') ?>" method = "post">
			<input type="submit" name="waistlineHistory" class="btn btn-primary" value="ιστορικό περιφέρειας μέσης"/>
		</form>
	</div>

<div class="col-md-2">
		<div class="row1">
			<?php echo validation_errors(); //display validation errors ?>
		</div>
	</div>
	<div>
		<div id="chart_div" class="col-md-6">
		</div>
		
		<?php if(isset($waistlineValues)){ //if the $weight_history is set then run the chart ?>
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
				google.charts.load('current', {'packages':['corechart']});
				google.charts.setOnLoadCallback(drawChart);

				function drawChart() {
					var data = google.visualization.arrayToDataTable([
						['Χρονολογία', 'Περιφέρεια'],
						<?php foreach ($waistlineValues as $row) { ?>
							['<?php echo $row->date ?>',<?php echo $row->user_waistline ?>],
						<?php }  ?>
					]);

					var options = {
						title: 'δεδομένα σε cm',
						curveType: 'function',
						legend: { position: 'bottom' }
					};

					var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
					chart.draw(data, options);
				}
			</script>
			<div id="curve_chart" style="width: 900px; height: 500px"></div>
		<?php } //end if of isset ?>
	</div>
</div>
		
	</div>
</div>

