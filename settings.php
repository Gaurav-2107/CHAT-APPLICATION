	<?php 
	$id = $_SESSION['userid'];
	$sql = "select * from users where userid = :userid limit 1";
	$data = $DB->read($sql,['userid'=>$id]);
	$mydata="";
	if(is_array($data)){
		$data =$data[0];

		//check if image exits

		$image = ($data->gender == "Male") ? "ui/profile/user_male.jpg" : "ui/profile/user_female.png" ;
			if(file_exists($data->image)){
				$image = $data->image;
			}

			$gender_male="";
			$gender_female = "";

			if ($data->gender == "Male") {
				# code...
				$gender_male = "checked";
			}
			else{
				$gender_female = "checked";
			}
		
	$mydata = 
	'
	<style type="text/css">
		@keyframes appear{
		0%{opacity:0, transform : translateY(50px)}
		100%{opacity:1, transform : translateY(0px)}
	}
		form{
			text-align:left;
			margin: auto;
			padding: 10px;
			width: 100%;
			max-width: 400px;
		}
		input[type=text],input[type=email],input[type=password],input[type=button]{
			padding: 10px;
			margin: 10px;
			width: 200px;;
			border-radius: 5px;
			border: solid 1px grey;
		}
		input[type=button]{
			width: 220px;
			cursor: pointer;
			background-color: #2b5488;
			color: #ffffff;
		}
		input[type=button]:hover{
			opacity: 0.5;
			transition: 0.5s;
		}
		#error{
			text-align: center;
			padding: 0.5em;
			background-color: #ecaf91;
			color: white; 
			display: none;
		}

		.dragging{
			border: dashed 2px #aaa;
		}
		
	</style>
		<div id="error">error</div>
		<div style="display:flex;animation : appear 1s ease;">
		<div>
		<span style="font-size:11px;">drag and drop image to change</span><br>
			<img  ondragover = "handle_drag_and_drop(event)" ondrop = "handle_drag_and_drop(event)" ondragleave = "handle_drag_and_drop(event)" src ="'.$image.'" style="width:200px;height:200px;margin:10px;"/>
			<label for= "changeimage_input" id="changeimage_button" style="background-color:#9b9a80; display : inline-block;padding:1em;border-radius:5px; cursor:pointer;">
			Change Image
			</label>
			<input type="file" onchange="upload_profile_image(this.files)" id="changeimage_input" style="display:none;" >
			</div>
		<form id="myform">
			<table style="border: none;">
			<tr>
				<td>
			<input type="text" name="username"  placeholder="username" value="'.$data->username.'"><br>
		</td></tr>
		<tr><td>
			<input type="email" name="email"  placeholder="Enter email address" value="'.$data->email.'"><br>
		</td></tr>
		<tr><td>
			Gender :<br>
			<input type="radio" value="Male" name="gender" '.$gender_male.'>Male
			<input type="radio" value="Female" name="gender" '.$gender_female.'>Female
			<br>
		</td></tr>
		<tr><td>
			<input type="password" name="password" id="password" placeholder="enter password" value="'.$data->password.'"><br>
		</td></tr>
		<tr><td>
			<input type="password" name="password2" id="password2" placeholder="re-enter password" value="'.$data->password.'"><br>
		</td></tr>
		<tr><td>
			<input type="button" value="Save Settings" id="savesettings_button" onclick="collect_data(event)"><br>
		</td></tr>
		
		</table>

		</form>
		</div>
	
';
	
	$info->message = $mydata;
	$info->data_type = "settings";
	echo json_encode($info);
	

}else{

	$info->message ="No contacts were found";
	$info->data_type = "error";
	echo json_encode($info);
}
	 ?> 
	