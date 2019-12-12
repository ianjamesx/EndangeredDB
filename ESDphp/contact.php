<?php
	session_start();
	?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Contact</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<title>Species Search</title>
<link rel="stylesheet" type="text/css" href="esd_styles.css">
</head>

<body>

<!-- header -->
<div class="logo">
	<a href="index.php"><img src="esd-logo-03.png" alt="ESD"></a>
</div>

<div class="menu">
	<a class="icon" href="javascript:void(0);" onclick="showMenu()"><img src="fa-bars.png" alt="MENU" width="22px"></a>
	<?php
 if(!isset($_SESSION['user_id']))
 {
	 ?>
	  <a class="login" href="contact.php">Contact</a>
	<a class="login" href="login.php">Login</a>
 <?php }
 else
 { ?>
 <a class="login" href="admin.php">Admin Home </a>
 <a class="login" href="" onclick="logout()">Logout</a>
 <?php }
 ?>
	<a href="danger.php">Dangers Affecting Species</a>
	<a href="nonprofit.php">Nonprofits</a>
	<a href="search.php">Species Search</a>
</div>

<main>

	<h1>Thank you for your interest in the Endangered Species Database.</h1>

	<p>We believe that all information about the environment, global climate change, and humanity's impact on the organisms that share this world with us is important. Everyone should have access to this knowledge and should be aware of our effects on the earth and what we can do to create more positive change instead.</p>

	<p>Please contact our team with any comments, questions, or concerns you may have. Thank you for your input!</p>

	<br>

	<div class="contact">
		<form id="comment">
		<h1>CONTACT US</h1>
		<label for="name">Your Name:</label> <br>
		<input type="text" id="nameEnt" name="contact1" required="required"/>
		<br>

		<label for="email">Email:</label> <br>
		<input type="text" id="email" name="contact2" required="required"/>
		<br>

		<label for="message">Message:</label> <br>
		<textarea id="message" class="textbox" name="contact3" required="required"></textarea>
		<br>
			<div id="prompt">
			</div>
			<br>
		<input type="button" id="sendContact" name="contact4" onclick="Validation(nameEnt.value, email.value, message.value)" value="Submit">
		</form>
	</div>
</main>

<!-- footer -->
<div class="footer">
	<div class="center">
		<a href="search.php">Species&nbsp;Search</a>
		<a href="nonprofit.php">Nonprofits</a>
		<a href="danger.php">Dangers&nbsp;Affecting&nbsp;Species</a>
	<br>
	<hr>
	<br>

		<a href="contact.php">Contact</a>
		<a href="login.php">Login</a>
		<a href="index.php">Home</a>
		<h4>Endangered Species Database &copy; 2019</h4>
	</div>
</div>

	<script>
//function to create responsive and collapsible menu 
		function showMenu() {
  			var x = document.getElementById("menu");
  			if (x.className === "menu") {
    			x.className += " responsive";
  			} else {
    			x.className = "menu";
  			}
			if (x.src == "fa-bars.png"){
				x.src = "fa-exit.png";
			}
			else { x.src = "fa-bars.png"; }
		}
		function insertComment(nm, em, msg){
			var	xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function()
			{
				if(this.readyState==4 && this.status ==200)
				{
					document.getElementById("prompt").innerHTML = this.responseText;
				}
			}
			xmlhttp.open('POST','contactSubmit.php?q=' + nm + "~" + em + "~" + msg, true);
			xmlhttp.send();
		}
		function Validation(nm, em, msg)
		{
			var isValid = document.forms['comment'].checkValidity();
			if(isValid)
			{
				insertComment(nm, em, msg);
			}
			else
			{
				document.getElementById("prompt").innerHTML = "Please completely fill out the form";
				return false;
			}
		}
		function logout() {
      		$.ajax({
           type: "POST",
           url: 'logout.php',
           data:{
			   action:'logout',
			   },
           success:function(data) {
             alert("Logged out successfully");
			 location.href="index.php";
           }

      });
 }
	</script>

</body>
</html>