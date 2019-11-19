<?php 

if (isset($search_result)) {
	if (empty($search_result)) {
		echo "Unfortunatly the user does not exists";
	}
	foreach ($search_result as $key => $value) {
		echo "The email of  ". $value->dietitian_name . " is ".$value->dietitian_email."</br>";
	}
		
}

 ?>