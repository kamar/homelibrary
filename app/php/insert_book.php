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
    // include 'connect.php';
    include 'utilities.php';

    $isbn = $_POST['isbn'];           
    if (strlen($_POST['isbn10']) > 0){
      $isbn10 = $_POST['isbn10'];
    }else{
      $isbn10 = null;
    }           
    $title = $_POST['title'];          
    $publisher_id = intval($_POST['publisher_id']); 
    $year = intval($_POST['year']);           
    $pages = intval($_POST['pages']);          
    $back_page = trim($_POST['back_page']);      
    $category_id = intval($_POST['category_id']);    
    $translated = $_POST['translated'];     
    $translator_id = intval($_POST['translator_id']);  
    $author_id = intval($_POST['author_id']);
    $eidos_grafis_id = intval($_POST['eidos_grafis_id']);
    $copies_standard = intval($_POST['copies_standard']);
    $copies_avail = intval($_POST['copies_avail']);   
    $in_stock = $_POST['in_stock'];

    if (strlen($isbn) == 0 and strlen($isbn10) == 0){
        echo "Πρέπει να οριστεί το ISBN ή το ISBN10.";
        die();
    }

    $con = pdo_homelibrary();
    
    $query = "INSERT INTO tbl_books (isbn, isbn10, title, publisher_id, year, pages, back_page, category_id, translated, translator_id, eidos_grafis_id, copies_standard, copies_avail, in_stock) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) RETURNING *";
    
    $query2 = "INSERT INTO books_authors (isbn, author_id) VALUES (?, ?)";
    
    $params = array( $isbn, $isbn10, $title, $publisher_id, $year, $pages, $back_page, $category_id, $translated, $translator_id, $eidos_grafis_id, $copies_standard, $copies_avail, $in_stock);

    try{
      $result = $con->prepare($query);
    
    // echo "<div>";
      $result -> execute($params) or die("Query failed.");
    // echo "</div";
    $book = $result ->fetchAll();
    if (sizeof($book )>0){
      foreach ($book as $b){
        $params2 = array($b['isbn'], $author_id);
        $result2 = $con->prepare($query2);
        $count_author = $result2 -> execute($params2);
          echo '<div id="myModal" class="modal">';
            echo"<div class='modal-content'>";
              echo "<div class='modal-header'>";
                echo '<span class="close">&times;</span>';
                echo "<h2>Επιτυχής Εισαγωγή Βιβλίου με ISBN: ".$b['isbn']."</h2>";
                if ($count_author > 0){
                  echo "<h3>Επιτυχής Εισαγωγή συγγραφέα: ";
                  echo get_author($author_id);
                  echo "</h3>";
                } 
              echo "</div>";
              echo '<div class="modal-body">';
                echo '<ol>';
                  echo "<li>ISBN: ".$b['isbn']."</li>";
                  echo "<li>ISBN10: ".$b['isbn10']."</li>";
                  echo "<li>Title: ".$b['title']."</li>";
                  echo "<li>Publisher: ";
                  echo get_publisher($b['publisher_id']);
                  echo "</li>";
                  echo "<li>Year: ".$b['year']."</li>";
                  echo "<li>Pages: ".$b['pages']."</li>";
                  echo "<li>Back Page: ".$b['back_page']."</li>";
                  echo "<li>Category: ";
                  echo get_category($b['category_id']);
                  echo "</li>";
                  echo "<li>Translated: ".$b['translated']."</li>";
                  echo "<li>Translator: ";
                  echo get_translator($b['translator_id']);
                  echo "</li>";
                  echo "<li>Author: ";
                  echo get_author($author_id);
                  echo "</li>";
                  echo "<li>Style: ";
                  echo get_grafi($b['eidos_grafis_id']);
                  echo "</li>";
                  echo "<li>Copies: ".$b['copies_standard']."</li>";
                  echo "<li>Copies Available: ".$b['copies_avail']."</li>";
                  if ($b['in_stock']== TRUE){
                    $stock = "Yes";
                  }else{
                    $stock = "No";
                  }
                  echo "<li>In stock: ".$stock."</li>";
                }
                echo '</ol>';
              echo "</div>";
                  }
                  echo "</div>";
                echo "</div>";
                }
              catch (PDOException $e)
                  {
                    echo '<div id="myModal" class="modal">';
                    echo"<div class='modal-content'>";
                    echo "<div class='modal-header'>";
                      echo '<span class="close">&times;</span>';
                      echo "<h2>Δεν έγινε εισαγωγή του βιβλίου.</h2>";
                    echo "</div>";
                    echo "<div class='modal-body'>";
                      echo "<h3>Exception:</h3>";
                      echo "<p>".$e->getMessage()."</p>";
                      // $errors = $result->errorInfo();
                      // echo "<p>".$errors[0]."</p>";
                      // echo "<p>".$errors[1]."</p>";
                      // echo "<p>".$errors[2]."</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                  }
    
    $con = null;
    ?>
    <script src="/dist/modal.js"></script>
  </body>
</html>