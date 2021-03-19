<?php
require 'scripts.php';

function get_publisher($id){
    $publishers = get_publishers();
    foreach ($publishers as $p){
        if ($p['publisher_id'] == $id){
            return $p['name'];
        }
    }
}

function get_category($id){
    $categories = get_categories();
    foreach ($categories as $p){
        if ($p['category_id'] == $id){
            return $p['description'];
        }
    }
}

function get_translator($id){
    $translators = get_translators();
    foreach ($translators as $t){
        if ($t['translator_id'] == $id){
            return $t['fullname'];
        }
    }
}

function get_grafi($id){
    $grafi = get_eidosgrafis();
    foreach ($grafi as $g){
        if ($g['eidos_grafis_id'] == $id){
            return $g['description'];
        }
    }
}

function get_author($id){
    $authors = get_authors();

    foreach ($authors as $a){
        if ($a['author_id'] == $id){
            return $a['fullname'];
        }
    }
}

function set_string($txt, $count=20){

    if (strlen($txt)==0){
        return false;
    }

     $array = explode(' ', $txt, $count);
     $res = "";
     for ($i=0;$i<sizeof($array)-1; $i++){
         $res .= $array[$i]." ";
     }
     return trim($res, " ");
 }


?>