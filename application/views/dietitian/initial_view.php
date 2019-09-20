
<?php if (isset($_SESSION['customer_name']) and (isset($_SESSION['dietitian_name']))){ ?>
<div>
	<h3>Εχεις επιλέξει το πελάτη <?php echo $_SESSION['customer_name'] ?></h3>
</div>

<?php }elseif (!isset($_SESSION['dietitian_name'])) {
	redirect('dietitians/logind','refresh');
}?>