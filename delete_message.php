	<?php 
	$arr['rowid']="null";

	if (isset($data_myobj->find->rowid)) {
		# code...
		$arr['rowid'] = $data_myobj->find->rowid;
	}

	

	$sql = "select * from messages where id = :rowid limit 1";
	$result = $DB->read($sql,$arr);

	if (is_array($result)) {
		# code...
		$row = $result[0];
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

	
	 ?> 
	