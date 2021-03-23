<?php
session_start();


$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
require_once $DOCUMENT_ROOT.'/ics/head.php';
require 'connect.php';

// $search_term = "Ο Χιονάνθρωπος";

$search_term = htmlspecialchars($_POST['mysearch']);

if ($search_term = null OR strlen($search_term) == 0){
    echo '<div id="our-books">';
    echo '<div class="book-wrap">';
    echo '  <div class="book-title">Δεν έχετε εισάγει δεδομένα για αναζήτηση.</div>';
    echo '</div>';
    echo '</div>';
    exit;
}

$search_term_fix = "%$search_term%";
$con = pdo_homelibrary();
$query = "SELECT isbn, title FROM tbl_books WHERE textsearchbooks  @@ phraseto_tsquery('simple', ?)";

$result = $con ->prepare($query);

try{
  $result->execute( array($search_term));
  $founds = $result->fetchAll();
  $nums = sizeof($founds);
  echo "<h2 style=\"color:#fff;\">Βρέθηκαν {$nums} αποτελέσματα για την αναζήτηση: {$search_term}.</h2>";
  echo '<div id="our-books">';
  
  if ($nums>0){
    // echo '<div class="container">';
        foreach ($founds as $found){
            // echo '<div data-id="'.$found['isbn'].'">';
            echo '<a target="_blank" class="book-wrap" href="/dist/php/show_book?isbn='.urlencode($found['isbn']).'">';
            echo '  <div class="book-title">'.$found['isbn']."    ".$found['title'].'</div>';
            // echo '  <div class="book-title">'.$found['title'].'</div>';
            echo '</a>';
        }
    }
        else{
            echo '<div class="book-wrap">';
            echo '  <div class="book-title">Δεν υπάρχουν αποτελέσματα για '.$search_term.'</div>';
            echo '</div>';
        }
    // echo "</div>";
}
catch (PDOException $e){
  echo '<div id="our-books">';
  echo '<div class="book-wrap">';
            echo '  <div class="book-title">'.$e->getMessage().'</div>';
  echo '</div>';
  echo '</div>';
}
echo '</div>';
$con = null;
?>
</body>
</html>