<?php
    require 'connect.php';
    $myISBN = $_REQUEST['isbn'];
    // $myISBN = "978-3-8174-1862-6";
    $con = pdo_homelibrary();
    $query = "SELECT * FROM tbl_books WHERE isbn = :isbn";
    $result = $con->prepare($query);
    $result->bindParam(':isbn',$myISBN, PDO::PARAM_STR, 17);
    $result->execute();
    $book = $result->fetchAll();
    
    $result = null;
    $query2 = "SELECT author_id FROM books_authors WHERE isbn =:isbn";
    $result = $con->prepare($query2);
    $result->bindParam(':isbn',$myISBN, PDO::PARAM_STR, 17);
    $result->execute();
    $author = $result->fetchAll();
    $a= "";
    for ($i=0;$i<sizeof($author);$i++){
        $a .= $author[$i]['author_id'].", ";
    }

    $myisbn = $book[0]['isbn'];
    $myisbn10 = $book[0]['isbn10'];
    $mytitle = $book[0]['title'];
    $mypublisher = $book[0]['publisher_id'];
    $myyear = $book[0]['year'];
    $mypages = $book[0]['pages'];
    $myback_page = $book[0]['back_page'];
    $mycategory_id = $book[0]['category_id'];
    $mytranslated = $book[0]['translated'];
    $mytranslator_id = $book[0]['translator_id'];
    $myeidos_grafis_id = $book[0]['eidos_grafis_id'];
    $mycopies_standard = $book[0]['copies_standard'];
    $mycopies_avail = $book[0]['copies_avail'];
    $myin_stock = $book[0]['in_stock'];
    $mya = rtrim($a, ", ");
    

    $myJSON = json_encode(array("$myisbn", "$myisbn10", "$mytitle", "$mypublisher", "$myyear", "$mypages", "$myback_page", "$mycategory_id", "$mytranslated", "$mytranslator_id", "$myeidos_grafis_id", "$mycopies_standard", "$mycopies_avail", "$myin_stock", "$mya")); 
    echo $myJSON; 
?>