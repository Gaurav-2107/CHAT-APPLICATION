<?php 

if (isset($_SESSION['userid'])) {
	# code...
	unset($_SESSION['userid']);
}

$info->logged_in=false;
echo json_encode($info);
 ?>