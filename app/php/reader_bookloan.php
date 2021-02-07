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
    // session_start();
    require 'connect.php';
    $param = array($_SESSION['reader_id']);
    $query = "SELECT bl.loan_id, bl.reader_id, bl.isbn, bl.startdate, bl.enddate, bl.returndate, bl.delay,
     CASE
         WHEN bl.returned = 't' THEN 'Επιστράφηκε'
         WHEN bl.returned = 'f' THEN 'Δεν επιστράφηκε'
     END returned,
     b.title
     FROM 
     tbl_bookloan bl, tbl_books b
     WHERE bl.isbn = b.isbn 
     AND bl.reader_id = $1";
    // $query = 'SELECT * FROM tbl_bookloan WHERE reader_id = $1';
    $con = con_homelibrary();
    $rs = pg_query_params($con, $query, $param) or die("Cannot execute query: $query\n");
    $r_bookloan = pg_fetch_all($rs);
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
            <td>".$rbl['isbn']."</td>
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