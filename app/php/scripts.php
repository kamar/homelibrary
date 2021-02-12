<?php
include "connect.php";

function get_author(){
    $con = con_homelibrary();
    $query = "SELECT author_id, concat_ws(' ', firstname, surname) AS fullname FROM tbl_author ORDER BY author_id";
    $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
    $authors = pg_fetch_all($rs);
    return $authors;
}
$authors = get_author(); 
foreach($authors as $a){
    echo $a['author_id'].' '.$a['fullname'];
    echo "\n";
}
?>
