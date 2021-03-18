<?php
    session_start();
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
    require_once $DOCUMENT_ROOT.'/ics/head.php';
    require 'connect.php';
    $translatorid = intval($_GET['pid']);
    $query ="SELECT * FROM tbl_publisher WHERE publisher_id = :pid";
    $con = pdo_homelibrary();
    $result = $con->prepare($query);
    $result->bindParam(':pid', $translatorid, PDO::PARAM_INT);

    $result->execute();
    $publisher = $result->fetchAll();

    if (sizeof($publisher)== 1){
        foreach ($publisher as $p){
            //  TODO: Formatting and php code in database. Button for writer's books.
            echo '<div class="authordetail">';
            echo '    <div class="btnbooksauthor">';
            echo '        <button id="hidebooks" onclick="hidePBooks()">Απόκρυψη Βιβλίων</button>';
            echo '        <button id="publisher_books" onclick="showPBooks('.$p['publisher_id'].')">Βιβλία</button>';
            echo '        <button class="btnclose" onclick="goBack()">Κλείσιμο</button>';
            echo '    </div>';
            echo '    <div id="fullname">Επωνυμία: '.$p['name'].'</div>';
            echo '    <div>Διεύθυνση: '.$p['address']." ".$p['tk'].'</div>';
            echo '    <div>Τηλέφωνο: '.$p['phone_number'].'</div>';
            echo '    <div>Fax: '.$p['fax_number'].'</div>';
            echo '    <div>Email: '.$p['email'].'</div>';
            echo '    <div>Internet: '.$p['site'].'</div>';

            echo '<div id="txtHint"></div>';
            echo '</div>';
        }
    }

    $con = null;
?>

<script src="/dist/functions.js"></script>
</body>
</html>

