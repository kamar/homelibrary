<!DOCTYPE html>
<html>
  <head>
    <title>
      Οικιακή Βιβλιοθήκη
    </title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn:ital,wght@0,700;1,400&display=swap" rel="stylesheet">
    <!-- (A) CSS & JS -->
    <link href="/dist/style.css" rel="stylesheet">
  </head>
  <body>

    <!-- <button id="myBtn">Open Modal</button> -->
    <?php
    include 'connect.php';

    $con = pdo_homelibrary();
    
    $query = "SELECT b.isbn, b.isbn10, b.title, p.name, b.year, b.pages, b.back_page, c.description as category, b.translated, 
    CASE translated 
      WHEN 't' THEN 'Translated'
      ELSE 'Not Translated'
    END,
    concat_ws(' ', t.firstname, t.surname) AS translator, eg.description as writing_type, b.copies_standard, b.copies_avail, b.in_stock
    FROM tbl_books AS b, tbl_publisher AS p, tbl_eidos_grafis AS eg, tbl_categories AS c, tbl_translator AS t
    WHERE b.publisher_id = p.publisher_id AND b.category_id = c.category_id AND b.eidos_grafis_id = eg.eidos_grafis_id AND b.translator_id = t.translator_id 
    AND b.isbn = :isbn";
    
    // $params = array($_GET['isbn']);

    $result = $con->prepare($query);
    $result->bindParam(':isbn', $_GET['isbn'], PDO::PARAM_STR, 17);
    $result -> execute() or die("Query failed.");
    $book = $result ->fetchAll();
    
    if (sizeof($book)>0){
      $query_author = "SELECT concat_ws(' ', au.firstname, au.surname) as author 
      FROM tbl_author AS au, books_authors as ba
      WHERE au.author_id = ba.author_id AND ba.isbn =:isbn";

      $result_author = $con->prepare($query_author);
      $result_author->bindParam(':isbn', $_GET['isbn'], PDO::PARAM_STR, 17);
      $result_author->execute() or die("Query failed.");
      $author = $result_author->fetchAll();
      
      if (sizeof($author)==1){
        $bauthor = $author[0]['author'];
      }
      elseif (sizeof($author)>1){
        for ($i=0;$i<sizeof($author);$i++){
          $bauthor .= $author[$i]['author'].=", ";
        }
        $bauthor = rtrim($bauthor, ", ");
      }
    }
    
    if (sizeof($book)>0){
      
      foreach ($book as $b){
          echo '<div id="myModal" class="modal">';
            echo"<div class='modal-content'>";
              echo "<div class='modal-header'>";
                echo '<span class="close">&times;</span>';
                echo "<h2>".$b['title']."</h2>"; 
              echo "</div>";
              echo '<div class="modal-body">';
                echo '<ol>';
                  // TODO: What if 2 or more authors?
                  if (sizeof($author)==1){
                    echo "<li>Author: ".$bauthor."</li>";
                  }
                  elseif (sizeof($author)>1){
                    echo "<li>Authors: ".$bauthor."</li>";
                  }
                  echo "<li>ISBN: ".$b['isbn']."</li>";
                  echo "<li>ISBN10: ".$b['isbn10']."</li>";
                  echo "<li>Publisher: ".$b['name']."</li>";
                  echo "<li>Year: ".$b['year']."</li>";
                  echo "<li>Pages: ".$b['pages']."</li>";
                  echo "<li>Category: ".$b['category']."</li>";
                  // if (!$b['translated']){
                  //   echo "<li>Translated: ".$b['case']."</li>";
                  // }
                  if ($b['translated']){
                    echo "<li>Translator: ".$b['translator']."</li>";
                  }
                  echo "<li>Style: ".$b['writing_type']."</li>";
                  echo "<li>Copies: ".$b['copies_standard']."</li>";
                  echo "<li>Copies Available: ".$b['copies_avail']."</li>";
                  if ($b['in_stock']== TRUE){
                    $stock = "In Stock";
                  }else{
                    $stock = "Not In Stock";
                  }
                  echo "<li>".$stock."</li>";
                }
                echo "<li>Back Page: ".$b['back_page']."</li>";
                echo '</ol>';
              echo "</div>";
                  }
                  else{
                    echo "<div class='modal-body'>";
                      echo "<h2>Δεν υπάρχουν εγγραφές για το βιβλίο.</h2>";
                    echo "</div>";
                  }
            echo "</div>";
          echo "</div>";
    
    $con = null;
    ?>
    <script src="/dist/modal.js"></script>
  </body>
</html>