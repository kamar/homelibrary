<?php
    $q = $_REQUEST["q"];

    $hint = '<h2>'._('Books').'</h2>';

    require 'connect.php';
    $query = " SELECT b.isbn, b.title FROM tbl_books b, books_authors ba WHERE b.isbn = ba.isbn AND ba.author_id = :authorid ORDER BY isbn";
    $con = pdo_homelibrary();
    
    $result = $con->prepare($query);
    $result->bindParam(':authorid', $q, PDO::PARAM_INT);
    $result->execute();
    $books = $result->fetchAll();
    foreach ($books as $b){
        $hint .= '<p><a href="/dist/php/show_book?isbn='.urlencode($b['isbn']).'">'.$b['isbn']." ".$b['title'].'</a></p>';
    }

    echo $hint === "" ? _('No books found.') : $hint;
?>