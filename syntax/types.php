<?php

class Fruit {
  function Fruit() {
    $this->name = "banana";
  }
}

$string = "Your name";
echo $string."\n";

$int = 30;
echo $int."\n";

$float = 3.14;
echo $float."\n";

$true = true;
echo $true."\n";

$array = array("apple", "pear", "banana");
var_dump($array);

$obj = new Fruit();
echo $obj->name."\n";
?>