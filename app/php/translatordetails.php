<?php
    session_start();
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
    require_once $DOCUMENT_ROOT.'/ics/head.php';
    require 'connect.php';
    $translatorid = intval($_GET['trid']);
    $query ="SELECT * FROM tbl_translator WHERE translator_id = :trid";
    $con = pdo_homelibrary();
    $result = $con->prepare($query);
    $result->bindParam(':trid', $translatorid, PDO::PARAM_INT);

    $result->execute();
    $translator = $result->fetchAll();
    echo "<h1>"._("Translators")."</h1>";
    if (sizeof($translator)== 1){
        foreach ($translator as $tr){
            //  TODO: Formatting and php code in database. Button for writer's books.
            echo '<div class="authordetail">';
            echo '    <div class="btnbooksauthor">';
            echo '        <button id="hidebooks" onclick="hideTrBooks()">Απόκρυψη Βιβλίων</button>';
            echo '        <button id="translator_books" onclick="showTrBooks('.$tr['translator_id'].')">Βιβλία που μετάφρασε</button>';
            echo '        <button class="btnclose" onclick="goBack()">Κλείσιμο</button>';
            echo '    </div>';
            echo '    <div id="fullname">Fullname: '.$tr['firstname'].' '.$tr['surname'].'</div>';
            
            echo '<div id="txtHint"></div>';
            echo '</div>';
        }
    }

    $con = null;
?>

<script src="/dist/functions.js"></script>
</body>
</html>
