<?php
	session_start();
	?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Endangered Species Database</title>
<link rel="stylesheet" type="text/css" href="esd_styles.css">
<link rel="icon" href="favicon.png" type="image/x-icon"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
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
	<div class="center">
		<img src="esd-logo2.png" alt="Endangered Species Database" class="logo2">
	</div>
	
	<p>Welcome to the Endangered Species Database, brought to you by Salisbury University's Computer Science department. An endangered species is an animal or plant that's considered at risk of extinction. A species can be listed as endangered at the state, federal, and international level. On the federal level, the endangered species list is managed under the Endangered Species Act.</p>
	<p>The Endangered Species Act was put in place to save our native fish, plants, and other wildlife from going extinct. Once gone, they're gone forever, and there's no going back. Losing even a single species can have disastrous impacts on the rest of the ecosystem, with effects that will be felt throughout the food chain.</p>
</main>

<div class="contain">
    <div class="square">
		<div class="search-species">
			<a href="search.html"><img src="tiger.jpg"></a>
		</div>
	</div>
    <div class="square">
		<div class="search-dangers">
			<a href="danger.html"><img src="penguin.jpg"></a>
		</div>
	</div>
    <div class="square">
		<div class="search-npo">
			<a href="nonprofit.html"><img src="whale.jpg"></a>
		</div>
	</div>
</div>
	<br>
	<br>

<span style="display:block; height: 30px;"></span>



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
		<br>
		<br>
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
