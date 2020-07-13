 <?php
$servername = "localhost";
$username = "php";
$password = "php";
$dbname = "phpdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$stmt = mysqli_prepare($conn, 'UPDATE workers SET category = ?, salary = ? WHERE name = ?');
mysqli_stmt_bind_param($stmt, 'sds', $category, $salary, $name);

$name = "Peter";
$category = "C++";
$salary = 13000;
$result = mysqli_stmt_execute($stmt);

if ($result === true) 
  echo "Updated!\n";

$conn->close();

?> 