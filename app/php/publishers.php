<?php
    require 'connect.php';
    $query = "SELECT publisher_id, name FROM tbl_publisher ORDER BY name";
    $con = pdo_homelibrary();
    $publishers = $con->query($query);

    foreach ($publishers as $p) {
        echo '<a class="book-wrap" href="/dist/php/publisherdetails?pid='.urlencode($p['publisher_id']).'">';
            echo '<div class="book-title">'.$p['name'].'</div>';
        echo '</a>';
    }
?>