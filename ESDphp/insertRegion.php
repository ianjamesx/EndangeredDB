<?php
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
    $biome = $_POST['biome'];
    $query = "INSERT INTO Region VALUES('" . $name . "','" . $biome . "')";
    if(mysqli_query($conn,$query))
    {
        echo '1';
    }
    else
    {
        echo '0';
    }
?>