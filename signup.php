<?php
$info = (object)[];

$data = false;
	$data['userid'] = $DB->generate_id(20);
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
			$Error .= "username must be atleast 3 characters long.....<br>";
		}
		if (!preg_match("/^[a-z A-Z]*$/",$data_myobj->username )) {
			# code...
			$Error .= "Please enter the valid username....<br>";
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
			$Error .= "Please select a gender<br>";
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
			$Error .= "Passwords must match..<br>";
		}

		if (strlen($data_myobj->password)<8  ||  strlen($data_myobj->password)>15) {
			# code...
			$Error .= "Password contains minimum 8 characters and maximum 15 characters....<br>";
		}
		
	}

	$data['date']=date("Y-m-d H:i:s");
	//echo $data['date'];

	if ($Error == "") {
		# code...


$query = "insert into users (userid,username,email,gender,password,date) values (:userid,:username,:email,:gender,:password,:date)";
//echo $query;

$result = $DB-> write($query,$data);
if ($result) {
	# code...
		$info->message = "Data Enter successfully";
		$info->data_type = "info";
		echo json_encode($info);
}
else{
		$info->message = "Data not entered successfully";
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