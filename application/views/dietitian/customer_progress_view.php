
<div class="col-md-2">
	<div class="row1">
		<?php echo form_error('weight', '<div class="error">', '</div>'); ?>
		<p id="message"></p>
	</div>
</div>
<div>
	<div id="chart_div" class="col-md-6">
	</div>

	<?php if(isset($weight_history)){ //if the $weight_history is set then run the chart ?>
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