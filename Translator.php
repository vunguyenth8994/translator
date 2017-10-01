<?php

/**
 * @package Translator
 * @version 1.0.0 
 * @author Le Chi Huy
*/

$i = 0;

function __($string) {
  global $locale, $i;

  if (file_exists("lang/$locale.json")) {
    $dir = file_get_contents("lang/$locale.json");
    $dir = json_decode($dir, true)[$i];
    $element = array_search($string, $dir);

    if ($element) {
      $index = substr($element, strpos($element, "#") + 1);
      echo $dir['target#' . $index];
    } else {
      echo $string;
    }
    $i++;
  } else {
    echo $string;
  }
}

?>