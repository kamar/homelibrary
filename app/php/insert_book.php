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
    <?php
    include 'connect.php';

    $isbn = $_POST['isbn'];           
    $isbn10 = $_POST['isbn10'];
    $title = $_POST['title'];          
    $publisher_id = $_POST['publisher_id'];   
    $year = intval($_POST['year']);           
    $pages = intval($_POST['pages']);          
    $back_page = trim($_POST['back_page']);      
    $category_id = intval($_POST['category_id']);    
    $translated = $_POST['translated'];     
    $translator_id = intval($_POST['translator_id']);  
    $author_id = intval($_POST['author_id']);
    $eidos_grafis_id = $_POST['eidos_grafis_id'];
    $copies_standard = intval($_POST['copies_standard']);
    $copies_avail = intval($_POST['copies_avail']);   
    $in_stock = $_POST['in_stock'];

    if (strlen($isbn) == 0 and strlen($isbn10) == 0){
        echo "Πρέπει να οριστεί το ISBN ή το ISBN10.";
        die();
    }

    $con = pdo_homelibrary();
    
    // TODO: Complete the query.
    $query = "INSERT INTO tbl_books (isbn, isbn10, title, publisher_id, year, pages, back_page, category_id, translated, translator_id, eidos_grafis_id, copies_standard, copies_avail, in_stock) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) RETURNING *";
    
    // $query2 = "INSERT INTO books_authors (isbn, author_id)";
    
    $params = array( $isbn, $isbn10, $title, $publisher_id, $year, $pages, $back_page, $category_id, $translated, $translator_id, $eidos_grafis_id, $copies_standard, $copies_avail, $in_stock);

    // $params2 = array($isbn, $author_id);

    $result = $con->prepare($query);
    // $result2 = $con->prepare($query2);

    echo "<div style='width:80%;margin: auto;font-weight:700;background: #010101'>";
      $result -> execute($params) or die("Query failed.");
      // $result2 -> execute($params2);
    echo "</div";
    $book = $result ->fetchAll();
    // $author = $result2->fetchAll();
    if (sizeof($book )>0){
      foreach ($book as $b){
          echo "<div style='width:80%;margin: auto;background: #010101'>";
          echo "<h2>Επιτυχής Εισαγωγή Βιβλίου με ISBN: ".$b['isbn']."</h2>";
            echo '<ol>';
              echo "<li>ISBN: ".$b['isbn']."</li>";
              echo "<li>ISBN10: ".$b['isbn10']."</li>";
              echo "<li>Title: ".$b['title']."</li>";
              echo "<li>Publisher: <a href='/dist/php/pub?p=".$b['publisher_id']."'>".$b['publisher_id']."</a></li>";
              echo "<li>Year: ".$b['year']."</li>";
              echo "<li>Pages: ".$b['pages']."</li>";
              echo "<li>Back Page: ".$b['back_page']."</li>";
              echo "<li>Category: ".$b['category_id']."</li>";
              echo "<li>Translated: ".$b['translated']."</li>";
              echo "<li>Translator: ".$b['translator_id']."</li>";
              // if (sizeof($author)>0){
                echo "<li>Author: <a href='dist/php/author.php?a=".$author_id."'></a></li>";
              // }
              echo "<li>Style: ".$b['eidos_grafis_id']."</li>";
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
      else{
        echo "<div style='width:80%;margin: auto;background: #010101'>";
          echo "<h2>Δεν έγινε εισαγωγή του βιβλίου.</h2>";
        echo "</div>";
      }
    // echo "ISBN: ".$isbn."<br>";
    // echo "ISBN10: $isbn10<br>";
    // echo "Title: $title<br>";
    // echo "Publisher: $publisher_id<br>";
    // echo "Year: $year<br>";
    // echo "Pages: $pages<br>";
    // echo "Back Page: $back_page<br>";
    // echo "Category: $category_id<br>";
    // echo "Translated: $translated<br>";
    // echo "Translator: $translator_id<br>";
    // echo "Style: $eidos_grafis_id<br>";
    // echo "Copies: $copies_standard<br>";
    // echo "Copies Available: $copies_avail<br>";
    // echo "In stock: $in_stock";

    $con = null;
    ?>
  </body>
</html>