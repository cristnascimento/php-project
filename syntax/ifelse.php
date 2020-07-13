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