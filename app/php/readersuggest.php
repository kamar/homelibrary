<?php
    $q =  $_REQUEST["q"];

    $hint = "<h2>Βιβλία για εσάς</h2>"."\n";

    require 'connect.php';
    $query = "SELECT a.isbn, b.title FROM tbl_bookloan a, tbl_books b
    WHERE reader_id IN (SELECT DISTINCT b2.reader_id FROM tbl_bookloan b1, tbl_bookloan b2
    WHERE b1.reader_id = :readerid 
    AND a.isbn = b.isbn
    AND b1.reader_id != b2.reader_id
    AND b1.isbn != b2.isbn)
    AND a.isbn NOT IN (SELECT isbn FROM tbl_bookloan WHERE reader_id = :readerid) GROUP BY a.isbn, b.title
    HAVING count(a.isbn)>1";
    $con = pdo_homelibrary();
    
    $result = $con->prepare($query);
    $result->bindParam(':readerid', $q, PDO::PARAM_INT);
    $result->execute();
    $books = $result->fetchAll();
    foreach ($books as $b){
        $hint .= '<p><a href="/dist/php/show_book?isbn='.urlencode($b['isbn']).'">'.$b['isbn']." ".$b['title'].'</a></p>'."\n";
    }

    echo $hint === "" ? "Δεν υπάρχουν βιβλία." : $hint;
    
?>