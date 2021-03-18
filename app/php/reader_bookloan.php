<?php

/*
Column
-------
 loan_id   
 reader_id 
 isbn      
 startdate 
 enddate   
 returndate
 delay     
 returned  

*/
    require 'connect.php';
    $param = array($_SESSION['reader_id']);
    $query = "SELECT bl.loan_id, bl.reader_id, bl.isbn, to_char(bl.startdate, 'DD-MM-YYYY') AS startdate, to_char(bl.enddate, 'DD-MM-YYYY') AS enddate, to_char(bl.returndate, 'DD-MM-YYYY') AS returndate, to_char(bl.delay, '999 \"ημέρες\"') AS delay,
     CASE
         WHEN bl.returned = 't' THEN 'Επιστράφηκε'
         WHEN bl.returned = 'f' THEN 'Δεν επιστράφηκε'
     END returned,
     b.title
     FROM 
     tbl_bookloan bl, tbl_books b
     WHERE bl.isbn = b.isbn 
     AND bl.reader_id =:reader_id";
    // $query = 'SELECT * FROM tbl_bookloan WHERE reader_id = $1';
    $con = pdo_homelibrary();
    $rs = $con->prepare($query); // or die("Cannot execute query: $query\n");
    $rs->execute($param);
    $r_bookloan = $rs->fetchAll();
?>
<table id="bookloan">
<tr>
    <th>Κωδικός Δανεισμού</th>
    <th>ISBN</th>
    <th>Τίτλος</th>
    <th>Ημερομηνία Δανεισμού</th>
    <th>Ημερομηνία Επιστροφής</th>
    <th>Επιστράφηκε την</th>
    <th>Καθυστέρηση</th>
    <th>Σε Απόθεμα</th>
</tr>
<?php
    foreach ($r_bookloan as $rbl){
        // echo $rbl['isbn']." ".$rbl['startdate']." ".$rbl['startdate']."\n";
       echo "<tr>
            <td>".$rbl['loan_id']."</td>
            <td><a href=\"/dist/php/show_book?isbn=".urlencode($rbl['isbn'])."\">".$rbl['isbn']."</a></td>
            <td>".$rbl['title']."</td>
            <td>".$rbl['startdate']."</td>
            <td>".$rbl['enddate']."</td>
            <td>".$rbl['returndate']."</td>
            <td>".$rbl['delay']."</td>
            <td>".$rbl['returned']."</td>
        </tr>";
   }
?>
</table>