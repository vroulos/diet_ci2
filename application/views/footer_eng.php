</body>
<footer class="footer bg-dark" style="float: left">
  <div class="container">
    <span class="text-muted">vroulos michail &copy; 2019-<?php echo date("Y"); ?></span>
  </div>
  

</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url('assets/jQuery/jQuery-3.5.1.js'); ?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.js'); ?>"></script>

<!-- jBox is a jQuery plugin that makes it easy to create
customizable tooltips, modal windows, image galleries and more-->
<script src="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.0/dist/jBox.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.0/dist/jBox.all.min.css" rel="stylesheet">

<script type="text/javascript" src="<?php echo base_url('assets/js/script.js') ?>"></script>

<!--  use a javascript approach, window.history.replaceState to prevent a resubmit on refresh and back button. In other words with this script the form is not submiting again -->
<script type="text/javascript">
	if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

</html>