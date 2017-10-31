<?php
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

$sql = "SELECT id, navn, URL FROM hjemmesider";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    echo "{";
    while($row = $result->fetch_assoc()) {

        $obj = new stdClass();
        $obj->id=$row["id"];
        $obj->navn = $row["navn"];
        $link->navn = $row["url"];

        echo '"item'.$obj->id.'" : ' .json_encode($obj) . ",";
    }
} else {
    echo "0 results";
}
echo '"final" : 1';
echo "}";

$conn->close();
?>