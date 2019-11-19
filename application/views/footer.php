</body>
<footer class="footer bg-dark" style="float: left">
  <div class="container">
    <span class="text-muted">Διπλωματική εργασία</span>
  </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url('assets/jQuery/jQuery-3.4.1.js'); ?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/script.js') ?>"></script>

<!--  use a javascript approach, window.history.replaceState to prevent a resubmit on refresh and back button. In other words with this script the form is not submiting again -->
<script type="text/javascript">
	if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

</html>