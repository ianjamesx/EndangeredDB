<?php
session_start();

$servername = "localhost";
$username = "mmandulak1";
$password = "mmandulak1";
$db = "EndangeredAnimalsDB";
$conn = mysqli_connect($servername, $username, $password, $db);
if(!$conn)
{
    die("Connection failed");
}
/*$q = $_REQUEST["q"];
//echo "<br> q :$q <br>";
$inputarr = explode(" ", $q);
$user = $inputarr[0];
$pass = $inputarr[1];*/
//echo "<br>$user<br>$pass<br>";
$user = $_POST['email'];
$pass = $_POST['password'];
$hash = strval(password_hash($pass, PASSWORD_DEFAULT));
//var_dump($hash);    
//echo "<br>$hash<br>";
//echo strlen($hash);
$query = "SELECT pass FROM Accounts WHERE email=";
$query = $query . "'" . $user . "'";
$result = mysqli_query($conn,$query);
//echo "<br>$query<br>";
$passInDB='';
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "pass: " . $row["pass"] . "<br>";
        $passInDB=$row["pass"];
    }
} else {
    echo "0 results";
}
//echo "<br>$passInDB<br>";
/*$query = "SELECT COUNT(*) FROM Accounts WHERE email='";
$query = $query . $user. "'" . " AND pass='" . $hash . "'";
echo "<br>$query";
$result = mysqli_query($conn,$query);
echo "<br>$result";*/
if(password_verify($pass,$passInDB))
{
    $_SESSION['user_id'] = $user;
    header("Location: http://acadweb1.salisbury.edu/~mmandulak1/ESD/testpage.php");
}
else
{
    header("Location: http://acadweb1.salisbury.edu/~mmandulak1/ESD/loginfail.html");
}

?>
