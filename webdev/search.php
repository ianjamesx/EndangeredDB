
<html>

  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ians homepage</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:500" rel="stylesheet">

  </head>

  <style>
    html, body {

      color: #323232;
      font-family: 'Roboto', helvetica, sans-serif;

    }

  	h1 {
  		font-size: 3em;
  	}

  	h2 {
  		font-size: 2em;
  	}

  	h3 {
  		font-size: 1.5em;
  	}

    h4 {
      font-size: 1.2em;
    }

    li{
      font-size: 1.4em;
    }


    #hero {
    	background-image: linear-gradient(141deg, #83a4d4 0%, #b6fbff 90%);
      color: #494949;
      width: 100vw;
      height: 100vh;
    }

    #hero h1 {
    	font-size: 50px;
    	font-weight: 300;
    }

    .card {
    background-color: rgba(255,255,255, 0.6) !important;
  }

  </style>

  <body>

    <section id="hero">
      <div class="container content-box hero-content">
        <span style="display:block; height: 30px;"></span>
        <h1>Welcome</h1>
        <span style="display:block; height: 50px;"></span>
        <h2>You can use the search bar below to search for the following products:</h2>
        <ul>
          <li>PCs</li>
          <li>Laptops</li>
          <li>Printers</li>
        </ul>
        <span style="display:block; height: 30px;"></span>
        <h3>Use the input below to search</h3>
        <span style="display:block; height: 30px;"></span>

        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="search">Search</label>
            <input type="text" class="form-control" id="search" placeholder="Search terms">
          </div>
          <div class="form-group col-md-3">
            <label for="product">Product</label>
            <select id="product" class="form-control">
              <option selected>PC</option>
              <option>Laptop</option>
              <option>Printer</option>
              <option>All</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </div>

        <?php
          $servername = "localhost";
          $username = "ithomas3";
          $password = "ithomas3";

          // Create connection
          $conn = mysqli_connect($servername, $username, $password, 'ithomas3DB');

          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: ".$conn->connect_error);
          }
          echo "Connected successfully";
        ?>


      </div>
    </section>

  </body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</html>
