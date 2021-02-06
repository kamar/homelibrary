<?php
    require "connect.php";

    $query = "SELECT reader_id, surname, firstname,  father_name, mother_name, address, postal_code, city FROM tbl_readers ORDER BY surname, firstname"; 
    $con = con_homelibrary();
    $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
    
    $reader = pg_fetch_all($rs);
?>    
    <table id="readers">
<?php
    echo "<tr>";
    echo "<th>Επώνυμο</th>";
    echo "<th>Όνομα</th>";
    echo "<th>Πατρώνυμο</th>";
    echo "<th>Μητρώνυμο</th>";
    echo "<th>Διεύθυνση</th>";
    echo "<th>Ταχυδρομικός κώδικας</th>";
    echo "<th>Πόλη</th>";
    echo "</tr>";
    foreach ($reader as $r){
        echo "<tr>
            <td>".$r['surname']."</td>
            <td>".$r['firstname']."</td>
            <td>".$r['father_name']."</td>
            <td>".$r['mother_name']."</td>
            <td>".$r['address']."</td>
            <td>".$r['postal_code']."</td>
            <td>".$r['city']."</td>
        </tr>";
    }
    echo "</table>";
?>