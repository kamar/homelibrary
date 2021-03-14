<?php
require_once '../../ics/head.php';
require 'connect.php';

// $search_term = "Ο Χιονάνθρωπος";

$search_term = htmlspecialchars($_POST['mysearch']);

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
            echo '<a class="book-wrap" href="/dist/php/show_book?isbn='.urlencode($found['isbn']).'">';
            echo '  <div class="book-title">'.$found['isbn']."\t".$found['title'].'</div>';
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