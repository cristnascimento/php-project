 <?php
$servername = "localhost";
$username = "php";
$password = "php";
$dbname = "phpdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$stmt = mysqli_prepare($conn, 'INSERT INTO workers (name, category, salary) VALUES (?, ?, ?)');
mysqli_stmt_bind_param($stmt, 'ssd', $name, $category, $salary);

$name = "Ben";
$category = "C++";
$salary = 13000;
$result = mysqli_stmt_execute($stmt);

$name = "Wiliam";
$category = "Perl";
$salary = 11800;
$result = mysqli_stmt_execute($stmt);

$name = "Tiffany";
$category = "C++";
$salary = 14000;
$result = mysqli_stmt_execute($stmt);

$name = "Viola";
$category = "C++";
$salary = 13400;
$result = mysqli_stmt_execute($stmt);

// checks if last one was inserted
if ($result === true) 
  echo "Inserted!\n";

$conn->close();

?> 