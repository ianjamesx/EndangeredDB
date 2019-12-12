<?php
$servername = "localhost";
$username = "mmandulak1";
$password = "mmandulak1";
$db = "EndangeredAnimalsDB";

$query = "SELECT * FROM ";
$table1 = "";
$table2 = "";
$conn = mysqli_connect($servername, $username, $password, $db);
if(!$conn)
{
    die('<p> Could not connect to MySQL </p>');
}
else
{
    echo 'connected to DB<br>';
}
$q =$_GET["q"];
echo "<br> q: $q <br>";
$inputarr = explode(" ", $q);
echo "you selected $inputarr[0]";
echo "<br>";
echo "searchVal = $inputarr[1]";
$query = "SELECT * FROM Dangers where " . $inputarr[0] . "='" . $inputarr[1] . "'";
echo "<br> $query";
?>