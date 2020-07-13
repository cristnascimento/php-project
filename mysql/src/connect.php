 <?php
$servername = "localhost";
$username = "php";
$password = "php";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully\n";
?> 