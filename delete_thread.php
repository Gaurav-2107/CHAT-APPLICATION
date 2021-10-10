	<?php 
	$arr['userid']="null";

	if (isset($data_myobj->find->userid)) {
		# code...
		$arr['userid'] = $data_myobj->find->userid;
	}

	$arr['sender'] = $_SESSION['userid'];
	$arr['receiver'] = $arr['userid'];

	$sql = "select * from messages where (sender = :sender && receiver = :receiver) || (receiver = :sender && sender = :receiver) ";
				
	$result = $DB->read($sql,$arr);

	if (is_array($result)) {
		# code...
		foreach ($result as $row) 
		{
			# code...
		
		if ($_SESSION['userid'] == $row->sender ) {
			# code...
			$sql = "update messages set deleted_sender = 1 where id = '$row->id' limit 1";
			$DB->write($sql);


		}
		if ($_SESSION['userid'] == $row->receiver ) {
			# code...
			$sql = "update messages set deleted_receiver = 1 where id = '$row->id' limit 1";
			$DB->write($sql);

			

			
		}
	}
	}

	
	 ?> 
	