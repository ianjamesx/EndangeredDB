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
    $link = $_POST['link'];
    $funding = $_POST['funding'];
    if(!is_numeric($funding))
    {
        die('0');
    }
    $query = "INSERT INTO NPOs VALUES('" . $name . "','" . $link . "'," . $funding . ")";
    $worked = 1;
    $no = 0;
    if(mysqli_query($conn,$query))
    {
        echo "$worked";
    }
    else
    {
        echo "$no";
    }
    //mysql_close();
?>