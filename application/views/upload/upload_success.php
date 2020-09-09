<html>
<head>
	<title>Upload Form</title>
</head>
<body>
<div class="container-fluid">
	

	<div class="alert alert-success" role="alert" style="max-width: 1000px; ">

		<h3 class="alert-heading">η Φωτογραφία ανέβηκε επιτυχώς!</h3>
		<a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Πληροφορίες εικόνας</a>
		<hr>
		<div class="row">
			<div class="col">
				<div class="collapse multi-collapse" id="multiCollapseExample1">
					<div class="card card-body">
						<ul>
						<?php
						if (isset($upload_data)) {
						 foreach ($upload_data as $item => $value):?>
							<li><?php echo $item;?>: <?php echo $value;?></li>
						<?php endforeach; ?>
						</ul>
					</div>
				</div>
				
							<p class="mb-0"><?php echo anchor('upload/do_upload', 'Ανέβασε άλλη φωτογραφία!' , 'class = "lead"', 'class="text-primary"'); ?></p>
		<?php echo $upload_data['file_name']; 
	}?>
				</div>
		
	

	</div>
</div>
</div>	
		
</body>
</html>