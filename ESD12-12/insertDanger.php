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
    $watchlist = $_POST['watchlist'];
    $watchval=0;
    if($watchlist=="on")
    {
        $watchval = 1;
    }
    $query = "INSERT INTO Dangers VALUES('" . $name . "'," . $watchval . ")";
    if(mysqli_query($conn,$query))
    {
        echo "1";
    }
    else
    {
        echo "0";
    }
    mysql_close();
?>