<style type="text/css">
/*css style */
img {
	filter: gray; /* IE6-9 */
	-webkit-filter: grayscale(1); /* Google Chrome, Safari 6+ & Opera 15+ */
	-webkit-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
	-moz-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
	box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
	margin-bottom:20px;
	margin-top: 40px;
	width: 500px;
	height: 300px;
}
img:hover {
	filter: none; /* IE6-9 */
	-webkit-filter: grayscale(0); /* Google Chrome, Safari 6+ & Opera 15+ */
	}
	.images{
		margin: 30px;
	}
</style>

<?php 
//The Directory Helper file contains functions that assist in working with directories.
$this->load->helper('directory'); //load directory helper
$user_id = $_SESSION['user_id']; ?>

<div class="images">
	<div class="row">
		<?php  foreach ($map as $k) { ?>

			<img class="col-md-4 col-sm-4 col-xs-6" class="img-responsive" src="<?php echo base_url($dir.'/'.$k);?>" >

		<?php }	?> 
	</div>
</div> 

<div>
		<img src="<?php echo base_url('upload/get_image?Fast-food.jpg') ?>" />
	<img src="<?php echo base_url();?>upload/get_image/Fast-food.jpg" />

</div>
