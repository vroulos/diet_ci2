<div class="row">
	<div class="col-md-1"></div>
	<?php echo form_open('User/add_weight'); ?>
	<div class="form-group" >
		<label for="water">Προσθήκη βάρους</label>
		<input type="number" class="form-control" name="weight" id="1"  placeholder="κενό">
	</div>
	<input type="submit" name="addWeight" value="Υποβολή" class="btn btn-secondary">

	<div class="col-md-6">
		<?php if(isset($weight)){ ?>
			<?php foreach ($weight as $row) { ?>
				<p>Τώρα είσαι <?php echo $row->weight; ?></p>
				<?php 
			}
		}?>
	</div>

	<div class="col-md-offset-10">
		<form action="<?php echo base_url('user/add_weight') ?>" method = "post">
			<input type="submit" name="weightHistory" class="btn btn-primary" value="ιστορικό βάρους"/>
		</form>
	</div>

	<div class="col-md-2">
		<div class="row1">
			<?php echo form_error('weight', '<div class="error">', '</div>'); ?>
		</div>
	</div>
	<div>
		<div id="chart_div" class="col-md-6">
		</div>

		<?php if(isset($weight_history)){ //if the $weight_history is set then run the chart ?>

			<p> CHART IS RUNNING</p>
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
				google.charts.load('current', {'packages':['corechart']});
				google.charts.setOnLoadCallback(drawChart);

				function drawChart() {
					var data = google.visualization.arrayToDataTable([
						['Χρονολογία', 'Βάρος'],
						<?php foreach ($weight_history as $row) { ?>
							['<?php echo $row->date ?>',<?php echo $row->weight ?>],
						<?php }  ?>
					]);

					var options = {
						title: 'δεδομένα σε kg',
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