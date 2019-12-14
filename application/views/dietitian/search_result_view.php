<?php 

if (isset($search_result)) {
	if (empty($search_result)) {
		echo "Unfortunatly the user does not exists<br>";
	}
	foreach ($search_result as $key => $value) {
		echo "The email of  ". $value->dietitian_name . " is ".$value->dietitian_email."</br>";
	}
		
}

if (isset($user)) {
	if(empty($user)){
		echo "Ο χρήστης δεν υπάρχει";
	}
	foreach ($user as $customer) {
		echo $customer->username;
	}
}

 ?>