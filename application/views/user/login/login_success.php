<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<style type="text/css">
	a{
		color: black;
	}

	h3{
		
		font-family: Muli;
	}

</style>


<?php if (isset($_SESSION['username'])){ ?>
	<?php if(isset($data_is_inserted) and $data_is_inserted == false ){ ?>
	<div class="toast" data-autohide="false">
		<div class="toast-header">
			<strong class="mr-auto">Ειδοποίηση</strong>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
       		 </button>		
       	</div>
		<div class="toast-body">
			Δεν έχεις προσθέσει τα στοιχεία σου
		</div>
	</div>
<?php } ?>
<div>
	<h3>Καλως ήρθες <?php echo $_SESSION['username'] ?></h3>
</div>
<div style="width: 300px; ">
	<ul class="list-group">
  <li class="list-group-item" ><a href="<?= base_url('user/add_weight') ?>">Προσθήκη προσωπικών δεδομένων και εμφάνιση</a></li>
  <li class="list-group-item"><a href="<?php echo base_url('user/add_user_note') ?>">Προσωπικές σημειώσεις</a></li>
  <li class="list-group-item"><a href="<?php echo base_url('user/messages') ?>">Μηνύματα</a></li>
  <li class="list-group-item"><a href="<?php echo base_url('upload/') ?>">Ανέβασμα φωτογραφίας</a></li>
  <li class="list-group-item"><a href="<?php echo base_url('upload/display_images') ?>">Οι φωτογραφίες μου</a></li>
  <li class="list-group-item"><a href="<?=base_url('user/view_program')?>">Πρόγραμμα διατροφής</a>
</ul>
</div>

<?php }?>
</div><!-- .container -->

<script>
	$(document).ready(function(){
		$('.toast').toast('show');
	});
</script>