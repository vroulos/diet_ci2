<?php if (isset($_SESSION['customer_name'])){ ?>

<h1>Εχεις επιλέξει το πελάτη <?php echo $_SESSION['customer_name'] ?></h1>

<?php }else { ?>
	<?php redirect('dietitians/logind','refresh') ?>

	<?php } ?>