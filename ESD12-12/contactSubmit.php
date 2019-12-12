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
    $q = $_GET["q"];
    $inputarr = explode("~", $q);
    $name = $inputarr[0];
    $email = $inputarr[1];
    $msg = $inputarr[2];
    $date = date("Y-m-d");
    $query = "INSERT INTO Comments VALUES(" . "'" . $name . "','" . $email . "','" . $msg . "','" . $date . "')";
    if(mysqli_query($conn,$query))
    {
        echo "Thank you for your response";
    }


/*
$name = $_POST["contact1"];
$email = $_POST["contact2"];
$msg = $_POST["contact3"];

echo "$name and $email and $msg";*/

?>