<?php
    require "connect.php";

    $query = "SELECT reader_id, surname, firstname,  father_name, mother_name, address, postal_code, city FROM tbl_readers ORDER BY surname, firstname"; 
    $con = pdo_homelibrary();
    $reader = $con->query($query) or die("Cannot execute query: $query\n");
    $con = null;
?>    

<?php
    
    foreach ($reader as $r){
        echo '<a  href="readerbookloan?id='.$r['reader_id'].'&full_name='.urlencode($r['surname'].' '.$r['firstname']).'"><div class="reader-wrap" data-id="'.$r['reader_id'].'">';
        
        echo '  <div class="reader-fullname">'.$r['surname'].' '.$r['firstname'].'</div>';
        echo '  <div class="reader-address">'.$r['address'].'<br>'.$r['postal_code'].' '.$r['city'].'</div>';
        echo '</div></a>';
    }
?>