<?php
include "connect.php";

function get_authors(){
    $con = con_homelibrary();
    $query = "SELECT author_id, concat_ws(' ', firstname, surname) AS fullname FROM tbl_author ORDER BY author_id";
    $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
    $authors = pg_fetch_all($rs);
    return $authors;
}

function get_publishers(){
    $con = con_homelibrary();
    $query = "SELECT publisher_id, name FROM tbl_publisher ORDER BY publisher_id";
    $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
    $publishers = pg_fetch_all($rs);
    return $publishers;
}

function get_categories(){
    $con = con_homelibrary();
    $query = "SELECT category_id, description FROM tbl_categories ORDER BY category_id";
    $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
    $categories = pg_fetch_all($rs);
    return $categories;
}

function get_translators(){
    $con = con_homelibrary();
    $query = "SELECT translator_id, concat_ws(' ', firstname, surname) AS fullname FROM tbl_translator ORDER BY translator_id";
    $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
    $translators = pg_fetch_all($rs);
    return $translators;
}

function get_eidosgrafis(){
    $con = con_homelibrary();
    $query = "SELECT eidos_grafis_id, description FROM tbl_eidos_grafis ORDER BY eidos_grafis_id";
    $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
    $eidosgrafis = pg_fetch_all($rs);
    return $eidosgrafis;
}

function get_isbns(){
    $con = con_homelibrary();
    $query = "SELECT isbn FROM tbl_books ORDER BY isbn LIMIT 10";
    $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
    $isbns = pg_fetch_all($rs);
    
    $nisbns = [];
    foreach ($isbns as $b){
        $nisbns[] = $b['isbn'];
    }
    return $nisbns;
}
// $publishers = get_publishers(); 
// foreach($publishers as $a){
//     echo $a['publisher_id'].' '.$a['name'];
//     echo "\n";
// }
?>
