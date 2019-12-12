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
    $table = $_POST['table'];
    $query = "DELETE FROM $table WHERE ";
    $queryO;
    $queryA;
    $queryP;
    switch($table)
    {
        case "Organisms":
            $bn = $_POST['binomial_nomenclature'];
            $queryO = $query . "Binomial_Nomenclature = '" . $bn . "'";
            $queryA = "DELETE FROM Animals WHERE Binomial_Nomenclature = '" . $bn . "'";
            $queryP = "DELETE FROM Plants WHERE Binomial_Nomenclature = '" . $bn . "'";
        break;
        case "Dangers":
            $name = $_POST['name'];
            $query = $query . "Name = '" . $name . "'";
        break;
        case "Region":
            $rName = $_POST['name'];
            $biome = $_POST['biome'];
            $query = $query . "Name = '" . $rName . "' AND Biome ='" . $biome . "'";
        break;
        case "NPOs":
            $nName = $_POST['name'];
            $query = $query . "Name = '" . $nName . "'";
        break;
    }
    if($table!="Organisms")
    {
        if(mysqli_query($conn,$query))
        {
            echo "1";
        }
        else
        {
            echo "0";
        }
    }
    else
    {
        if(mysqli_query($conn,$queryA) || mysqli_query($conn,$queryP))
        {
            if(mysqli_query($conn,$queryO))
            {
                echo '1';
            }
            else
            {
                echo '0';
            }
        }
        else
        {
            echo '0';
        }
    }
?>