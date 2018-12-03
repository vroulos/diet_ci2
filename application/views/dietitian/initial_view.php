<?php if (isset($_SESSION['customer_name'])){ ?>

<h1>Εχεις επιλέξει το πελάτη <?php echo $_SESSION['customer_name'] ?></h1>

<?php }else { ?>
	<h1>επέλεξε ένα πελάτη </h1>

	<?php } ?>