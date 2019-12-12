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
$entry = $_POST['entry'];
$regionSelect = $_POST['regionSelect'];
$sortBy = $_POST['sortBy'];
$searchRegion = 0;
$searchFunding = 0;
$searchText = 0;
$fundNum=0;
//$query = "select distinct Name, Link, Funding FROM (SELECT * FROM NPOs INNER JOIN Located on Name=NPO) as N WHERE ";

if($entry=='')
{
    $searchText=1;
    $searchFunding=1;
}
else if(is_numeric($entry))
{
    $fundNum=$entry;
}
else
{
    $searchFunding=1;
}
if($regionSelect=='all')
{
    $searchRegion=1;
}
$query = "select distinct Name, Link, Funding FROM (SELECT * FROM NPOs INNER JOIN Located on Name=NPO) as N where ($searchRegion || Region like '%$regionSelect%') && ($searchText || Name LIKE '%$entry%') && ($searchFunding || Funding<=$fundNum)";

if($sortBy=="name_a")
{
    $query = $query . " ORDER BY Name ASC";
}
else if($sortBy=="name_z")
{
    $query = $query . " ORDER BY Name DESC";
}
else if ($sortBy=="funds1")
{
    $query = $query . " ORDER BY Funding ASC";
}
else
{
    $query = $query . " ORDER BY Funding DESC";
}
echo "$query";
$result = mysqli_query($conn, $query);
$rownNum=0;
$outputArr = array();
while($row = mysqli_fetch_array($result))
{
    $rownNum++;
    if($row['Funding']=="")
    {
        //echo "" . $row['Name'] . "~" . $row['Link'] . "~" . "Unknown~";
        array_push($outputArr, $row['Name'], $row['Link'], 'Unknown');
    }
    else
    {
        //echo "" . $row['Name'] . "~" . $row['Link'] . "~" . $row['Funding'] . "~";
        array_push($outputArr, $row['Name'], $row['Link'], $row['Funding']);        
    }
}
if($rownNum!=0){
    echo "$rownNum~";
}
else
{
    echo "NaN";
}
    $arrlength = count($outputArr);
for($x = 0; $x <$arrlength;$x++)
{
    echo $outputArr[$x];
    if($x != $arrlength-1)
        echo "~";

}


?>

