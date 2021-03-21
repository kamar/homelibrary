<?php
      // require "connect.php";
      require "utilities.php";
      
      if ($_SERVER['REQUEST_URI'] == '/pages/showavailbooks'){
        $query = "SELECT isbn, title, pages, back_page FROM tbl_books ORDER BY isbn WHERE in_stock = true";   
      }
      else{
        $query = "SELECT isbn, title, pages, back_page FROM tbl_books ORDER BY isbn"; 
      }
      $con = pdo_homelibrary();
      $book = $con -> query($query) or die("Cannot execute query: $query\n");
      
      foreach ($book as $p) {
        echo '<a class="book-wrap" href="/dist/php/show_book?isbn='.urlencode($p['isbn']).'">';
        echo '<div data-id="'.$p['isbn'].'">';
        // echo '<span class="tooltiptext">Κάντε κλικ για λεπτομέρειες.</span>';
        echo '  <div class="book-title">'.$p['title'].'</div>';
        echo '  <div class="book-isbn">'.$p['isbn'].'</div>';
        if (strlen($p['back_page'])> 0){
            echo '  <div class="book-desc" id="numpages">Descr: <span>'.set_string($p['back_page'], 25).'...</span></div>';
        }
        else if (strlen($p['back_page'])===0){
            echo '  <div class="book-desc" id="numpages">Descr: <span>No description.</span></div>';
        }
        else {
          '  <div class="book-desc" id="numpages">Descr: <span>'.$p['back_page'].'</span></div>';
        }
        
        echo '</div></a>';
      unset($con);
      } ?>