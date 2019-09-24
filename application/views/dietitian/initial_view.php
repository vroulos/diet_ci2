<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script  src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<?php if (isset($_SESSION['customer_name']) and (isset($_SESSION['dietitian_name']))){ ?>
<div>
	<h3>Εχεις επιλέξει το πελάτη <?php echo $_SESSION['customer_name'] ?></h3>
</div>

<?php }elseif (!isset($_SESSION['dietitian_name'])) {
	redirect('dietitians/logind','refresh');
}?>



