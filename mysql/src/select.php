 <?php
$servername = "localhost";
$username = "php";
$password = "php";
$dbname = "phpdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT * FROM workers";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
  var_dump($row);
}

// Select one preventing SQL Injection

$stmt = mysqli_prepare($conn, 'SELECT * FROM workers WHERE name = ?');
mysqli_stmt_bind_param($stmt, 's', $name);

$name = "Mark";
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_array($result, MYSQLI_NUM))
{
  var_dump($row);
}

$conn->close();

?> 