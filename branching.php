<?php
require "functions.php";
$x = "Kaķene";
// pārbauda vai  x eksistē un y iedot x vērtību
/*if (isset($x)) {
  $y = $x;
} else {
  $y = "Ups!";
}*/
// pārbauda  vai pārbaude ir patiesa  
//$y = isset($x) ? $x : "Ups!";
$y = $x ?? "Ups!";
// Šis jau ārpus paša if, vienkārši parādu, ka izvadu $y
dd($y);