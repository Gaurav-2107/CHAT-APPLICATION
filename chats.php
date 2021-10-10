	<?php 
	$arr['userid']="null";

	if (isset($data_myobj->find->userid)) {
		# code...
		$arr['userid'] = $data_myobj->find->userid;
	}

	$refresh = false;
	$seen = false;
	if ($data_myobj->data_type == "chats_refresh") {
		# code...
		$refresh = true;
		$seen = $data_myobj->find->seen;
	}

	$sql = "select * from users where userid = :userid limit 1";
	$result = $DB->read($sql,$arr);

	if (is_array($result)) {
		# code...
		//user found
	$row = $result[0];
	$image = ($row->gender == "Male") ? "ui/profile/user_male.jpg" : "ui/profile/user_female.png" ;
			if(file_exists($row->image)){
				$image = $row->image;
			}
			$row->image = $image;

			$mydata = "";

			if(!$refresh){
			$mydata =
				"Now chatting with:<br>
				<div id='active_contact'>
					<img src='$image'>
					$row->username
				</div>";
			}

			$messages = "";
			$new_message = false;

			if(!$refresh)
			{
				$messages ="
				<div id='message_holder_parent' onclick = 'set_seen(event)' style='height:630px;'>
				<div id='message_holder' style='height:480px;overflow-y:scroll;'>";
			}

				//read from db
				$arr2 = false;
				$a['sender'] = $_SESSION['userid'];
				$a['receiver'] = $arr['userid'];
				$sql = "select * from messages where (sender = :sender && receiver = :receiver && deleted_sender = 0) || (receiver = :sender && sender = :receiver  && deleted_receiver = 0) order by id desc limit 10";
				$result2 = $DB->read($sql,$a);

	if (is_array($result2)) {
		# code...
		$result2 = array_reverse($result2);
		foreach ($result2 as $data) {
			
			$myuser = $DB->get_user($data->sender);
			//check for new message
			if($data->receiver == $_SESSION['userid'] && $data->received == 0){
				$new_message = true;
			}

			if($data->receiver == $_SESSION['userid']  && $data->received == 1 && $seen){
				$DB->write("update messages set seen = 1 where id = '$data->id' limit 1");
			}

			if($data->receiver == $_SESSION['userid']){
				$DB->write("update messages set received = 1 where id = '$data->id' limit 1");
			}


			if($_SESSION['userid'] == $data->sender){
				$messages .=message_right($data,$myuser);
			}else{
				$messages .=message_left($data,$myuser);	
			}
			
		}

	}

				if(!$refresh){

				$messages .= message_controls();
			}


	$info->user= $mydata;
	$info->messages = $messages;
	$info->new_message = $new_message;
	$info->data_type = "chats";
	if ($refresh) {
		# code...
		$info->data_type = "chats_refresh";
		
	}
	echo json_encode($info);
	

	}
	else
	{
		$arr2 = false;
				$a['userid'] = $_SESSION['userid'];
			
				$sql = "select * from messages where (sender = :userid || receiver = :userid) group by msgid  order by id desc  ";
				$result2 = $DB->read($sql,$a);

				$mydata =
				"Previous chat:<br>";

	if (is_array($result2)) {
		# code...
		$result2 = array_reverse($result2);
		foreach ($result2 as $data) {
			# code...
			$other_user = $data->sender;
			if($data->sender == $_SESSION['userid']){
				$other_user = $data->receiver;
			}
			$myuser = $DB->get_user($other_user);

			$image = ($myuser->gender == "Male") ? "ui/profile/user_male.jpg" : "ui/profile/user_female.png" ;
			if(file_exists($myuser->image)){
				$image = $myuser->image;
			}
			//$image = $myuser->image;
			

			$mydata .=
				"
				
				<div id='active_contact' userid='$myuser->userid' onclick='start_chat(event)' style='cursor:pointer'>
					<img src='$image'>
					$myuser->username<br>
					<sapn style='font-size:11px;'>'$data->message'</span>
				</div>";
			
		}

	}

		$info->user= $mydata;
	$info->messages = "";
	$info->data_type = "chats";
	
	echo json_encode($info);
}

	


	 ?> 
	