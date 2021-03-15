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
            
            echo '    </div>';
            echo '    <div id="fullname">Fullname: '.$au['firstname'].' '.$au['surname'].'</div>';
            echo '    <div>Email: '.$au['email'].'</div>';
            echo '    <div>Internet: '.$au['site'].'</div>';
            echo '    <div>Bio: '.$au['bio'].'</div>';
            echo '</div>';
        }
    } 
    $con = null;
?>
</body>
</html>