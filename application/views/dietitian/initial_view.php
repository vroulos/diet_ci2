
<?php if (isset($_SESSION['customer_name'])){ ?>
<div>
	<h3>Εχεις επιλέξει το πελάτη <?php echo $_SESSION['customer_name'] ?></h3>
</div>


<?php }else { ?>
	<?php redirect('dietitians/logind','refresh') ?>

	<?php } ?>