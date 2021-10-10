<?php
$info = (object)[];

$data = false;
	
	//validate info
	$data['email'] =  $data_myobj->email;
	
	//$data['password'] =  $data_myobj->password;
	if (empty($data_myobj->email)) {
		# code...
		$Error = "Please enter email";
	}
	if (empty($data_myobj->password)) {
		# code...
		$Error = "Please enter password";
	}
	
	if ($Error == "") {
		# code...


$query = "select * from users where email = :email limit 1";
//echo $query;

$result = $DB-> read($query,$data);
if (is_array($result)) {
	# code...

		$result = $result[0];

		if ($result->password == $data_myobj->password) {
			# code...
			$_SESSION['userid']= $result->userid;
			$info->message = "You're successfully logged in";
			$info->data_type = "info";
			echo json_encode($info);
		}
		else
		{
			$info->message = "Incorrect password";
			$info->data_type = "error";
			echo json_encode($info);
	}
}
else{
		$info->message = "Invalid username";
		$info->data_type = "error";
		echo json_encode($info);
}
}
else{

	$info->message =$Error;
	$info->data_type = "error";
	echo json_encode($info);
}


?>