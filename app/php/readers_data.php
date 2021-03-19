<?php
    require "connect.php";

    $query = "SELECT reader_id, surname, firstname,  father_name, mother_name, address, postal_code, city FROM tbl_readers ORDER BY surname, firstname"; 
    $con = pdo_homelibrary();
    $reader = $con->query($query) or die("Cannot execute query: $query\n");
    $con = null;
    
    foreach ($reader as $r){
        echo '<a  href="/dist/php/readersdetails?rid='.$r['reader_id'].'"><div class="reader-wrap" data-id="'.$r['reader_id'].'">';
        echo '  <div class="reader-fullname">'.$r['surname'].' '.$r['firstname'].'</div>';
        echo '</div></a>';
    }
?>