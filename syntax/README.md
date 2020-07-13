# PHP Syntax

## Hello World
hello.php
```php
<?php
echo "Hello World!";
?>
```

You can also use `print`. The difference is subtle and you don't need to know now.
## Run script

```
$ php hello.php
```
## Echo concat

concat.php
```php
<?php
$name = "John";
echo "Hello ".$name."!";
?>
```

## Data Types

types.php
```php
<?php

class Fruit {
  function Fruit() {
    $this->name = "banana";
  }
}

$string = "Your name";
echo $string;

$int = 30;
echo $int;

$float = 3.14;
echo $float;

$true = true;
echo $true."\n";

$array = array("apple", "pear", "banana");
var_dump($array);

$obj = new Fruit();
echo $obj->name;
?>
```

## If ... Else

ifelse.php
```php
<?php

$a = "john";
$b = "john";
$c = true;

if ($a == $b && $c) {
  echo "Hi John\n";
} elseif ($c) {
  echo "c is true\n";
}

$a = "john";
$b = "mary";

if ($a == "bob" || $b == "mary") {
  echo "Hi Mary\n";
}
?>
```

## Loops

loops.php
```php
<?php

for ($i = 0; $i < 5 ; $i++) {
  echo "$i\n";
}

$x = 3;
while ($x > 0) {
  echo "$x\n";
  $x--;
}

$fruits = array("apple", "pear", "banana");

foreach ($fruits as $value) {
  echo "$value \n";
}

?>
```