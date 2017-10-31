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
    <p>Her kommer alle links fra Startsiden.dk. I øvrigt, jeg følger denne tutorial: <a href="https://www.w3schools.com/php/php_mysql_select.asp">https://www.w3schools.com/php/php_mysql_select.asp</a> </p>


<table id="myTable" class="tablesorter">
    <thead><tr><th>ID</th><th>Hjemmeside</th></tr></thead><tbody>
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
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["navn"]. " " . $row["URL"] . "<br>";
        echo "<tr>";
        echo "<td>";
        echo  $row["id"];
        echo "</td>";
        echo "<td><a href='";
        echo  $row["URL"];
        echo "' tar>";
        echo  $row["navn"];
        echo "</a></td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
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