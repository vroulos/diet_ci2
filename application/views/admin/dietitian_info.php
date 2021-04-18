
<div id="table-responsive" style="margin: 7vw;">
<table class="table">
	<thead>
		<th>Πελάτες</th>
	</thead>
<?php 
//var_dump($customers);

if(isset($customers)){
	foreach ($customers as $customer) { ?>
	<tr>
		<td><?php  echo $customer->username.PHP_EOL;?></td>
			
		</tr>
<?php  }
}?>


</table>
</div>
