<?php
    require 'connect.php';
    $query = "SELECT translator_id, concat_ws(' ', firstname, surname) AS fullname FROM tbl_translator ORDER BY surname, firstname";
    $con = pdo_homelibrary();
    $translators = $con->query($query);

    foreach ($translators as $tr) {
        echo '<a class="book-wrap" href="/dist/php/translatordetails?trid='.urlencode($tr['translator_id']).'">';
            echo '<div class="book-title">'.$tr['fullname'].'</div>';
        echo '</a>';
    }
?>