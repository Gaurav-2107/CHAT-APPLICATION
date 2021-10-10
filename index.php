<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

	<style type="text/css">
		@font-face{
			font-family: "Brush Script MT","Lucida Handwriting",cursive;
		}
		#wrapper{
			max-width: 900px;
			min-height: 500px;
			max-height: 630px;
			display: flex;
			margin: auto;
			color: white;
			font-family: "Brush Script MT","Lucida Handwriting",cursive;

			font-size: 13px;
		}
		#left-panel{
			min-height: 500px;
			background-color: #27344b;
			flex: 1;
			text-align: center;

		}
		#left-panel img{
			width: 50%;
			border: solid thin #ffffff55;
			border-radius: 50%;
			margin: 10px;
			
		}
		#left-panel label{
			width: 100%;
			height: 20px;
			display: block;
			background-color: #404b56;
			border-bottom: solid thin white;
			cursor: pointer;
			padding: 10px;
			transition: all 1s ease;
		}
		#right-panel{
			min-height: 500px;
			flex:4;
			text-align: center;
		}
		#header{
			background-color: #485b6c;
			height: 70px;
			font-size: 40px;
			text-align: center;
			font-family: "Brush Script MT","Lucida Handwriting",cursive;
			position: relative;
		}
		#inner-left-panel{
			background-color: #383e48;
			flex: 1;
			min-height: 430px;
			max-height: 530px;
		}

		#inner-right-panel{
			background-color: #f2f7f8;
			flex: 2;
			min-height: 430px;
			transition: all 2s ease;
			max-height: 530px;
		}
		
		#left-panel label img{
			
			float: right;
			width: 10px;

		}
		#left-panel label:hover{
			background-color: #778593;
		}
		
		#radio-contacts:checked ~ #inner-right-panel{
			flex: 0;
		}

		#radio-settings:checked ~ #inner-right-panel{
			flex: 0;
		}

		#contact{
			width: 100px;
			height: 120px;
			margin: 10px;
			display: inline-block;
			vertical-align: top;
			
		}

		#contact img{
			width: 100px;
			height: 100px;
		}

		.loader_on{
			position: absolute;
			width: 30%;
		}

		.loader_off{
			display: none;
		}

		#profile_image{
			width: 50%;
			border: solid thin white;
			border-radius: 50%;
			margin: 10px;
		}

		#active_contact{
			height: 70px;
			margin: 10px;
			border: solid thin #aaa;
			padding: 2px;
			background-color: #eee;
			color: #444;
			border-radius: 5px;
		}

		#active_contact img{
			width: 70px;
			height: 70px;
			float: left;
			margin: 2px;
			border-radius: 5px;
			
		}

		#message_left{
			
			margin: 10px;
			float: left;
			padding-right: 10px;
			padding: 2px;
			background-color: #c979d5;
			color: white;
			box-shadow: 0px 0px 10px #aaa;
			border-bottom-left-radius :50%;
			border-top-right-radius: 30%;
			position: relative;
			width: 60%;
			min-width: 200px;
		}

		#message_left #prof_img{
			width: 60px;
			height: 60px;
			float: left;
			margin: 2px;
			border-radius: 50%;
			border : solid 2px white ;
		}

		#message_left div{
			width: 20px;
			height: 20px;
			border-radius: 50%;
			background-color: #34474f;
			border : solid 2px white ;
			position: absolute;
			left: -10px;
			top: 20px;
		}

		#message_right{
			
			margin: 10px;
			float: right;
			padding-right: 10px;
			padding: 2px;
			background-color: #fbffee;
			color: #444;
			box-shadow: 0px 0px 10px #aaa;
			border-bottom-right-radius :50%;
			border-top-left-radius: 30%;
			position: relative;
			width: 60%;
			min-width: 200px;
			
		}

		#message_right #prof_img{
			width: 60px;
			height: 60px;
			float: left;
			margin: 2px;
			border-radius: 50%;
			border : solid 2px white ;
		}

		#message_right div{
			width: 20px;
			height: 20px;
			border-radius: 50%;
			background-color: #34474f;
			border : solid 2px white ;
			position: absolute;
			right: -10px;
			top: 20px;
		}

			#message_right div img{
			width: 25px;
			height: 18px;
			float: none;
			margin: 2px;
			border-radius: 50%;
			border : none ;
			position: absolute;
			top: 30px;
			right: 10px;
		}

		#message_right #trash{
			width: 20px;
			height: 20px;
			border-radius: 50%;
			position: absolute;
			top: 15px;
			left:  -10px;
			cursor: pointer;
		}

		#message_left #trash{
			width: 20px;
			height: 20px;
			border-radius: 50%;
			position: absolute;
			top: 15px;
			right: -10px;
			cursor: pointer;
		}

		input[type=button]{
			padding: 2px;
			margin: 2px;
			width: 98%;
			border-radius: 5px;
			border: solid 1px grey;
		}
		input[type=button]{
			width: 100%;
			cursor: pointer;
			background-color: #2b5488;
			color: #ffffff;
		}
		input[type=button]:hover{
			opacity: 0.8;
			transition: 0.5s;
		}

		.image_on{
			position: absolute;
			height: 500px;
			width: 500px;
			margin: auto;
			z-index: 10;
			top: 50px;
			left: 50px;

		}

		.image_off{
			display: none;
		}


	</style>
</head>
<body>
	<div id="wrapper">
		<div id="left-panel">
			<div id="user_info" style="padding: 10px;">
			<img id="profile_image" src="ui/profile/user5.png" style="height: 100px;width: 100px;">
			<br>
			<span id="username">Username</span>
			<br>
			<span  id="email" style="font-size: 12px;opacity: 0.5;">useremail@gmail.com</span>
			<br>
			<br>
			<br>
			<div>
			<label id="label_chat" for="radio-chat">Chat <img src="ui/icons/chat.png"></label>
			<label id="label_contacts" for="radio-contacts">Contacts <img src="ui/icons/contact.png"></label>
			<label id="label_settings" for="radio-settings">Settings <img src="ui/icons/settings.png"></label>
			<label id="logout" for="radio-logout">Logout <img src="ui/icons/logout.png"></label>
		</div>


		</div>
		
		</div>
		<div id="right-panel">
			<div id="header">
				<div id="loader_holder" class="loader_on"><img style="width: 70px;" src="ui/icons/loading.gif"></div>
				<div id="image_viewer" class="image_off" onclick="close_image(event)"></div>
				MY CHAT
			</div>
			<div id="container" style="display: flex;">
				
				<div id="inner-left-panel">
					
				</div>
				<input type="radio" id="radio-chat" name="b1" style="display: none;">
					<input type="radio" id="radio-contacts" name="b1" style="display: none;">
					<input type="radio" id="radio-settings" name="b1" style="display: none;">
				<div id="inner-right-panel">
					
				</div>
			</div>
		</div>
	</div>

</body>
</html>
<script type="text/javascript">
	var sent_audio = new Audio("sound/hangouts_message.ogg");
	var received_audio = new Audio("sound/hangouts_message.ogg");
	var CURRENT_CHAT_USER = "";
	var SEEN_STATUS = false;

	function _(element){
		return document.getElementById(element);
	}
	var label_contacts = _("label_contacts");
	label_contacts.addEventListener("click",get_contacts);

	var label_chat = _("label_chat");
	label_chat.addEventListener("click",get_chats);

	var label_settings = _("label_settings");
	label_settings.addEventListener("click",get_settings);


	var logout = _("logout");
	logout.addEventListener("click",logout_user);


	function get_data(find,type){
		var xml = new XMLHttpRequest();
		var loader_holder = _("loader_holder");
		loader_holder.className = "loader_on";
		xml.onload = function(){

			if(xml.readyState == 4 || xml.status == 200){
				//alert(xml.responseText);
				loader_holder.className = "loader_off";
				handle_result(xml.responseText, type);
			}

		}

		var data = {};
		data.find = find;
		data.data_type = type;
		data = JSON.stringify(data);

		xml.open("POST","api.php",true);
		xml.send(data);
	}

	function handle_result(result,type){
		//alert(result);
		if(result.trim() != ""){
		var inner_right_panel = _("inner-right-panel");
		inner_right_panel.style.overflow = "visible";

		var obj = JSON.parse(result);
		if (typeof(obj.logged_in) != "undefined" && !obj.logged_in) {
			window.location = "login.php";
		}
		else{
			
			switch(obj.data_type){
				case "user_info":
				var username = _("username");
				var email = _("email");
				var profile_image = _("profile_image");
				username.innerHTML = obj.username;
				email.innerHTML = obj.email;
				profile_image.src = obj.image;

				break;

				case "contacts":
				
				var inner_left_panel = _("inner-left-panel");
				//var inner_right_panel = _("inner-right-panel");
				inner_right_panel.style.overflow = "hidden";
				inner_left_panel.innerHTML = obj.message;
				break;

				case "chats_refresh":
				SEEN_STATUS= false;
				var message_holder = _("message_holder");
				message_holder.innerHTML = obj.messages;

				if (typeof obj.new_message != 'undefined') {
					if (obj.new_message) {
						received_audio.play();
						setTimeout(function(){
					message_holder.scrollTo(0,message_holder.scrollHeight);
					var message_text = _("message_text");
					message_text.focus();
					

				},100);

					}

				}
				
				break;

				case "send_message":
				sent_audio.play();
				case "chats":
				SEEN_STATUS = false;
				var inner_left_panel = _("inner-left-panel");
				
				inner_left_panel.innerHTML = obj.user;
				var inner_right_panel = _("inner-right-panel");
				inner_right_panel.innerHTML = obj.messages;

				var message_holder = _("message_holder");
				setTimeout(function(){
					message_holder.scrollTo(0,message_holder.scrollHeight);
					var message_text = _("message_text");
					message_text.focus();
					

				},100);
				if (typeof obj.new_message != 'undefined') {
					if (obj.new_message) {
						received_audio.play();
					}

				}
				break;

				

				case "settings":
				var inner_left_panel = _("inner-left-panel");
				inner_left_panel.innerHTML = obj.message;
				break;

				case "save_settings":
				
				alert(obj.message);
				get_data({},"user_info");
				get_settings(true);
				break;

				case "send_image":
				alert(obj.message);
				break;

				





			}
		}

	}
}

	function logout_user(){
		var answer = confirm("Are you sure you want to logout ???");
		if(answer){
		get_data({},"logout");
	}
	}
	get_data({},"user_info");
	get_data({},"contacts");

	var radio_contacts = _("radio-contacts");
	radio_contacts.checked = true;

	function get_contacts(e){
		get_data({},"contacts");

	}
	function get_chats(e){
		get_data({},"chats");

	}
	function get_settings(e){
		get_data({},"settings");

	}
	function send_message(e){
		var message_text = _("message_text");
		if(message_text.value.trim() == ""){
			alert("Please type something to send..");
			return;
		}
		
		get_data({

			message:message_text.value.trim(),
			userid:CURRENT_CHAT_USER
		},"send_message");


	}

	function enter_pressed(e){

		if(e.keyCode  == 13){
			send_message(e);
		}

		SEEN_STATUS = true;
	}
	
	
  setInterval(function(){
  		var radio_chat = _("radio-chat");
  		var radio_contacts = _("radio-contacts");

  	
		if(CURRENT_CHAT_USER != "" && radio_chat.checked){
			//console.log(SEEN_STATUS);
			
			get_data({userid:CURRENT_CHAT_USER,seen:SEEN_STATUS},"chats_refresh");
		}
		if(radio_contacts.checked ){
			//console.log(SEEN_STATUS);
			
			get_data({},"contacts");
		}
	},5000);


	function set_seen(e){
		SEEN_STATUS = true;
	}

	function delete_message(e){
		if (confirm("Are you sure you want to delete this message ???")) {
			var msgid = e.target.getAttribute("msgid");
			get_data({rowid:msgid},"delete_message");
			get_data({userid:CURRENT_CHAT_USER,seen:SEEN_STATUS},"chats_refresh");

		}
	}

	function delete_thread(e){
		if (confirm("Are you sure you want to delete the whole thread ???")) {
			get_data({userid:CURRENT_CHAT_USER},"delete_thread");
			get_data({userid:CURRENT_CHAT_USER,seen:SEEN_STATUS},"chats_refresh");

		}
	}

	

</script>
<script type="text/javascript">
	function collect_data(){
		var savesettings_button= _("savesettings_button");
		savesettings_button.disabled = true;
		savesettings_button.value= "loading......";
		var myform= _("myform");
		var inputs= myform.getElementsByTagName("INPUT");
		var data={};
		for (var i = inputs.length - 1; i >= 0; i--) {
			var key= inputs[i].name;

			switch(key){
				case "username":
					data.username = inputs[i].value;
					break;
				case "email":
					data.email = inputs[i].value;
					break;
				case "gender":
					if (inputs[i].checked) {
					data.gender = inputs[i].value;
				}
					break;
				case "password":
					data.password = inputs[i].value;
					break;
				case "password2":
					data.password2 = inputs[i].value;
					break;

			}

		}
		send_data(data,"save_settings");
	}
	function send_data(data,type){
		var xml = new XMLHttpRequest();
		xml.onload = function(){
			if(xml.readyState == 4 || xml.status == 200){
				//alert(xml.responseText);
				handle_result(xml.responseText);
				var savessettings_button= _("savesettings_button");
				savesettings_button.disabled = false;
				savesettings_button.value= "Saving the data......";
			}
		}
			data.data_type=type;
			var data_string = JSON.stringify(data);
			xml.open("POST","api.php",true);
			xml.send(data_string);
	}
	
	function upload_profile_image(files){
		var filename = files[0].name;
		var ext_start = filename.lastIndexOf(".");
		var ext = filename.substr(ext_start + 1,3);

		if(!(ext == 'jpg' || ext == 'JPG')){
			alert("This file types not allowed");
			return;
		}
		var changeimage_button= _("changeimage_button");
		changeimage_button.disbled = true;
		changeimage_button.innerHTML="Uploading Image...";

		var myform = new FormData();
		var xml = new XMLHttpRequest();
		xml.onload = function(){
			if(xml.readyState == 4 || xml.status == 200){
				//alert(xml.responseText);
				get_data({},"user_info");
				get_settings(true);
				changeimage_button.disbled = false;
				changeimage_button.innerHTML="Change Image";
			}
		}
			myform.append('file',files[0]);
			myform.append('data_type',"change_profile_image");
			xml.open("POST","uploader.php",true);
			xml.send(myform);
	}

	function handle_drag_and_drop(e){
			if(e.type == "dragover"){
				e.preventDefault();
				e.target.className = "dragging";
			}
			else if(e.type == "dragleave"){
				e.target.className = "";

			}
			else if(e.type == "drop"){
				e.preventDefault();
				e.target.className = "";
				upload_profile_image(e.dataTransfer.files);
			}
			else{
				e.target.className = "";
			}

	}

	function start_chat(e){
		var userid = e.target.getAttribute("userid");
		if(e.target.id == ""){
			userid = e.target.parentNode.getAttribute("userid");
		}
		CURRENT_CHAT_USER = userid;
		var radio_chat = _("radio-chat");
		radio_chat.checked=true;
		get_data({userid:CURRENT_CHAT_USER},"chats");

	}

	function send_image(files){
		var filename = files[0].name;
		var ext_start = filename.lastIndexOf(".");
		var ext = filename.substr(ext_start + 1,3);

		if(!(ext == 'jpg' || ext == 'JPG' )){
			alert("This file types not allowed");
			return;
		}
		
		
		var myform = new FormData();
		var xml = new XMLHttpRequest();
		xml.onload = function(){
			if(xml.readyState == 4 || xml.status == 200){
				handle_result(xml.responseText,"send_image");
				get_data({userid:CURRENT_CHAT_USER,seen:SEEN_STATUS},"chats_refresh");
				
			}
		}
			myform.append('file',files[0]);
			myform.append('data_type',"send_image");
			myform.append('userid',CURRENT_CHAT_USER);
			xml.open("POST","uploader.php",true);
			xml.send(myform);
	}

	function close_image(e){
		e.target.className = "image_off";

	}
	function image_show(e){
		var image = e.target.src;
		var image_viewer = _("image_viewer");
		image_viewer.innerHTML = "<img src='"+image+"' style='width:100%' />";
		image_viewer.className = "image_on";

	}

	
</script>