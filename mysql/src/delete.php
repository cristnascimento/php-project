 <?php
$servername = "localhost";
$username = "php";
$password = "php";
$dbname = "phpdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$stmt = mysqli_prepare($conn, 'DELETE FROM workers WHERE name = ?');
mysqli_stmt_bind_param($stmt, 's', $name);

$name = "Mark";
$result = mysqli_stmt_execute($stmt);

if ($result === true) 
  echo "Deleted!\n";

$conn->close();

?> 