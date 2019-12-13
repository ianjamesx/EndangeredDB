<?php
	session_start();
	?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dangers - Endangered Species Database</title>
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

	<p>Learn more about the Dangers that are affecting many different species around the world. You can also search <a href="search.html" class="lineLink">Endangered Species</a> or <a href="nonprofit.html" class="lineLink">Nonprofit Organizations</a> separately on those pages.</p>

	<h1>Dangers Affecting Species:</h1>
	<span style="display:block; height: 30px;"></span>
	
	<div class="dangertab">
	  	<button class="dangerlinks" onclick="switchtab(event, 'climate')" id="defaultOpen">Climate Change</button>
	  	<button class="dangerlinks" onclick="switchtab(event, 'deforest')">Deforestation</button>
	 	<button class="dangerlinks" onclick="switchtab(event, 'disease')">Disease</button>
		<button class="dangerlinks" onclick="switchtab(event, 'habitat')">Habitat Loss</button>
		<button class="dangerlinks" onclick="switchtab(event, 'invasive')">Invasive Species</button>
		<button class="dangerlinks" onclick="switchtab(event, 'exploit')">Overexploitation</button>
		<button class="dangerlinks" onclick="switchtab(event, 'pollution')">Pollution</button>
	</div>


	
	<span style="display:block; height: 30px;"></span>
	
<!--description from each different danger,
	appears/changes when user clicks on each one-->
	<div id="climate" class="dangercontent">
		<div class="box">
			<h2>Climate Change</h2>
				<hr>
			<p>Climate Change is a broad term used to describe the changes in the weather patterns of the earth and their effects.
			 The main cause of these changes is human use of fossil fuels and the emission of greenhouse gases
			 into the atmosphere. The causes and effects of climate change are all tied together in a visious
		 	 cycle surrounding humans and their decisions and efforts. <br/>
			Deforestation, over exploitation of resources, and pollution from human production and consumption
			 are all considered causes of global climate change. The effects include rising sea levels, habitat loss, changes in
		 	 percipitation, and increases in extreme weather events. All of these effects have the potential to negatively affect
			 species of all kinds around the world.</p>
			<a href="search.html">
				<input type="button" value="See Animals Affected">
			</a>
		</div>
	</div>
	
	<div id="deforest" class="dangercontent">
		<div class="box">
			<h2>Deforestation</h2>
			<hr>
			<p>Deforestation describes the permanent mass removal of trees. Most deforestation today is happening in 
			the tropics to make room for agriculture or cattle grazing. Forests in these areas are home to about 80% 
			of all terrestrial biodiversity, and the violent destruction of these landscapes has greatly impacted the 
			species of animals, plants, fungi, and microbes living there. About 3.9 million square miles of forest have been 
			lost since the beginning of the 20th century.</p>
			<a href="search.html">
				<input type="button" value="See Animals Affected">
			</a>
		</div>
	</div>
	
	<div id="disease" class="dangercontent">
		<div class="box">
			<h2 id="type_disease">Disease</h2>
			<hr>
			<p>Diseases normally coexist with animals or plants without causing any significant harm to their 
			populations. However, sudden outbreaks of disease within a species can threaten popoulations with 
			drastic decline and/or extinction in some cases.</p>
			<a href="search.html">
				<input type="button" value="See Animals Affected">
			</a>
		</div>
	</div>
	
	<div id="habitat" class="dangercontent">
		<div class="box">
			<h2 id="type_habitat">Habitat Loss</h2>
			<hr>
			<p>Habitat loss occurs when a natural habitat is changed and is no longer able to support the species 
			living there. The main causes of Habitat loss are pollution, invasive species, deforestation, and forest fires. 
			Species living in a habitat that has been so severely impacted are forced to either migrate or else face severe
			decline in population and /or extinction.</p>
			<a href="search.html">
				<input type="button" value="See Animals Affected">
			</a>
		</div>
	</div>
	
	<div id="invasive" class="dangercontent">
		<div class="box">
			<h2 id="type_invasive">Invasive Species</h2>
			<hr>
			<p>Invasive species are to blame for about 42% of all threatened or endangered species. An invasive species 
			is any species that is not native to an ecosystem and causes harm. These species will reproduce quickly and 
			spread aggressively throughout an ecosystem where there are no natural predators to keep their population 
			in check. By using up resources and/or preying on native species, invasive species can topple entire ecosystems.</p>
			<a href="search.html">
				<input type="button" value="See Animals Affected">
			</a>
		</div>
	</div>
	
	<div id="exploit" class="dangercontent">
		<div class="box">
		<h2 id="type_exploit">Overexploitation</h2>
			<hr>
		<p>Overexploitation refers to the overharvesting or overhunting of species to the point of near population extinction. 
		Examples of overexploitation include the illegal hunting of wild animals for fur, meat, or sport; insect or shell collectors; 
		and the trapping of animals to sell as novelty pets.</p>
			<a href="search.html">
				<input type="button" value="See Animals Affected">
			</a>
		</div>
	</div>
	
	<div id="pollution" class="dangercontent">
		<div class="box">
			<h2 id="type_pollution">Pollution</h2>
				<hr>
			<p>Air pollution from the burning of fossil fuels is one the cause of climate change amoung other negative 
			effects on species and ecosystems. Pollution in the form of pesticides and fertilizers has caused more 
			immediate harm on organisms too. The world's chemical production has increased 400 fold since 1930. Those 
			chemicals are washed into nearby streams and waterways, killing benefitial organisms while feeding explosive 
			growths of algae that deplete the water of oxygen.</p>
			<a href="search.html">
				<input type="button" value="See Animals Affected">
			</a>
		</div>
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
function switchtab(evt, danger) {
  var i, dangercontent, dangerlinks;
  dangercontent = document.getElementsByClassName("dangercontent");
  for (i = 0; i < dangercontent.length; i++) {
    dangercontent[i].style.display = "none";
  }
  dangerlinks = document.getElementsByClassName("dangerlinks");
  for (i = 0; i < dangerlinks.length; i++) {
    dangerlinks[i].className = dangerlinks[i].className.replace(" active", "");
  }
  document.getElementById(danger).style.display = "block";
  evt.currentTarget.className += " active";
}
	document.getElementById("defaultOpen").click();
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
