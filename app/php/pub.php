<?php
require 'scripts.php';


function publisher(){
    $publishers = get_publishers();
    foreach ($publishers as $p){
        if ($p['publisher_id'] == $_GET['p']){
            echo $p['name'];
            exit;
        }
    }
    return $p['name'];
}
publisher();
?>