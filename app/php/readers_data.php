<?php
    require "connect.php";
    $con = pdo_homelibrary();
    if (isset($_SESSION['email'])){
        $query = "SELECT reader_id, surname, firstname,  father_name, mother_name, address, postal_code, city FROM tbl_readers WHERE email= :email ORDER BY surname, firstname";
        $result = $con->prepare($query);
        $result->bindParam(':email', $_SESSION['email'], PDO::PARAM_STR);
        $result->execute();
        $reader = $result->fetchAll();
    }
    else{
        $query = "SELECT reader_id, surname, firstname,  father_name, mother_name, address, postal_code, city FROM tbl_readers ORDER BY surname, firstname"; 
        $reader = $con->query($query) or die("Cannot execute query: $query\n");
    }
    $con = null;
    
    foreach ($reader as $r){
        echo '<a  href="/dist/php/readersdetails?rid='.$r['reader_id'].'"><div class="reader-wrap" data-id="'.$r['reader_id'].'">';
        echo '  <div class="reader-fullname">'.$r['surname'].' '.$r['firstname'].'</div>';
        echo '</div></a>';
    }
?>