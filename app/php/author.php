<?php
require 'scripts.php';

$authors = get_authors();

foreach ($authors as $a){
    if ($a['author_id'] == $_GET['a']){
        echo $a['fullname'];
        exit;
    }
}
?>