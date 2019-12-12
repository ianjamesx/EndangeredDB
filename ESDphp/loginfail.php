<?php
	session_start();
	?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Endangered Species Database</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
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
 <a class="login" href="index.php">Logout</a>
 <?php }
 ?>
	<a href="danger.php">Dangers Affecting Species</a>
	<a href="nonprofit.php">Nonprofits</a>
	<a href="search.php">Species Search</a>
</div>

<main>
	<h1>Login to ESD</h1>
		
	<div class="login-box">
	<h2>Login to your admin panel below</h2>
	<form class="pure-form" method ="POST" action="loginWork.php">

		<input id="email" type="email" class="pure-input-1-4" placeholder="Email" name="email">
		<br>
		<input id="password" type="password" class="pure-input-1-4" placeholder="Password" name="password">
		<br>
		<input type="submit" id="signin" value="Sign In">
		<h4 style="color:red;">*Invalid Email or Password</h4>


		<h3>Interested in joining the team? Please <a href="contact.html" class="lineLink">contact us</a> to create an account.</h3>

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
</script>

</body>
</html>