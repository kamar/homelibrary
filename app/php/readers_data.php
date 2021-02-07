<?php
    require "connect.php";

    $query = "SELECT reader_id, surname, firstname,  father_name, mother_name, address, postal_code, city FROM tbl_readers ORDER BY surname, firstname"; 
    $con = con_homelibrary();
    $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
    
    $reader = pg_fetch_all($rs);
?>    

<?php
    
    foreach ($reader as $r){
        echo '<div class="reader-wrap" data-id="'.$r['reader_id'].'">';
        
        echo '  <a  href="readerbookloan.php?r_id='.$r['reader_id'].'"><div class="reader-fullname">'.$r['surname'].' '.$r['firstname'].'</div></a>';
        echo '  <div class="reader-address">'.$r['address'].'<br>'.$r['postal_code'].' '.$r['city'].'</div>';
        echo '</div>';
    }
?>