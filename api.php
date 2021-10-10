<?php 

session_start();

$data_raw = file_get_contents("php://input");
$data_myobj=json_decode($data_raw);


$info = (object)[];

//check if logged in
if (!isset($_SESSION['userid'])) {
	# code...
	if(isset($data_myobj->data_type) && $data_myobj->data_type != "login" && $data_myobj->data_type != "signup"){
	$info->logged_in = false;
	echo json_encode($info);
	die;
}
}

require_once("classes/autoload.php");

$DB = new Database();
//$data_raw = file_get_contents("php://input");
//$data_myobj=json_decode($data_raw);
$Error="";

//process the data
if(isset($data_myobj->data_type) && $data_myobj->data_type == "signup"){
	
	include("includes/signup.php");
}
elseif(isset($data_myobj->data_type) && $data_myobj->data_type == "login"){
	//echo "user_info";
	include("includes/login.php");
}
elseif(isset($data_myobj->data_type) && $data_myobj->data_type == "logout"){
	//echo "user_info";
	include("includes/logout.php");
}

elseif(isset($data_myobj->data_type) && $data_myobj->data_type == "user_info"){
	
	include("includes/user_info.php");
}
elseif(isset($data_myobj->data_type) && $data_myobj->data_type == "contacts"){
	
	include("includes/contacts.php");
}
elseif(isset($data_myobj->data_type) && ($data_myobj->data_type == "chats" || $data_myobj->data_type == "chats_refresh")){
	
	include("includes/chats.php");
}
elseif(isset($data_myobj->data_type) && $data_myobj->data_type == "settings"){
	
	include("includes/settings.php");
}
elseif(isset($data_myobj->data_type) && $data_myobj->data_type == "save_settings"){
	
	include("includes/save_settings.php");
}
elseif(isset($data_myobj->data_type) && $data_myobj->data_type == "send_message"){
	//send message
	include("includes/send_message.php");
	
}

elseif(isset($data_myobj->data_type) && $data_myobj->data_type == "delete_message"){
	//send message
	include("includes/delete_message.php");
	
}

elseif(isset($data_myobj->data_type) && $data_myobj->data_type == "delete_thread"){
	//send message
	include("includes/delete_thread.php");
	
}
function message_left($data,$row){

	$image = ($row->gender == "Male") ? "ui/profile/user_male.jpg" : "ui/profile/user_female.png" ;
			if(file_exists($row->image)){
				$image = $row->image;
			}
	$a = "
	<div id='message_left'>
				<div></div>
					<img id='prof_img' src='$image'>
					<br><b>$row->username</b><br>
					$data->message<br>";
					if($data->files != "" && file_exists($data->files)){
					
					$a .= "<img src='$data->files' style='width:100%;cursor:pointer;' onclick='image_show(event)'/><br>";
									}
					$a .= "<span style='font-size: 11px; color:white;'>".date("jS M Y H:i:s a",strtotime($data->date))."</span>
						<img id='trash' src = 'ui/icons/trash.png' onclick = 'delete_message(event)' msgid='$data->id' />
				</div>
				";

				return $a;

}

function message_right($data,$row){

	$image = ($row->gender == "Male") ? "ui/profile/user_male.jpg" : "ui/profile/user_female.png" ;
			if(file_exists($row->image)){
				$image = $row->image;
			}



	$a =  "
	<div id='message_right'>
				<div>";
				if($data->seen){
				$a .= "<img src='ui/icons/blue_tick.png' />";
			}
			elseif($data->received){

				$a .= "<img src='ui/icons/grey_tick.png' />";
			}

				$a .= "</div>
					<img id='prof_img' src='$image' style='float:right'>
					<br><b>$row->username</b><br>
					$data->message<br>";
					if($data->files != "" && file_exists($data->files)){
					
					$a .= "<img src='$data->files' style='width:100%; cursor:pointer;' onclick='image_show(event)'/><br>";
									}
					$a .= "<span style='font-size: 11px; color:#444;'>".date("jS M Y H:i:s a",strtotime($data->date))."</span>
						<img id='trash' src = 'ui/icons/trash.png' onclick = 'delete_message(event)' msgid='$data->id' />
				</div>
				";

				return $a;
}




function message_controls(){



	return "
	</div>
	<span style= 'color:#444;cursor:pointer;' onclick = 'delete_thread(event)'>Delete this thread</span>

				<div style='display:flex; width:100%;height:40px;'>
				<label for='message_file'><img src='ui/icons/attach_file.jpg' style='opacity:0.8;width:30px;margin:5px;cursor:pointer;'></label>
				<input type = 'file' name='file' id='message_file' style='display:none;' onchange='send_image(this.files)'/>
					<input type='text' id='message_text' onkeyup='enter_pressed(event)' style='flex:6;border:solid thin #ccc;border-bottom:none;font-size:14px;padding:4px;'  placeHolder='Type message here..' />
					<input type='button' style='flex:1;cursor:pointer;' value='send' onclick='send_message(event)' />
				</div>
				</div>
	";
}


?>

