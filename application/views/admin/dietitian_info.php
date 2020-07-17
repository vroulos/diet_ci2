<?php 
//var_dump($customers);
if(isset($customers)){
	foreach ($customers as $customer) {
	echo $customer->username.PHP_EOL;
}
}


 ?>