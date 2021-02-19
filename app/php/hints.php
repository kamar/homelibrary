<?php
require "scripts.php";

$isbns =  get_isbns();

$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $len=strlen($q);
  foreach($isbns as $isbn) {
    if (stristr($q, substr($isbn, 0, $len))) {
      if ($hint === "") {
        $hint = $isbn;
      } else {
        $hint .= ", $isbn";
      }
    }
  }
}

?>