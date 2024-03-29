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
<title>Admin Panel</title>
<link rel="stylesheet" type="text/css" href="esd_styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">

<style>
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

	<h1>Modify Database</h1>
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
  	  <button class="tablinks" onclick="switchtab(event, 'organsim')" id="defaultOpenInsert">Organism</button>
  		<button class="tablinks" onclick="switchtab(event, 'npo')">NPO</button>
  	</div>

    <div id="organsim" class="tabcontent">

      <div id="neworg">
        <h3>Insert an Organism to the Database</h3>
  			<form class="pure-form">

  					<fieldset class="pure-group">
  		        <input id="orgname" class="pure-input-2-3" placeholder="Organism Name">
  		        <input id="binomial" class="pure-input-2-3" placeholder="Binomial Nomenclature">
  		        <input id="imageurl" class="pure-input-2-3" placeholder="Sample Image URL">
  	    		</fieldset>

  					<p>Region</p>
  					<select id="type" class="pure-input-1-2">
              <option value="africa">Africa</option>
              <option value="asia">Asia</option>
              <option value="caribbean">Caribbean</option>
              <option value="central america">Central America</option>
              <option value="north america">North America</option>
              <option value="south america">South America</option>
              <option value="europe">Europe</option>
              <option value="oceans">Oceans</option>
  					</select>
  					<br><span style="display:block; height: 15px;"></span>

            <p>Biome</p>
  					<select id="type" class="pure-input-1-2">
              <option value="alpine">Alpine</option>
              <option value="chaparral">Chaparral</option>
              <option value="desert">Desert</option>
              <option value="rainforest">Rainforest</option>
              <option value="savanna">Savanna</option>
              <option value="taiga">Taiga</option>
              <option value="Temperate Forest">Temperate Forest</option>
              <option value="Temperate Grassland">Temperate Grassland</option>
              <option value="tundra">Tundra</option>
              <option value="coral reef">Coral Reef</option>
              <option value="fresh water">Fresh Water</option>
              <option value="salt water">Salt Water</option>
  					</select>
  					<br><span style="display:block; height: 15px;"></span>

            <p>Dangers</p>
  					<select id="type" class="pure-input-1-2">
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
  					<select id="type" class="pure-input-1-2">
              <option value="climate">On Watchlist</option>
              <option value="deforest">Not On Watchlist</option>
  					</select>
  					<br><span style="display:block; height: 15px;"></span>

  					<br><span style="display:block; height: 30px;"></span>
  	        <input type="button" id="orgsubmit" value="Submit"></input>

  			</form>
  		</div>

  	</div>

  	<div id="npo" class="tabcontent">
      <h3>Insert a Non-Profit Organization (NPO) to the database</h3>
      <form class="pure-form">

          <fieldset class="pure-group">
            <input id="nponame" class="pure-input-1-3" placeholder="NPO Name">
            <input id="npolink" class="pure-input-1-3" placeholder="Link (URL)">
            <input id="npofunds" class="pure-input-1-3" placeholder="Funding (In US Dollars)" type="number">
          </fieldset>

          <br><span style="display:block; height: 30px;"></span>
          <input type="button" id="orgsubmit" value="Submit"></input>

      </form>

  	</div>

  </div>

  <div id="delete" style="display: none;">

    <span style="display:block; height: 20px;"></span>

    <div class="tab" style="width: 35%;">
  	  <button class="tablinks" onclick="switchtab(event, 'orgdel')" id="defaultOpenDelete">Organism</button>
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
  		</div>

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

  	</div>

  </div>

	<div id="update" style="display: none;">

    <span style="display:block; height: 20px;"></span>

    <div class="tab" style="width: 35%;">
  	  <button class="tablinks" onclick="switchtab(event, 'organsim')" id="defaultOpenUpdate">Organism</button>
  		<button class="tablinks" onclick="switchtab(event, 'npo')">NPO</button>
  	</div>

    <div id="orgupd" class="tabcontent">

      <div id="neworg">
        <h3>Delete an Organism from the Database</h3>
  			<form class="pure-form">

  					<fieldset class="pure-group">
  		        <input id="binomial" class="pure-input-2-3" placeholder="Binomial Nomenclature">
  	    		</fieldset>

  					<br><span style="display:block; height: 30px;"></span>
  	        <input type="button" id="orgsubmit" value="Submit"></input>

  			</form>
  		</div>

  	</div>

  	<div id="npoupd" class="tabcontent">
      <h3>delete a Non-Profit Organization (NPO) from the database</h3>
      <form class="pure-form">

          <fieldset class="pure-group">
            <input id="nponame" class="pure-input-1-3" placeholder="NPO Name">
          </fieldset>

          <br><span style="display:block; height: 30px;"></span>
          <input type="button" id="orgsubmit" value="Submit"></input>

      </form>

  	</div>

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
      url: '#',
      type: 'POST',
      data: {
				table: 'Organisms',
				name: $('#orgname').val(),
				bionmial_nomenclature: $('#binomial').val(),
				url: $('#imageurl').val(),
				type: $('#type').val(),
				watchlist: $('#watchlist').val(),
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
				watchlist: $('#human').val(),
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
				link:  $('#npolink').val(),
				funding: $('#npofund').val(),
      },
      datatype: 'json',
      success: function(data){
      }
    });
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
document.getElementById("defaultOpenDelete").click();
document.getElementById("defaultOpenUpdate").click();
document.getElementById("defaultOpenInsert").click();
</script>

</body>
</html>