<?php
    require 'connect.php';
    $query ="SELECT author_id, concat_ws(' ', firstname, surname) AS fullname, surname, firstname FROM tbl_author ORDER BY surname, firstname";
    $con = pdo_homelibrary();
    $authors = $con->query($query);
    foreach ($authors as $au){
        echo '<a class="book-wrap" href="/dist/php/authordetails?aid='.urlencode($au['author_id']).'&name='.urlencode($au['fullname']).'">';
            echo '<div class="book-title">'.$au['fullname'].'</div>';
        echo '</a>';
    }
    $con = null;
?>