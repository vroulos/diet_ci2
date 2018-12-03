
<?php echo form_open('User/add_weight'); ?>
  <div class="form-group" >
    <label for="water">Προσθήκη βάρους</label>
    <input type="number" class="form-control" name="weihgt" id="1"  placeholder="κενό">
  </div>
  <input type="submit" name="submit" value="Υποβολή" class="btn btn-secondary">

  <div>
  	<?php if(isset($weight)){ ?>
  	<?php foreach ($weight as $row) { ?>
  		<p>You are <?php echo $row->weight; ?></p>
  	<?php 
  	}
  }
  	 ?>
  	
  </div>
