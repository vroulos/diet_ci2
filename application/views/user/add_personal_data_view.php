<!-- this div is for weight -->
<div class="row">
	<div class="col-md-1" style="margin-left: 100px">
		<!-- this form adds the weitght and displays it -->
		<?php echo form_open('User/add_weight'); ?>
		<div class="form-group" >
			<label for="water">Προσθήκη βάρους</label>
			<input type="number" class="form-control" name="weight" id="1"  placeholder="κενό">
		</div>
		<input type="submit" name="addWeight" value="Υποβολή" class="btn btn-secondary" style=" margin-bottom: 10px">

		<div class="col-md-6">
	
		</div>

		<div class="col-md-offset-10">

			<form action="<?php echo base_url('user/add_weight') ?>" method = "post">
				<input type="submit" name="weightHistory" class="btn btn-primary" value="ιστορικό βάρους"/>
			</form>
		</div>

		<!-- this form adds the percetage of fat and diplays it on demand -->
		<?php echo form_open('User/add_percent_fat'); ?>
		<div class="form-group" >
			<label for="water">Ποστοστό λίπους</label>
			<input type="number" class="form-control" name="fat" id="1"  placeholder="%">

			<input type="submit" name="addFat" value="Υποβολή" class="btn btn-secondary">
			<form action="<?php echo base_url('user/add_percent_fat') ?>" method = "post">
				<input type="submit" name="fatHistory" class="btn btn-primary" value="ιστορικό ποσοστού λίπους" style="margin-top: 20px" />
			</form>	
		</div>

		<?php echo form_close(); ?>

		<!-- this div is for waistline measurement .Give your numbers and displays  -->
		<?php echo form_open('User/add_waistline'); ?>
		<div class="form-group">
			<label for="water">Περιφέρεια μέσης</label>
			<input type="number" class="form-control" name="waistline" id="cm"  placeholder="cm">
			<input type="submit" name="addWaistline" value="Υποβολή" class="btn btn-secondary" style="margin-top: 10px; margin-bottom: 10px">
			<?php echo form_close(); ?>

			<div class="col-md-offset-10">

				<form action="<?php echo base_url('user/add_waistline') ?>" method = "post">
					<input type="submit" name="waistlineHistory" class="btn btn-primary" value="ιστορικό περιφέρειας μέσης"/>
				</form>
			</div>
		</div>
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



	<!-- this div is for fat percentage -->
	<div class="row">
		<div class="col-md-6">


			<?php echo validation_errors(); //display validation errors ?>

			<div class="col-md-6">
		

			</div>
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
							['Χρονολογία', 'Ποστοστό λίπους'],
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


	<div class="row">
		<div class="col-md-1"></div>

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
</div>
