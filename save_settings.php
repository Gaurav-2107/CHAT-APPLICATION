<?php
$info = (object)[];

//echo json_encode($data_myobj);
//die;

$data = false;
	$data['userid'] = $_SESSION['userid'];
	//echo $data['userid'];
	$data['username'] = $data_myobj->username;
	//echo $data['username'];
	if (empty($data_myobj->username)) {
		# code...
		$Error .= "Please enter the valid username . <br>";
	}
	else
	{
		if (strlen($data_myobj->username) <3) {
			# code...
			$Error .= "username must be atleast 3 characters long.....";
		}
		if (!preg_match("/^[a-z A-Z 0-9]*$/",$data_myobj->username )) {
			# code...
			$Error .= "Please enter the valid username....";
		}
	}
	$data['email'] =  $data_myobj->email;
	//echo $data['email'];
	if (empty($data_myobj->email)) {
		# code...
		$Error .= "Please enter the valid email . <br>";
	}
	else
	{
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$data_myobj->email )) {
			# code...
			$Error .= "Please enter the valid email....";
		}
	}

	$data['gender'] =  isset($data_myobj->gender) ? $data_myobj->gender : null;
	//echo $data['email'];
	if (empty($data_myobj->gender)) {
		# code...
		$Error .= "Please select a gender . <br>";
	}
	else
	{
		if ($data_myobj->gender != "Male" && $data_myobj->gender != "Female" ){
			# code...
			$Error .= "Please select a gender";
		}
	}


	$data['password'] =  $data_myobj->password;
	//echo $data['password'];
	$password=$data_myobj->password2;
	if (empty($data_myobj->password)) {
		# code...
		$Error .= "Please enter the valid password . <br>";
	}
	else
	{
		if ($data_myobj->password != $data_myobj->password2) {
			# code...
			$Error .= "Passwords must match..";
		}

		if (strlen($data_myobj->password)<8  ||  strlen($data_myobj->password)>15) {
			# code...
			$Error .= "Password contains minimum 8 characters and maximum 15 characters....";
		}
		
	}

	//echo $data['date'];

	if ($Error == "") {
		# code...


$query = "update users set username = :username ,email = :email,gender = :gender,password = :password where userid = :userid limit 1" ;
//echo $query;

$result = $DB-> write($query,$data);
if ($result) {
	# code...
		$info->message = "Data saved successfully";
		$info->data_type = "save_settings";
		echo json_encode($info);
}
else{
		$info->message = "Data not saved successfully";
		$info->data_type = "save_settings";
		echo json_encode($info);
}
}
else{

	$info->message =$Error;
	$info->data_type = "save_settings";
	echo json_encode($info);
}
?>