<?php
$info = (object)[];

$data = false;
	
	//validate info
	$data['userid'] =  $_SESSION['userid'];
	
	//$data['password'] =  $data_myobj->password;
	
	
	if ($Error == "") {
		# code...


$query = "select * from users where userid = :userid limit 1";
//echo $query;

$result = $DB-> read($query,$data);
if (is_array($result)) {
	# code...

		$result = $result[0];
		$result->data_type = "user_info";
		//check if image exist
		$image = ($result->gender == "Male") ? "ui/profile/user_male.jpg" : "ui/profile/user_female.png" ;
			if(file_exists($result->image)){
				$image = $result->image;
			}
			$result->image = $image;
		echo json_encode($result);
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