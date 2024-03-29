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
<link rel="icon" href="favicon.png" type="image/x-icon"/>
<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="esd_styles.css">

<style>
/* alert box */
.alertsuccess {
  padding: 20px;
  background-color: #66B695;
	border-radius: 16px;
  color: white;
}
.alertfailure {
	padding: 20px;
	background-color: #EF6868;
	border-radius: 16px;
	color: white;
}
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}
.closebtn:hover {
  color: black;
}
/* Style the tab */
.tab {
	overflow: hidden;
	border: 1px solid #CAE2D8;
  border-radius: 25px;
	background-color: #CAE2D8;
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
	background-color: #92DCBD;
}
/* Create an active/current tablink class */
.tab button.active {
	background-color: #92DCBD;
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
</style>
</head>

<body onload="showComments()">

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
 <h1>Admin Panel</h1>
 <h3 style="text-align: center;">Use the following panels to insert, delete, or update database content</h3>
 <span style="display:block; height: 30px;"></span>

 <form class="category" method="post" style="text-align: center;">
	 <input type="radio" id="insertbtn" name="category" value ="insert" checked="checked"/>
	 <label for="insertbtn">Insert Records</label>

	 <input type="radio" id="deletebtn" value="delete" name="category"/>
	 <label for="deletebtn">Delete Records</label>

	 <input type="radio" id="updatebtn" value="update" name="category"/>
	 <label for="updatebtn">Update Records</label>
 </form>

 <hr style="width: 100%;">

 <div id="insert">

	 <span style="display:block; height: 20px;"></span>

	 <div class="tab" style="width: 35%;">
		 <button class="tablinks" onclick="switchtab(event, 'organsim')" id="defaultOpeninsert">Organism</button>
		 <button class="tablinks" onclick="switchtab(event, 'npo')">NPO</button>
	 </div>

	 <div id="organsim" class="tabcontent">

		 <div id="neworg">
			 <h3>Insert an Organism to the Database</h3>
			 <form class="pure-form">

					 <fieldset class="pure-group">
						 <input id="orgname_insert" class="pure-input-2-3" placeholder="Organism Name">
						 <input id="binomial_insert" class="pure-input-2-3" placeholder="Binomial Nomenclature">
						 <input id="imageurl_insert" class="pure-input-2-3" placeholder="Sample Image URL">
					 </fieldset>

					 <p>Region</p>
					 <select id="region_insert" class="pure-input-1-2">
						 <option value="africa">Africa</option>
						 <option value="asia">Asia</option>
						 <option value="caribbean">Caribbean</option>
						 <option value="central">Central America</option>
						 <option value="north">North America</option>
						 <option value="south">South America</option>
						 <option value="europe">Europe</option>
						 <option value="oceans">Oceans</option>
						 <option value="waters">Other Waterways</option>
					 </select>
					 <br><span style="display:block; height: 15px;"></span>

					 <p>Biome</p>
					 <select id="biome_insert" class="pure-input-1-2">
						 <option value="alpine">Alpine</option>
						 <option value="chaparral">Chaparral</option>
						 <option value="desert">Desert</option>
						 <option value="rainforest">Rainforest</option>
						 <option value="savanna">Savanna</option>
						 <option value="taiga">Taiga</option>
						 <option value="temp_forest">Temperate Forest</option>
						 <option value="temp_grass">Temperate Grassland</option>
						 <option value="tundra">Tundra</option>
						 <option value="coral">Coral Reef</option>
						 <option value="fresh">Fresh Water</option>
						 <option value="salt">Salt Water</option>
					 </select>
					 <br><span style="display:block; height: 15px;"></span>

					 <p>Dangers</p>
					 <select id="danger_insert" class="pure-input-1-2">
						 <option value="climate">Climate Change</option>
						 <option value="deforest">Deforestation</option>
						 <option value="disease">Disease</option>
						 <option value="habitat">Habitat Loss</option>
						 <option value="invasive">Invasive Species</option>
						 <option value="exploitation">Over Exploitation</option>
						 <option value="pollution">Pollution</option>
					 </select>
					 <br><span style="display:block; height: 15px;"></span>

					 <p>Watchlist Status</p>
					 <select id="watchlist_insert" class="pure-input-1-2">
						 <option value="climate">On Watchlist</option>
						 <option value="deforest">Not On Watchlist</option>
					 </select>
					 <br><span style="display:block; height: 15px;"></span>

					 <br><span style="display:block; height: 30px;"></span>
					 <input type="button" id="orgsubmit" value="Submit"></input>

			 </form>
			 <div id="orginsertresult"></div>
		 </div>

	 </div>

	 <div id="npo" class="tabcontent">
		 <h3>Insert a Non-Profit Organization (NPO) to the database</h3>
		 <form class="pure-form">

				 <fieldset class="pure-group">
					 <input id="nponame_insert" class="pure-input-1-3" placeholder="NPO Name">
					 <input id="npolink_insert" class="pure-input-1-3" placeholder="Link (URL)">
					 <input id="npofunds_insert" class="pure-input-1-3" placeholder="Funding (In US Dollars)" type="number">
				 </fieldset>

				 <br><span style="display:block; height: 30px;"></span>
				 <input type="button" id="orgsubmit" value="Submit"></input>

		 </form>
		 <div id="npoinsertresult"></div>
	 </div>

 </div>

 <div id="delete" style="display: none;">

	 <span style="display:block; height: 20px;"></span>

	 <div class="tab" style="width: 35%;">
		 <button class="tablinks" onclick="switchtab(event, 'orgdel')" id="defaultOpendelete">Organism</button>
		 <button class="tablinks" onclick="switchtab(event, 'npodel')">NPO</button>

	 </div>

	 <div id="orgdel" class="tabcontent">

		 <div id="ordeltab">
			 <h3>Delete an Organism from the Database</h3>
			 <form class="pure-form">

					 <fieldset class="pure-group">
						 <input id="binomial" class="pure-input-2-3" placeholder="Binomial Nomenclature">
					 </fieldset>

					 <br><span style="display:block; height: 30px;"></span>
					 <input type="button" id="orgsubmit" value="Submit"></input>

			 </form>
		 </div><div id="orgdeleteresult"></div>

	 </div>

	 <div id="npodel" class="tabcontent">
		 <h3>Delete a Non-Profit Organization (NPO) from the database</h3>
		 <form class="pure-form">

				 <fieldset class="pure-group">
					 <input id="nponame" class="pure-input-1-3" placeholder="NPO Name">
				 </fieldset>

				 <br><span style="display:block; height: 30px;"></span>
				 <input type="button" id="orgsubmit" value="Submit"></input>

		 </form>

	 </div><div id="npodeleteresult"></div>

 </div>

 <div id="update" style="display: none;">

	 <span style="display:block; height: 20px;"></span>

	 <div class="tab" style="width: 35%;">
		 <button class="tablinks" onclick="switchtab(event, 'orgupd')" id="defaultOpenupdate">Organism</button>
		 <button class="tablinks" onclick="switchtab(event, 'npoupd')">NPO</button>
	 </div>

	 <div id="orgupd" class="tabcontent">

		 <div id="neworg">
			 <h3>Update an Organism from the Database</h3>
			 <p>All values of the uniquely identifying attribute will be updated to values you set</p>
				 <form class="pure-form">

					 <fieldset class="pure-group">
						 <input id="binomial_insert" class="pure-input-2-3" placeholder="Binomial Nomenclature (unique attribute)">
					 </fieldset>

						 <fieldset class="pure-group">
							 <input id="orgname_insert" class="pure-input-2-3" placeholder="Organism Name">
							 <input id="imageurl_insert" class="pure-input-2-3" placeholder="Sample Image URL">
						 </fieldset>

						 <p>Region</p>
						 <select id="region_insert" class="pure-input-1-2">
							 <option value="africa">Africa</option>
							 <option value="asia">Asia</option>
							 <option value="caribbean">Caribbean</option>
							 <option value="central">Central America</option>
							 <option value="north">North America</option>
							 <option value="south">South America</option>
							 <option value="europe">Europe</option>
							 <option value="oceans">Oceans</option>
							 <option value="waters">Other Waterways</option>
						 </select>
						 <br><span style="display:block; height: 15px;"></span>

						 <p>Biome</p>
						 <select id="biome_insert" class="pure-input-1-2">
							 <option value="alpine">Alpine</option>
							 <option value="chaparral">Chaparral</option>
							 <option value="desert">Desert</option>
							 <option value="rainforest">Rainforest</option>
							 <option value="savanna">Savanna</option>
							 <option value="taiga">Taiga</option>
							 <option value="temp_forest">Temperate Forest</option>
							 <option value="temp_grass">Temperate Grassland</option>
							 <option value="tundra">Tundra</option>
							 <option value="coral">Coral Reef</option>
							 <option value="fresh">Fresh Water</option>
							 <option value="salt">Salt Water</option>
						 </select>
						 <br><span style="display:block; height: 15px;"></span>

						 <p>Dangers</p>
						 <select id="danger_insert" class="pure-input-1-2">
							 <option value="climate">Climate Change</option>
							 <option value="deforest">Deforestation</option>
							 <option value="disease">Disease</option>
							 <option value="habitat">Habitat Loss</option>
							 <option value="invasive">Invasive Species</option>
							 <option value="exploitation">Over Exploitation</option>
							 <option value="pollution">Pollution</option>
						 </select>
						 <br><span style="display:block; height: 15px;"></span>

						 <p>Watchlist Status</p>
						 <select id="watchlist_insert" class="pure-input-1-2">
							 <option value="climate">On Watchlist</option>
							 <option value="deforest">Not On Watchlist</option>
						 </select>
						 <br><span style="display:block; height: 15px;"></span>

						 <br><span style="display:block; height: 30px;"></span>
						 <input type="button" id="orgsubmit" value="Submit"></input>

				 </form>
				 <div id="orgupdateresult"></div>
		 </div>

	 </div>

	 <div id="npoupd" class="tabcontent">
		 <h3>Update a Non-Profit Organization (NPO) in the database</h3>
		 <p>First, enter the unique identifying attribute for the record you wish to update, then you can modify all of its attributes</p>
		 <form class="pure-form">

			 <fieldset class="pure-group">
				 <input id="nponame_insert" class="pure-input-1-3" placeholder="NPO Name (unique attribute)">
			 </fieldset>

			 <fieldset class="pure-group">
				 <input id="npolink_insert" class="pure-input-1-3" placeholder="Link (URL)">
				 <input id="npofunds_insert" class="pure-input-1-3" placeholder="Funding (In US Dollars)" type="number">
			 </fieldset>

				 <br><span style="display:block; height: 30px;"></span>
				 <input type="button" id="orgsubmit" value="Submit"></input>

		 </form>

	 </div><div id="npoupdateresult"></div>

 </div>
 <hr style="width:100%;">
 <h3>Newest messages from contact form</h3>
 <div id="comments">
</div>

 <!--<form class="pure-form">

	 <fieldset style="text-align: center;">
		 <input type="button" id="logout" value="Logout"></input>
	 </fieldset>

 </form>-->
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
$( document ).ready(function(){
	 var options = ['insert', 'delete', 'update'];
	 $('input[type=radio][name=category]').change(function(){
		 var i;
		 for(i = 0; i < options.length; i++){
			 if(options[i] === this.value){
				 $('#' + this.value).show();
			 } else {
				 $('#' + options[i]).hide();
			 }
		 }
	 });
	 $('#orgsubmit').click(function(){
		 $.ajax({
			 url: 'insertOrg.php',
			 type: 'POST',
			 data: {
				 table: 'Organisms',
				 name: $('#orgname_insert').val(),
				 bionmial_nomenclature: $('#binomial_insert').val(),
				 url: $('#imageurl_insert').val(),
				 type: $('#type_insert').val(),
				 region: $('#region').val(),
				 biome: $('#biome_insert').val(),
				 danger: $('#danger_insert').val(),
				 watchlist: $('#watchlist_insert').val(),
			 },
			 datatype: 'json',
			 success: function(data){
				 renderAlert(data, "orginsertresult");
			 }
		 });
	 });
	 $('#nposubmit').click(function(){
		 $.ajax({
			 url: 'insertNPO.php',
			 type: 'POST',
			 data: {
				 table: 'NPOs',
				 name: $('#nponame_insert').val(),
				 link:  $('#npolink_insert').val(),
				 funding: $('#npofund_insert').val(),
			 },
			 datatype: 'json',
			 success: function(data){
				 renderAlert(data, "npoinsertresult");
			 }
		 });
	 });
	 $('#orgsubmit_del').click(function(){
		 $.ajax({
			 url: 'deleteFrom.php',
			 type: 'POST',
			 data: {
				 table: 'Organisms',
				 binomial_nomenclature: $('#binomial').val(),
			 },
			 datatype: 'json',
			 success: function(data){
				 renderAlert(data, "orgdeleteresult");
			 }
		 });
	 });
	 $('#nposubmit_del').click(function(){
		 $.ajax({
			 url: 'deleteFrom.php',
			 type: 'POST',
			 data: {
				 table: 'NPOs',
				 name: $('#nponame').val(),
			 },
			 datatype: 'json',
			 success: function(data){
				 renderAlert(data, "npodeleteresult");
			 }
		 });
	 });
	 $('#orgsubmit').click(function(){
		 $.ajax({
			 url: 'updateOrg.php',
			 type: 'POST',
			 data: {
				 table: 'Organisms',
				 name: $('#orgname_update').val(),
				 bionmial_nomenclature: $('#binomial_update').val(),
				 url: $('#imageurl_update').val(),
				 type: $('#type_update').val(),
				 region: $('#region').val(),
				 biome: $('#biome_update').val(),
				 danger: $('#danger_update').val(),
				 watchlist: $('#watchlist_update').val(),
			 },
			 datatype: 'json',
			 success: function(data){
				 renderAlert(data, "orgupdateresult");
			 }
		 });
	 });
	 $('#nposubmit').click(function(){
		 $.ajax({
			 url: 'updateNPO.php',
			 type: 'POST',
			 data: {
				 table: 'NPOs',
				 name: $('#nponame_update').val(),
				 link:  $('#npolink_update').val(),
				 funding: $('#npofund_update').val(),
			 },
			 datatype: 'json',
			 success: function(data){
				 renderAlert(data, "npoupdateresult");
			 }
		 });
	 });
 $('#logout').click(function(){
	 window.location.href = "index.html";
 });
});
var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
 acc[i].addEventListener("click", function() {
	 /* Toggle between adding and removing the "active" class,
	 to highlight the button that controls the panel */
	 this.classList.toggle("active");
	 /* Toggle between hiding and showing the active panel */
	 var panel = this.nextElementSibling;
	 if (panel.style.display === "block") {
		 panel.style.display = "none";
	 } else {
		 panel.style.display = "block";
	 }
 });
}
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
document.getElementById("defaultOpendelete").click();
document.getElementById("defaultOpenupdate").click();
document.getElementById("defaultOpeninsert").click();
function renderAlert(status, div){
 if(status == 1){
	 $('#' + div).html(`
		 <span style="display:block; height: 30px;"></span>
		 <div class="alertsuccess">
			 <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
			 <strong>Success</strong> Record Successfully added
		 </div>
		 `);
 } else {
	 $('#' + div).html(`
		 <span style="display:block; height: 30px;"></span>
		 <div class="alertdanger">
			 <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
			 <strong>Success</strong> Record Successfully added
		 </div>
		 `);
 }
}
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
	 function showComments(){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function()
			{
				if(this.readyState==4 && this.status==200)
				{
					document.getElementById("comments").innerHTML = this.responseText;
				}
			};
			xhttp.open("POST","recentComments.php",true);
			xhttp.send();
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
