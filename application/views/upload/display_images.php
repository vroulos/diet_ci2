<style type="text/css">
	#imageId{
		margin-left: 300px;
	}
</style>
<?php 
//The Directory Helper file contains functions that assist in working with directories.
$this->load->helper('directory'); //load directory helper
$user_id = $_SESSION['user_id']; ?>

<!-- <div class="images" >
	
	<?php   if(isset($map)){
		  		foreach ($map as $k) { ?>

					<img class="col-md-4 col-sm-4 col-xs-6" class="img-responsive" src="<?php echo base_url($dir.'/'.$k);?>" id = "imageId">
					<?php echo $k; ?>
					<button type="submit" class="btn btn-dark" value="'.$k'." name="image_name" id="buttonId" >delete</button>

	<?php }
			}?> 
	
</div> -->

<div class="images" style="margin: ">
	
	<?php   if(isset($map) and $map != null){
			$i = 0;
		  		foreach ($map as $k) { 

		  			?>

					<img class="col-md-4 col-sm-4 col-xs-6" class="img-responsive" src="<?php echo base_url($dir.'/'.$k);?>" id = "<?php echo $i ?>">
				<!-- 	<script>
						$("#<?php echo $i ?>").on("click", function() {
						   $('#imagepreview').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
						   $('#<?php echo "imagemodal".$i; ?>').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
						});	 
					</script> -->
					<button type="submit"  class="btn btn-dark" value="'.$k'." name="<?php echo $k; ?>" id="<?php echo $i; ?>" >delete</button>	

						<!-- Creates the bootstrap modal where the image will appear -->
	<!-- 				<div class="modal fade" id="<?php echo "imagemodal".$i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					        <h4 class="modal-title" id="myModalLabel">Image preview</h4>
					      </div>
					      <div class="modal-body">
					        <img src="<?php echo base_url($dir.'/'.$k);?>" id="imagepreview" style="width: 400px; height: 264px;" >
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
					    </div>
					  </div>
					</div>	 -->			
	<?php 
			$i++;}
			}?> 

	<!-- Creates the bootstrap modal where the image will appear -->
	<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Image preview</h4>
	      </div>
	      <div class="modal-body">
	        <img src="" id="imagepreview" style="width: 400px; height: 264px;" >
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>		
	
</div>

<div class="container-fluid" >
<!-- here is the upload image  -->
<p class="font-weight-bold" style="margin-top: 70px" >Επέλεξε μία φωτογραφία και μετά ανέβασέ την</p>

<?php if (isset($error)) {
	 
	echo "<p style='color: red'>". $error."</p>"; //display the errors if the file doesnt uploaded -->  
}
 ?>

<?php echo form_open_multipart('upload/do_upload'); //File uploads require a multipart form ?>

<input type="file" name="userfile" size="20" class="form-control-file"  />

<br /><br />

<input type="submit" id="uploadPhoto" value="upload" class="btn btn-dark" />

</form>
</div>

<!-- here is the success print -->
	<?php if (isset($upload_data)) { ?>
	<div class="alert alert-success" role="alert">
		<h3 class="alert-heading">η Φωτογραφία ανέβηκε επιτυχώς!</h3>
		<hr>
		<ul>
			<?php foreach ($upload_data as $item => $value):?>
				<li><?php echo $item;?>: <?php echo $value;?></li>
			<?php endforeach; ?>
		</ul>
		<hr>

		<p class="mb-0"><?php echo anchor('do_upload', 'Ανέβασε άλλη φωτογραφία!' , 'class = "lead"', 'class="text-primary"'); ?></p>

	</div> 

		<?php echo $upload_data['file_name']; 

	}?>
</div> 
</body>
</html>

<script>

	$(".images").find(".btn").click(function(event) {
		var image_name = $(this).attr('name');
		console.log(image_name);
		

	var path = "uploads/images/<?php echo $user_id ?>/"+image_name;
	var action = "remove_file";
	console.log(path);


	if (confirm("Είσαι σίγουρος;")) {
	 	$.ajax({
	 		url: "<?php echo base_url();?>upload/delete_image",
	 		type: 'post',	
	 		data: {path: path, action : action},
	 		success: function(textStatus, status){
	 			console.log(textStatus);
	 			console.log(status);
	 			window.location.reload();

	 		},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
     			alert("some error");
     			console.log(XMLHttpRequest.responseText);
   				console.log(XMLHttpRequest.status);
 			}
	 	
	 });
	}
});
	 



</script>


