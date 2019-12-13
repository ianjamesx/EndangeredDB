<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Species Search - Endangered Species Database</title>
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
	<a href="search.php" class="active">Species Search</a>
</div>

<main>

	<p>Search our database of plants and animals that are threatened and endangered. Use the buttons below to search within a category or subcategory, or search the entire database. You can also search <a href="nonprofits.html" class="lineLink">Nonprofits</a> or <a href="danger.html" class="lineLink">Dangers Affecting Species</a> separately on those pages.</p>

	<h1>Search Species by Category:</h1>
	<p style="text-align: center;">Please select a category to search by:</p>
	<span style="display:block; height: 30px;"></span>

		<form class="category">
			<input type="radio" id="all" name="category" value ="all" checked="checked"/>
			<label for="all">Search All</label>
			
			<input type="radio" id="animals" value="animals" name="category"/>
			<label for="animals">Animals</label>

			<input type="radio" id="plants" value="plants" name="category"/>
			<label for="plants">Plants</label>
			<br>
			
		<div class="drop">
			<select id="region">
				<option value="all">Search All Regions</option>
				<option value="Africa">Africa</option>
				<option value="Asia">Asia</option>
				<option value="Caribbean">Caribbean</option>
				<option value="Central">Central America</option>
				<option value="North">North America</option>
				<option value="South">South America</option>
				<option value="Europe">Europe</option>
				<option value="Ocean">Oceans</option>
			</select>
			
			<select id="biome">
				<option value="all">Search All Biomes</option>
				<option value="Alpine">Alpine</option>
				<option value="Chaparral">Chaparral</option>
				<option value="Desert">Desert</option>
				<option value="Rainforest">Rainforest</option>
				<option value="Savanna">Savanna</option>
				<option value="Taiga">Taiga</option>
				<option value="Temperate Forest">Temperate Forest</option>
				<option value="Temperate Grassland">Temperate Grassland</option>
				<option value="Tundra">Tundra</option>
				<option value="Coral Reef">Coral Reef</option>
				<option value="Fresh Water">Fresh Water</option>
				<option value="Salt Water">Salt Water</option>
			</select>
				
			<select id="population">
				<option value="0">Search All Populations</option>
				<option value="100">Less than 100</option>
				<option value="1000">Less than 1,000</option>
				<option value="10000">Less than 10,000</option>
				<option value="100000">Less than 100,000</option>
				<option value="1000000">Less than 1,000,000</option>
				<option value="1000001">More than 1,000,000</option>
			</select>
			
			<select id="dangers">
				<option value="all">Search All Dangers</option>
				<option value="climate">Climate Change</option>
				<option value="deforest">Deforestation</option>
				<option value="disease">Disease</option>
				<option value="habitat">Habitat Loss</option>
				<option value="invasive">Invasive Species</option>
				<option value="exploitation">Over Exploitation</option>
				<option value="pollution">Pollution</option>
			</select>
		</div>
		</form>
		
		<br>
		<br>
			
			<div class="searchBar">
				<input type="text" placeholder="Enter a search term here" size="30px" id="key1" name="searchVal">
				<input type="button" name="submitSearch" id="submitSearch" value="Search">
			
				<select id="sort">
					<option value="name_a">Sort by Name A-Z</option>
					<option value="name_z">Sort by Name Z-A</option>
					<option value="pop_1">Sort by Population (few to many)</option>
					<option value="pop_2">Sort by Population (many to few)</option>
				</select>
			</div>
			
			<br>
			<br>
			<br>
	<div class="result" id="result-template">
		<img src="" alt="image" width="200" height="200" class="result-pic">
		<h3 class="result-name">Regular Name</h3> <h4 class="result-sname"> Scientific Name</h4>
		<p class="result-pop">Population</p>
		<hr>
		<p class="result-danger">This species affected mostly by: Danger</p>
		<p class="result-region">Region: Region</p>
		<p class="result-npo">Possible Nonprofit Help: Nonprofits list</p>
	</div>
	
	<div class="result">
		<img src="placeholder.jpg" alt="image" width="200" height="200">
		<h3 id="result_name">Regular Name</h3> <h4 id="result_sname"> Scientific Name</h4>
		<p id="result_pop">Population</p>
		<hr>
		<p id="result_danger">This species affected mostly by: Danger</p>
		<p id="result_region">Region: Region</p>
		<p id="result_npo">Possible Nonprofit Help: Nonprofits list</p>
	</div>
		

</main>
	
	<button onclick="topFunction()" id="myBtn" title="Go to top"></button>

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
		var chunks = function(array, size) {
		var results = [];
		while (array.length) {
			results.push(array.splice(0, size));
		}
		return results;
		};
		function showMenu() {
  			var x = document.getElementById("menu");
  			if (x.className === "menu") {
    			x.className = "responsive";
  			} else {
    			x.className = "menu";
  			}
			var y = document.getElementById("icon");
			if (y.src == "fa-bars.png"){
				y.src = "fa-exit.png";
			}
			else { y.src = "fa-bars.png"; }
		}
	
//Get the button
	var mybutton = document.getElementById("myBtn");

// When the user scrolls down 300px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
  		if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
    		mybutton.style.opacity = "0.8";
  		} else {
    		mybutton.style.opacity = "0";
  		}
	}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
	
		$(document).ready(function()
    	{
        $('#submitSearch').click(function(){
			$("main .result").not("#result-template").remove();
            $.ajax({
                url: 'searchOrganisms.php',
                type: 'POST',
                data: {
                    table: 'Organisms',
                    all: $('#all:checked').val(),
                    animalSearch: $('#animals:checked').val(),
					plantSearch: $('#plants:checked').val(),
                    regionSelect: $('#region').val(),
					biomeSelect: $('#biome').val(),
					population: $('#population').val(),
					dangers: $('#dangers').val(),
					entry: $('#key1').val(),
					sortBy: $('#sort').val(),
                },
                datatype:'json',
                success: function(data){
					//alert(data);
					if(data=="0~")
					{
						alert("No Results Found");
					}
                    var res = data.trim().split("~");
					//alert(JSON.stringify(res));
					res = res.slice(1);
					//alert("done2");
					res=chunks(res, 7);
					//alert("done3");
                    //alert(JSON.stringify(res));
					cloneDivs(res);
                }
            })
        });
    });
    function cloneDivs(payload){
	  payload.forEach(arr => {
		  clone = $("#result-template").clone().attr("id", "");
		  clone.find(".result-name").text(arr[0]);
		  clone.find(".result-sname").text(arr[1]);
		  if(typeof arr[2]!=='undefined')
		  {
			clone.find(".result-pic").attr("src",arr[2]);
		  }
		  else
		  {
			clone.find(".result-pic").attr("src","placeholder.jpg");
		  }
		  if(typeof arr[3]!=='undefined')
		  	clone.find(".result-pop").text(numberWithCommas(arr[3]));
		  clone.find(".result-danger").text(arr[4]);
		  clone.find(".result-npo").text(arr[5]);
		  clone.find(".result-region").text(arr[6]);
		  clone.appendTo("main");
	  });
    }
	function numberWithCommas(x) {
    	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
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
