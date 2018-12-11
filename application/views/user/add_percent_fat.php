<div class="row">
	<div class="col-md-1"></div>
	<?php echo form_open('User/add_percent_fat'); ?>
	<div class="form-group" >
		<label for="water">Ποστοστό λίπους</label>
		<input type="number" class="form-control" name="fat" id="1"  placeholder="%">
	</div>
	<input type="submit" name="addFat" value="Υποβολή" class="btn btn-secondary">
	<?php echo form_close(); ?>

	<?php echo validation_errors(); //display validation errors ?>

	<div class="col-md-6">
		<?php if(isset($weight)){ ?>
			<?php foreach ($weight as $row) { ?>
				<p>Τώρα είσαι <?php echo $row->weight; ?></p>
				<?php 
			}
		}?>
	</div>

	<div class="col-md-offset-10">
		
		<form action="<?php echo base_url('user/add_percent_fat') ?>" method = "post">
			<input type="submit" name="fatHistory" class="btn btn-primary" value="ιστορικό ποσοστού λίπους"/>
		</form>
	</div>

<div class="col-md-2">
		
	</div>
	<div>
		<div id="chart_div" class="col-md-6">
		</div>

		<?php if(isset($fatPercentageHistory)){ //if the $weight_history is set then run the chart ?>
		
			
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
				google.charts.load('current', {'packages':['corechart']});
				google.charts.setOnLoadCallback(drawChart);

				function drawChart() {
					var data = google.visualization.arrayToDataTable([
						['Χρονολογία', 'Βάρος'],
						<?php foreach ($fatPercentageHistory as $row) { ?>
							['<?php echo $row->date ?>',<?php echo $row->fat_percent ?>],
						<?php }  ?>
					]);

					var options = {
						title: 'δεδομένα σε %',
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
