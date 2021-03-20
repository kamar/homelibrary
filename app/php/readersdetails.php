
<?php
    /*
        reader_id    
        surname      
        firstname    
        father_name  
        mother_name  
        date_of_birth
        sex          
        id_number    
        id_issue     
        address      
        city         
        postal_code  
    */
    session_start();
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

    require_once $DOCUMENT_ROOT.'/ics/head.php';
    require 'connect.php';
    $readerid = intval($_GET['rid']);
    $query ="SELECT * FROM tbl_readers WHERE reader_id = :rid";
    $con = pdo_homelibrary();
    $result = $con->prepare($query);
    $result->bindParam(':rid', $readerid, PDO::PARAM_INT);

    $result->execute();
    $reader = $result->fetchAll();
    
    if (sizeof($reader)== 1){
        foreach ($reader as $r){
            //  TODO: Formatting and php code in database. Button for writer's books.
            echo '<div class="readerdetail">';
            echo '    <div class="btnbookssuggested">';
            echo '        <button id="hidebooks" onclick="hideRBooks()">Απόκρυψη Πρότασης Βιβλίων</button>';
            echo '        <button id="suggestions" onclick="showRSuggestions('.$r['reader_id'].')">Βιβλία που προτείνονται</button>';
            echo '        <a  href="/pages/readerbookloan?rid='.$r['reader_id'].'&full_name='.urlencode($r['firstname'].' '.$r['surname']).'"> Βιβλία που έχει διαβάσει</a>';
            echo '        <button class="btnclose" onclick="goBack()">Κλείσιμο</button>';
            echo '    </div>';
            echo '    <div id="fullname">Ονοματεπώνυμο: '.$r['firstname'].' '.$r['surname'].'</div>';
            echo '    <div>Πατρώνυμο: '.$r['father_name'].'</div>';
            echo '    <div>Μητρώνυμο: '.$r['mother_name'].'</div>';
                    $dofb = new DateTime($r['date_of_birth']);
            echo '    <div>Ημερομηνία Γέννησης: '.$dofb->format('d-m-Y').'</div>';
            echo '    <div>Φύλο: '.$r['sex'].'</div>';
            echo '    <div>Αριθμός Ταυτότητας: '.$r['id_number'].'</div>';
                    $dt = new DateTime($r['id_issue']);
            echo '    <div>Ημερομηνία Έκδοσης: '.$dt->format('d-m-Y').'</div>';
            echo '    <div>Διεύθυνση: '.$r['address'].'</div>';
            echo '    <div>Πόλη, Ταχυδρομικός Κώδικας: '.$r['city']." ".$r['postal_code'].'</div>';
            echo '<div id="txtSuggestions"></div>';
            echo '<div id="bookloans"></div>';
            echo '</div>';
        }
    }

    $con = null;
?>

<script src="/dist/functions.js"></script>
</body>
</html>