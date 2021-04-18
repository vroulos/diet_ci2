<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if(isset($data_is_inserted) and $data_is_inserted == false ){ ?>
	<div class="container">
		<div class="row">
			<?php if (validation_errors()) : ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
						<?= validation_errors() ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if (isset($error)) : ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
						<?= $error ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="col-md-12">
				<div class="page-header">
					<h2 style="font-family: sans-serif;">Προσθήκη στοιχείων</h2>
				</div>
				<?= form_open() ?>
				<div class="form-group">
					<label for="username">Βάρος</label>
					<span class="input-group-addon">
					</span>
					<input type="number" min="0" class="form-control" placeholder="kg" id="weight" name="weight"  style="max-width: 230px">
				</div>
				<div class="form-group">
					<label for="password">Ύψος</label>
					<span class="input-group-addon">
<!--                         <i class="fa fa-unlock"></i>
-->                    </span>
<input type="number" min="0" class="form-control" placeholder="cm" id="height" name="height"  style="max-width: 230px" >
</div>
<div class="form-group">
	<label for="password">Φύλο</label>
	<select class="form-control" name="gender">
		<option>Άνδρας</option>
		<option>Γυναίκα</option>
	</select>
</div>
<div class="form-group">
	<label for="password">Ηλικία</label>
	<span class="input-group-addon">
	</span>
	<input type="number" min="0" class="form-control" id="age" placeholder="years" name="age"  style="max-width: 230px" >
<!-- 					<label class="form-check-label" for="exampleCheck1">Εμφάνιση κωδικού</label>
-->				</div>
<div class="form-group">
	<input type="submit" class="btn btn-info" value="Υποβολή" style="margin-top: 10px">
</div>
</form>
</div>
</div><!-- .row -->
</div><!-- .container -->
<?php } ?>

<?php if(isset($data_is_inserted) and $data_is_inserted == true and isset($my_data)){ ?>

<!-- 	<?php 
		echo "Τα στοιχεία σου έχουν εισαχθεί στην βάση επιτυχώς".PHP_EOL;
		echo "<br>";
		echo "Βάρος : ".$my_data->weight ;
		echo "<br>";
		echo "Φύλο : ". $my_data->gender;
		echo "<br>";
		echo "Ηλικία :". $my_data->age;
		echo "<br>";
		echo "Ύψος :". $my_data->height; ?> -->
		<?php 
		$weight = $my_data->weight;
		$height = $my_data->height;
		$heightInMeter = $height/100; 
		$bmi = $weight/($heightInMeter*$heightInMeter);
		$bmi = round($bmi, 2);
		?>
		<div class="container-fluid"> 
			<p>Βάρος: <?php echo $my_data->weight ?> kg</p>
			<p><?php echo "Φύλο : ". $my_data->gender; ?> </p>
			<p><?php echo "Ηλικία : ". $my_data->age; ?> χρονών</p>
			<p><?php echo "Ύψος : ". $my_data->height; ?> cm</p>
			<p><?php echo "BMI: ". $bmi  ." kg/m2 "?></p>

<!-- 			<a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Υπολογισμός Δείκτη μάζας σώματος</a>

			<div class="collapse multi-collapse" id="multiCollapseExample1">
				<form class="form-horizontal">
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label" for="formGroupInputLarge">Weight</label>

						<div class="col-sm-10">
							<input class="form-control" type="number" name="weight" id="weightInput" placeholder="Your weight in kilos">
						</div>
					</div>
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label" for="formGroupInputLarge">Height</label>

						<div class="col-sm-10">
							<input class="form-control" type="number" name="weight" id="heightInput"
							placeholder="Your height in meters">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="button" id="calculateBtn" class="btn btn-primary btn-block btn-lg active">Calculate</button>
						</div>
					</div>
				</form>
			</div>
				<div class="form-group">
 <div class="col-sm-offset-2 col-sm-10 text-center">
 <h3 id="bmi"></h3>
 </div>
 </div> -->
		</div>
	<?php } ?>

<!-- 	<script type="text/javascript">
		document.addEventListener("DOMContentLoaded", function() {

 var weightInput = document.getElementById("weightInput");
 var heightInput = document.getElementById("heightInput");
 var calculateBtn = document.getElementById("calculateBtn");
 var bmiElem = document.getElementById("bmi");

 calculateBtn.addEventListener("click", function(e) {
 var bmi = Number(weightInput.value) / Math.pow(Number(heightInput.value), 2);
 if (!bmi) return;
 //sbmi = Math.round(bmi * 100);
 var result = "";
 if (bmi >= 35) result = "Extremely Obese"
 else if (bmi >= 30) result = "Obese"
 else if (bmi >= 25) result = "Overweight"
 else if (bmi >= 18.5) result = "Normal weight"
 else result = "Underweight"

 bmiElem.innerHTML = "Your BMI is " + bmi + " kg/m<sup>2</sup> : <strong>" + result + "</strong>";
 });
});
	</script> -->


