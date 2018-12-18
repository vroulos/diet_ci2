<html>
<head>
	<title>Upload Form</title>
</head>
<body>

	<div class="alert alert-success" role="alert">
		<h3 class="alert-heading">η Φωτογραφία ανέβηκε επιτυχώς!</h3>
		<hr>
		<ul>
			<?php foreach ($upload_data as $item => $value):?>
				<li><?php echo $item;?>: <?php echo $value;?></li>
			<?php endforeach; ?>
		</ul>
		<hr>
		<p class="mb-0"><?php echo anchor('upload', 'Ανέβασε άλλη φωτογραφία!' , 'class = "lead"', 'class="text-primary"'); ?></p>

	</div>
		<?php echo $upload_data['file_name']; ?>
</body>
</html>