<?php
	session_start();
	?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Nonprofits - Endangered Species Database</title>
<link rel="stylesheet" type="text/css" href="esd_styles.css">
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
	
	<p>Search our database of Nonprofit Organizations that are helping endangered animals all over the earth. Enter a nonprofit name to search or search by a region of focus. You can also search <a href="search.html" class="lineLink">Endangered Species</a> or <a href="danger.html" class="lineLink">Dangers Affecting Species</a> separately on those pages.</p>
	
	<h1>Search Nonprofit Organizations</h1>
	<span style="display:block; height: 30px;"></span>

	
	<form class="category">
			<!--<input type="radio" id="all" name="category" value ="all" checked="checked"/>
			<label for="all">Search All</label>
		
			<input type="radio" id="region" name="category" value ="region"/>
			<label for="region">Search by Region of Focus</label>
            -->
		<div class="drop">
			<select id="region_select">
				<option value="all">Search All Regions</option>
				<option value="Africa">Africa</option>
				<option value="Asia">Asia</option>
				<option value="Caribbean">Carribean</option>
				<option value="Central America">Central America</option>
				<option value="North America">North America</option>
				<option value="South America">South America</option>
				<option value="Europe">Europe</option>
				<option value="Oceania">Oceania</option>
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
					<!--<option value="region">Sort by Region Name</option>-->
					<option value="funds1">Sort by Funds (low to high)</option>
					<option value="funds2">Sort by Funds (high to low)</option>
				</select>
		</div>
		
	<br>
	<br>
	<br>
	<div class="result" id="result-template">
		<h3 class="result-name">Nonprofit Organization Name</h3>
		<span class="result-funds">Funds amount</span> <span>Funding: &nbsp;</span>
		<br>
		<br>
		<a href="">
		<input type="button" class="result-website" value="Website" target="_blank">
		</a>	
	
	</div>
</main>
	
	<button onclick="topFunction()" id="myBtn"></button>
	
	

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
                url: 'searchNPO.php',
                type: 'POST',
                data: {
                    table: 'NPOs',
                    entry: $('#key1').val(),
                    //searchAll: $('#all:checked').val(),
                    //searchRegion: $('#region:checked').val(),
                    regionSelect: $('#region_select').val(),
                    sortBy: $('#sort').val(),
                },
                datatype:'json',
                success: function(data){
					if(data=="NaN\n")
					{
						alert("No Results Found");
					}
                    var res = data.trim().split("~");
					res = res.slice(1);
					res=chunks(res, 3);
                    //alert(JSON.stringify(res));
					cloneDivs(res);
                }
            })
        });
    });
    function cloneDivs(payload){
	  payload.forEach(arr => {
		  clone = $("#result-template").clone().attr("id", "");
		  if(typeof arr[0]!=='undefined' && arr[0]!=='')
		  	clone.find(".result-name").text(arr[0]);
		  else
		  {
			  clone.find(".result-name").text("Nonprofit Organization Name");
		  }
		  if(arr[2]!=="Unknown" && typeof arr[2]!=='undefined')
		  {
			clone.find('.result-funds').text("$" + numberWithCommas(arr[2]));
		  }
		  else
		  {
			clone.find('.result-funds').text(arr[2]);
		  }
		  clone.find('.result-website').parent().attr("href",arr[1]);
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
