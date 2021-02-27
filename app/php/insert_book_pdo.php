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
    $year = $_POST['year'];           
    $pages = $_POST['pages'];          
    $back_page = $_POST['back_page'];      
    $category_id = $_POST['category_id'];    
    $translated = $_POST['translated'];     
    $translator_id = $_POST['translator_id'];  
    $eidos_grafis_id = $_POST['eidos_grafis_id'];
    $copies_standard = $_POST['copies_standard'];
    $copies_avail = $_POST['copies_avail'];   
    $in_stock = $_POST['in_stock'];

    if (strlen($isbn) == 0 and strlen($isbn10) == 0){
        echo "Πρέπει να οριστεί το ISBN ή το ISBN10.";
        die();
    }

    $con = pdo_homelibrary();
    
    // TODO: Complete the query.
    $query = "INSERT INTO tbl_books (isbn, isbn10, title, publisher_id, year, pages, back_page, category_id, translated, translator_id, eidos_grafis_id, copies_standard, copies_avail, in_stock) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) RETURNING *";
    
    $params = array( $isbn, $isbn10, $title, $publisher_id, $year, $pages, $back_page, $category_id, $translated, $translator_id, $eidos_grafis_id, $copies_standard, $copies_avail, $in_stock);

    $result = $con->prepare($query);
    
    echo "<div style='width:80%;margin: auto;font-weight:700;background: #010101'>";
      $result = execute($query, $params) or die("Query failed: ".pg_last_error());
    echo "</div";
    $book = $result ->fetchAll();
    if (sizeof($book )>0){
      echo "<div style='width:80%;margin: auto;background: #010101'>";
        echo "<h2>Επιτυχής Εισαγωγή Βιβλίου με ISBN: $isbn.</h2>";
          echo '<ol>';
            foreach ($book as $b){
              echo "<li>ISBN: ".$b['isbn']."</li>";
              echo "<li>ISBN10: ".$b['isbn10']."</li>";
              echo "<li>Title: ".$b['title']."</li>";
              echo "<li>Publisher: ".$b['publisher_id']."</li>";
              echo "<li>Year: ".$b['year']."</li>";
              echo "<li>Pages: ".$b['pages']."</li>";
              echo "<li>Back Page: ".$b['back_page']."</li>";
              echo "<li>Category: ".$b['category_id']."</li>";
              echo "<li>Translated: ".$b['translated']."</li>";
              echo "<li>Translator: ".$b['translator_id']."</li>";
              echo "<li>Style: ".$b['eidos_grafis_id']."</li>";
              echo "<li>Copies: ".$b['copies_standard']."</li>";
              echo "<li>Copies Available: ".$b['copies_avail']."</li>";
              echo "<li>In stock: ".$b['in_stock']."</li>";
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

    pg_close($con);
    ?>
  </body>
</html>