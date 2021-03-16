<?php
    $q = $_REQUEST["q"];

    $hint = "<h2>Βιβλία</h2>";

    require 'connect.php';
    $query = " SELECT isbn, title FROM tbl_books WHERE translator_id = :publisherid ORDER BY isbn";
    $con = pdo_homelibrary();
    
    $result = $con->prepare($query);
    $result->bindParam(':publisherid', $q, PDO::PARAM_INT);
    $result->execute();
    $books = $result->fetchAll();
    foreach ($books as $b){
        $hint .= '<p><a href="/dist/php/show_book?isbn='.urlencode($b['isbn']).'">'.$b['isbn']." ".$b['title'].'</a></p>';
    }

    echo $hint === "" ? "Δεν υπάρχουν βιβλία." : $hint;
?>