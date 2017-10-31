<!DOCTYPE html>
<html>
<head>
    <title>Startsiden.dk</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="themes/blue/style.css">


</head>
<body>
<header><?php include("nav.php"); ?></header>


<h1>Startsiden.dk</h1>
    <p>Indtast en ny hjemmeside: </p>


<form action="indtast.php" method="get">
    Hjemmesidens navn: <input type="text" name="navn"><br>
    URL: <input type="text" name="url"><br>
    Kategori: <input type="text" name="kategori"><br>
    <input type="submit">
</form>


<?php
// DEBUG
$navn =  $_GET["navn"];
$url = $_GET["url"];
$kategori = $_GET["kategori"];


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "startsiden2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// OBS, denne løsning er sårbar overfor SLQ injections! Bør fikses inden release!

$sql = "INSERT INTO hjemmesider (id, navn, URL, dato) VALUES (NULL, '". $navn . "', '" . $url . "', NULL);";
// echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Nyt link oprettet i databasen. Tjek forsiden for at se det nye link.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


    $conn->close();
?>
    </tbody></table>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="__jquery.tablesorter/jquery.tablesorter.min.js"></script>
<script>
    $(document).ready(function()
        {
            $("#myTable").tablesorter();
        }
    );
</script>
</body>
</html>