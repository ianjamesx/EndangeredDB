<?php
//if(!empty($_POST['name']) && !empty($_POST['binomial_nomenclature']) && !empty($_POST['url']) && !empty($_POST['population']))
//{
    $servername = "localhost";
    $username = "mmandulak1";
    $password = "mmandulak1";
    $db = "EndangeredAnimalsDB";
    $conn = mysqli_connect($servername, $username, $password, $db);
    if(!$conn)
    {
        die('<p> Could not connect to MySQL </p>');
    }
    $name = $_POST['name'];
    $bn = $_POST['bionmial_nomenclature'];
    $img = $_POST['url'];
    $population = $_POST['population'];
    $classification = $_POST['classification'];
    $lifespan = $_POST['lifespan'];
    if(!is_numeric($population) && !is_numeric($lifespan))
    {
        die('0');
    }
    $type = $_POST['type'];
    $watchlist = $_POST['watchlist'];
    $watchval;
    if(isset($watchlist) && $watchlist=="on")
    {
        $watchval = 1;
    }
    else
    {
        $watchval = 0;  
    } 
   //echo "$name + $bn + $img + $population + $type + $watchlist";

    $query="INSERT INTO Organisms VALUES('" . $name . "','" . $bn . "','" . $img . "'," . $watchval . "," . $population . ")"; 
    //echo "$query";
    if($type=="animal")
    {
        $query2="INSERT INTO Animals VALUES('" . $bn . "','" . $classification . "'," . $lifespan . ")"; 
    }
    else
    {
        $query2="INSERT INTO Plants VALUES('" . $bn . "'," . $lifespan . ")"; 
    }
    if(mysqli_query($conn,$query))
    {
        if(mysqli_query($conn,$query2))
        {
            echo "1";
        }
        else
        {
            echo "$query and $query2";
        }
    }
    else
    {
        echo "0";
    }
//}
?>