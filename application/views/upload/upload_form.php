<div class="container-fluid">
<p class="font-weight-bold" style="margin-top: 70px" >Επέλεξε μία φωτογραφία και μετά ανέβασέ την</p>

<?php echo $error; //display the errors if the file doesnt uploaded?>

<?php echo form_open_multipart('upload/do_upload'); //File uploads require a multipart form ?>

<input type="file" name="userfile" size="20" class="form-control-file" />

<br /><br />

<input type="submit" value="upload" class="btn btn-dark" />

</form>
</div>


</body>
</html>