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

$all = $_POST['all'];
$animalSearch = $_POST['animalSearch'];
$plantSearch = $_POST['plantSearch'];
$regionSelect = $_POST['regionSelect'];
$biomeSelect = $_POST['biomeSelect'];
$population = $_POST['population'];
$dangers = $_POST['dangers'];
$entry = $_POST['entry'];
$sortBy = $_POST['sortBy'];

$searchField=0;
$searchRegion=0;
$searchBiome=0;
$searchPop=0;
$searchDangers=0;
$searchAnimals=0;
$searchPlants=0;
$searchMorePop=0;
//echo "$all + $animalSearch + $plantSearch + $regionSelect + $biomeSelect + $population + $dangers + $entry + $sortBy";

if($animalSearch=='' || $all=='all')
{
    $searchAnimals=1;
}
if($plantSearch=='' || $all=='all')
{
    $searchPlants=1;
}
if($entry=='')
{
    $searchField=1;
}
if($regionSelect=='all')
{
    $searchRegion=1;
    $regionSelect='';
}
if($biomeSelect=='all')
{
    $searchBiome=1;
    $biomeSelect='';
}
if($population==0)
{
    $searchPop=1;
}
if($dangers=='all')
{
    $searchDangers=1;
    $dangers='';
}
if($population==1000001)
{
    $searchPop=1;
}
else
{
    $searchMorePop=1;
}

$query = "select Name, Organisms.Binomial_Nomenclature, Picture, Population, Danger, NPO, Region, Biome from Organisms inner join Affected_By on Organisms.Binomial_Nomenclature=Affected_By.Binomial_Nomenclature inner join Helps on Organisms.Binomial_Nomenclature=Helps.Binomial_Nomenclature inner join Lives_In on Organisms.Binomial_Nomenclature=Lives_In.Binomial_Nomenclature where (($searchField || Name LIKE '%$entry%') OR ($searchField || NPO LIKE '%$entry%') OR ($searchField || Organisms.Binomial_Nomenclature LIKE '%$entry%')) AND ($searchRegion || Region like '%$regionSelect%') AND ($searchBiome || Biome like '%$biomeSelect%') AND ($searchPop || Population<=$population) AND ($searchMorePop || Population>=$population) AND ($searchDangers || Danger like '%$dangers%') AND ($searchAnimals || Type='Animal') AND ($searchPlants || Type='Plant')";
if($sortBy=="name_a")
{
    $query = $query . " ORDER BY Name ASC";
}
else if($sortBy=="name_z")
{
    $query = $query . " ORDER BY Name DESC";
}
else if ($sortBy=="pop_1")
{
    $query = $query . " ORDER BY Population ASC";
}
else if($sortBy=="pop_2")
{
    $query = $query . " ORDER BY Population DESC";
}
//echo "$query";
$result = mysqli_query($conn, $query);
$rownNum=0;
$outputArr = array();
while($row = mysqli_fetch_array($result))
{
    $rownNum++;
    $inArr = array_search($row['Binomial_Nomenclature'],$outputArr,true);
    if($inArr!='')
    {
        $inArr=$inArr+3;
        //echo "-$outputArr[$inArr]-";
        if(strpos($outputArr[$inArr], $row['Danger'])!==false)
        {  
        }
        else
        {
            $outputArr[$inArr] = $outputArr[$inArr] . ", " . $row['Danger'];
        }
        $inArr=$inArr+1;
        if(strpos($outputArr[$inArr], $row['NPO'])!==false)
        {  
        }
        else
        {
            $outputArr[$inArr] = $outputArr[$inArr] . ", " . $row['NPO'];
        }
        $inArr=$inArr+1;
        if(strpos($outputArr[$inArr], $row['Region'])!==false)
        {  
        }
        else
        {
            $outputArr[$inArr] = $outputArr[$inArr] . ", " . $row['Region'];
        }
        
    }
    else
    {
        $row['Region'] = $row['Region'] . ", " . $row['Biome'];
        $row['Population'] = "Population: " . $row['Population'];
        $row['Danger'] = "Dangers: " . $row['Danger'];
        $row['Region'] = "Region: " . $row['Region'];
        $row['NPO'] = "NPO: " . $row['NPO'];
    array_push($outputArr, $row['Name'], $row['Binomial_Nomenclature'], $row['Picture'],
        $row['Population'], $row['Danger'], $row['NPO'], $row['Region']);        
    }
}
echo "$rownNum~";
$arrlength = count($outputArr);
for($x = 0; $x <$arrlength;$x++)
{
    echo $outputArr[$x];
    if($x != $arrlength-1)
        echo "~";

}
?>