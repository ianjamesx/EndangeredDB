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
<title>Species Search</title>
<link rel="stylesheet" type="text/css" href="esd_styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">

<style>
/* Style the tab */
.tab {
	overflow: hidden;
	border: 1px solid #ccc;
	background-color: #f1f1f1;
}
/* Style the buttons inside the tab */
.tab button {
	background-color: inherit;
	float: left;
	border: none;
	outline: none;
	cursor: pointer;
	padding: 14px 16px;
	transition: 0.3s;
	font-size: 17px;
}
/* Change background color of buttons on hover */
.tab button:hover {
	background-color: #ddd;
}
/* Create an active/current tablink class */
.tab button.active {
	background-color: #ccc;
}
/* Style the tab content */
.tabcontent {
	display: none;
	padding: 6px 12px;
	-webkit-animation: fadeEffect .5s;
	animation: fadeEffect .5s;
}
/* Fade in tabs */
@-webkit-keyframes fadeEffect {
	from {opacity: 0;}
	to {opacity: 1;}
}
@keyframes fadeEffect {
	from {opacity: 0;}
	to {opacity: 1;}
}
/*
toggle switch
*/
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}
.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}
input:checked + .slider {
  background-color: #40A391;
}
input:focus + .slider {
  box-shadow: 0 0 1px #40A391;
}
input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}
/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}
.slider.round:before {
  border-radius: 50%;
}
</style>
</head>

<body>


<!-- header -->
<div class="logo">
	<a href="index.html"><img src="esd-logo-03.png" alt="ESD"></a>
</div>

<div class="menu">
	<a class="icon" href="javascript:void(0);" onclick="showMenu()"><img src="fa-bars.png" alt="MENU" width="22px"></a>
	<a class="login" href="contact.html">Contact</a>
	<a class="login" href="login.html">Login</a>
	<a href="danger.html">Dangers Affecting Species</a>
	<a href="nonprofit.html">Nonprofits</a>
	<a href="search.php" class="active">Species Search</a>
</div>

<main>

	<h1>Delete Data from ESD</h1>
	<h3 style="text-align: center;">Please select what type of data you would like to delete</h3>
	<span style="display:block; height: 30px;"></span>

	<div class="tab">
	  <button class="tablinks" onclick="switchtab(event, 'organsim')" id="defaultOpen">Organism</button>
	  <button class="tablinks" onclick="switchtab(event, 'danger')">Danger</button>
	  <button class="tablinks" onclick="switchtab(event, 'region')">Region</button>
		<button class="tablinks" onclick="switchtab(event, 'npo')">NPO</button>
	</div>

	<div id="organsim" class="tabcontent">

		<div id="neworg">
			<h2>Delete an Organism from the Database</h2>
			<form class="pure-form">

					<fieldset class="pure-group">
		        <input id="binomial" class="pure-input-1-2" placeholder="Binomial Nomenclature">
	    		</fieldset>

					<br><span style="display:block; height: 20px;"></span>
	        <input type="button" id="orgsubmit" value="Search and Delete"></input>

			</form>
		</div>

	</div>

	<div id="danger" class="tabcontent">
		<h2>Delete a Species Danger from the Database</h2>
		<form class="pure-form">
				<fieldset class="pure-group">
					<input id="dangername" class="pure-input-1-2" placeholder="Danger Name">
				</fieldset>
				<br><span style="display:block; height: 20px;"></span>
				<input type="button" id="dangersubmit" value="Search and Delete"></input>
		</form>
	</div>

	<div id="region" class="tabcontent">
		<h2>Delete a Region from the Database</h2>
		<form class="pure-form">
				<fieldset class="pure-group">
	        <input id="regionname" class="pure-input-1-2" placeholder="Region Name">
	        <input id="biome" class="pure-input-1-2" placeholder="Biome">
    		</fieldset>
				<br><span style="display:block; height: 20px;"></span>
        <input type="button" id="regionsubmit" value="Search and Delete"></input>
		</form>
	</div>

	<div id="npo" class="tabcontent">
		<h2>Delete an NPO from the Database</h2>
		<form class="pure-form">
				<fieldset class="pure-group">
	        <input id="nponame" class="pure-input-1-2" placeholder="NPO Name">
    		</fieldset>
				<br><span style="display:block; height: 20px;"></span>
        <input type="button" id="nposubmit" value="Search and Delete"></input>
		</form>
	</div>

</main>

<!-- footer -->
<div class="footer">
	<div class="center">
		<a href="search.php">Species&nbsp;Search</a>
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
	$('#orgsubmit').click(function(){
		$.ajax({
      url: '#',
      type: 'POST',
      data: {
				table: 'Organisms',
				bionmial_nomenclature: $('#binomial').val(),
      },
      datatype: 'json',
      success: function(data){
      }
    });
	});
	$('#dangersubmit').click(function(){
		$.ajax({
      url: '#',
      type: 'POST',
      data: {
				table: 'Dangers',
				name: $('#dangername').val(),
      },
      datatype: 'json',
      success: function(data){
      }
    });
	});
	$('#regionsubmit').click(function(){
		$.ajax({
      url: '/assignmentcoursesession',
      type: 'POST',
      data: {
				table: 'Region',
				name: $('#regionname').val(),
				biome: $('#biome').val(),
      },
      datatype: 'json',
      success: function(data){
      }
    });
	});
	$('#nposubmit').click(function(){
		$.ajax({
      url: '/assignmentcoursesession',
      type: 'POST',
      data: {
				table: 'NPOs',
				name: $('#nponame').val(),
      },
      datatype: 'json',
      success: function(data){
      }
    });
	});
});
//some stuff for tab switching
function switchtab(evt, tab) {
  // Declare all variable
  var i, tabcontent, tablinks;
  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tab).style.display = "block";
  evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();
</script>

</body>
</html>