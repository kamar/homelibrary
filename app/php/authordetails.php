<?php
    session_start();
    require_once '../../ics/head.php';
    require 'connect.php';
    $authorid = intval($_GET['aid']);
    $query ="SELECT * FROM tbl_author WHERE author_id = :aid";
    $con = pdo_homelibrary();
    $result = $con->prepare($query);
    $result->bindParam(':aid', $authorid, PDO::PARAM_INT);

    $result->execute();
    $author = $result->fetchAll();
    
    if (sizeof($author)== 1){
        foreach ($author as $au){
            //  TODO: Formatting and php code in database. Button for writer's books.
            echo '<div class="authordetail">';
            echo '    <div class="btnbooksauthor">';
            echo '        <button id="hidebooks" onclick="hideBooks()">Απόκρυψη Βιβλίων</button>';
            echo '        <button id="authors_books" onclick="showBooks('.$au['author_id'].')">Βιβλία του Συγγραφέα</button>';
            echo '        <button class="btnclose" onclick="goBack()">Κλείσιμο</button>';
            echo '    </div>';
            echo '    <div id="fullname">Fullname: '.$au['firstname'].' '.$au['surname'].'</div>';
            echo '    <div>Email: '.$au['email'].'</div>';
            echo '    <div>Internet: <a target="_blank" href="'.$au['site'].'">'.$au['site'].'</a></div>';
            echo '    <div>Bio: '.$au['bio'].'</div>';
            echo '<div id="txtHint"></div>';
            echo '</div>';
        }
    }

    $con = null;
?>

<script src="/dist/functions.js"></script>
</body>
</html>