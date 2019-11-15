<html>
<head>
	<title>Upload Form</title>
</head>
<body>

	<div class="alert alert-success" role="alert" style="width: 1000px; margin: 200px">
		<h3 class="alert-heading">η Φωτογραφία ανέβηκε επιτυχώς!</h3>
		<hr>
		<ul>
			<?php
			if (isset($upload_data)) {
			 foreach ($upload_data as $item => $value):?>
				<li><?php echo $item;?>: <?php echo $value;?></li>
			<?php endforeach; ?>
		</ul>
		<hr>
		<p class="mb-0"><?php echo anchor('upload/do_upload', 'Ανέβασε άλλη φωτογραφία!' , 'class = "lead"', 'class="text-primary"'); ?></p>
		<?php echo $upload_data['file_name']; 
	}?>

	</div>
		
</body>
</html>