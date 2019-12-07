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
    $limit = date("Y-m-d",strtotime("-1 week"));
    $query = "SELECT * FROM Comments WHERE date>='" . $limit . "'";
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['date'] . " </td>";
        echo "<td>" . $row['message'] . " </td>";
        echo "<td>" . $row['name'] . " </td>";
        echo "<td>" . $row['email'] . " </td>";
        echo "</tr> <br>";
    }
?>
