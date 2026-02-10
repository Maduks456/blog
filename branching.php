<?php
require "functions.php";
$x = "Kaķene";
// pārbauda vai  x eksistē un y iedot x vērtību
/*if (isset($x)) {
  $y = $x;
} else {
  $y = "Ups!";
}*/
// pārbauda  vai pārbaude ir patiesa  ternārais operators
//$y = isset($x) ? $x : "Ups!";
// null-coalescing operators
$y = $x ?? "Ups!";
// Šis jau ārpus paša if, vienkārši parādu, ka izvadu $y
dd($y);