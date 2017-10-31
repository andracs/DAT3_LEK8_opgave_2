<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="2;url=admin.php" />

</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: andrasacs
 * Date: 31/10/2017
 * Time: 13.13
 */
$skalSlettesID = $_GET["id"];

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

$sql = "DELETE FROM hjemmesider WHERE id = " . $skalSlettesID;
// echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "Linket er slettet. Videresender til admin igen... ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>


</body>
</html>