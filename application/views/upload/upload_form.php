<div class="container-fluid">

<script src="https://aframe.io/releases/1.0.0/aframe.min.js"></script>
<script src="https://raw.githack.com/jeromeetienne/AR.js/2.1.4/aframe/build/aframe-ar.js"></script>

<a-scene embedded arjs>
      <a-marker preset="hiro">
          <a-box position='0 0.5 0' material='color: yellow;'></a-box>
      </a-marker>
      <a-entity camera></a-entity>
    </a-scene>

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