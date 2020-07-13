# PHP + MySQL Tutorial

We should use [MySQLi](https://www.php.net/manual/pt_BR/book.mysqli.php) or [PDO] according to [PHP.net](https://www.php.net/manual/pt_BR/mysql.requirements.php).

## Install MySQLi

```
sudo apt-get install php-mysql
```

It'll automatically enable the mysqli extension for the PHP because connect using mysql is deprecated in PHP 7 ~ from [StackOverflow](https://stackoverflow.com/questions/54500881/how-do-i-enable-mysqli-for-my-php-script/54501457)

or 

```
$ sudo apt-get install -y php-mysqli
```
from [ZoomAdmin](https://zoomadmin.com/HowToInstall/UbuntuPackage/php-mysqli)

## Create a database

```sql
mysql> CREATE DATABASE phpdb;
```

## Create a user

```sql
mysql> CREATE USER 'php'@'localhost' IDENTIFIED BY 'php';
mysql> GRANT ALL PRIVILEGES ON phpdb . * TO 'php'@'localhost';
mysql> FLUSH PRIVILEGES;
```
## Create table
```sql
mysql> use phpdb;
```

```sql
mysql> CREATE TABLE workers (name VARCHAR(50), category VARCHAR(10), salary FLOAT);
```

## Load data into table

select database
```sql
mysql> use phpdb;
```

Load data from csv file

```sql
mysql> LOAD DATA LOCAL INFILE '/path/workers.txt' INTO TABLE workers FIELDS TERMINATED BY ',';
```

workers.txt
```txt
John,Python,10500
Peter,Javascript,11200
Mark,Ruby,13000
Anne,PHP,11400
Sammy,Javascript,12800
Alicia,Ruby,17000
Mary,Python,11400
Tina,PHP,9500
Bob,PHP,8000
Kirst,Python,12000
```

or
```sql
mysql> INSERT INTO workers VALUES ('John', 'Python', 10500);
mysql> INSERT INTO workers VALUES ('Peter', 'Javascript', 11200);
mysql> INSERT INTO workers VALUES ('Mark', 'Ruby', 13000);
mysql> INSERT INTO workers VALUES ('Anne', 'PHP', 11400);
mysql> INSERT INTO workers VALUES ('Sammy', 'Javascript', 12800);
mysql> INSERT INTO workers VALUES ('Alicia', 'Ruby', 17000);
mysql> INSERT INTO workers VALUES ('Mary', 'Python', 11400);
mysql> INSERT INTO workers VALUES ('Tina', 'PHP', 9500);
mysql> INSERT INTO workers VALUES ('Bob', 'PHP', 8000);
mysql> INSERT INTO workers VALUES ('Kirst', 'Python', 12000);
```
## Connect

connect.php
```php
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
```
run
```
$ php connect.php
```
## Select 

select.php
```php
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
```

## Update

update.php
```php
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
```

## Delete

delete.php
```php
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
```
## Learn more

* [Tutorial from W3Schools](https://www.w3schools.com/php/php_mysql_intro.asp)
* [MySQLi Documentation](https://www.php.net/manual/pt_BR/book.mysqli.php) from PHP.net
* [MYSQL_STMT](https://www.php.net/manual/pt_BR/mysqli-stmt.get-result.php)