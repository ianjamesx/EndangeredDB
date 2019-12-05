<?php
session_start();
if(!isset($_SESSION['user_id']))
{
	header("Location: http://acadweb1.salisbury.edu/~mmandulak1/ESD/login.html");
}
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
	<a href="index.html"><img src="esd-logo-03.png" alt="ESD"></a>
</div>

<div class="menu">
	<a class="icon" href="javascript:void(0);" onclick="showMenu()"><img src="fa-bars.png" alt="MENU" width="22px"></a>
	<a class="login" href="#contact">Contact</a>
	<a class="login" href="#login">Login</a>
	<a href="#dangers">Dangers Affecting Species</a>
	<a href="#nonprofits">Nonprofits</a>
	<a href="search.html">Species Search</a>
</div>

<main>
	<h1>Admin Panel</h1>
	<h3>Welcome to the administrator panel, you can use the following links to modify the database content</h3>
	<form class="pure-form">

		<fieldset style="text-align: center;">
			<input type="button" id="insert" value="Insert data"></input>
			<input type="button" id="delete" value="Delete data"></input>
			<input type="button" id="update" value="Update data"></input>
		</fieldset>

	</form>
	<hr>
	<h3>Newest messages from contact form</h3>
</main>

<!-- footer -->
<div class="footer">
	<div class="center">
		<a href="search.html">Species&nbsp;Search</a>
		<a href="#nonprofits">Nonprofits</a>
		<a href="#dangers">Dangers&nbsp;Affecting&nbsp;Species</a>
	<br>
	<hr>
	<br>

		<a href="contact.html">Contact</a>
		<a href="#login">Login</a>
		<a href="index.php">Home</a>
		<h4>Endangered Species Database &copy; 2019</h4>
	</div>
</div>

<script>
$( document ).ready(function(){
	$('#insert').click(function(){
		window.location.href = "insert.html";
	});
	$('#delete').click(function(){
		window.location.href = "insert.html";
	});
	$('#update').click(function(){
		window.location.href = "insert.html";
	});
});
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
//function for add keyword button
		function addKeyword() {
			var y = document.getElementById("keyword").firstChild;
			var newKey = y.cloneNode(true);
			document.getElementById("keyword").appendChild(newKey);
		}
</script>

</body>
</html>