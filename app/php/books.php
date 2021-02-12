<?php
      require "connect.php";
      
      $query = "SELECT isbn, title, pages, back_page FROM tbl_books ORDER BY isbn"; 
      $con = con_homelibrary();
      $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
      
      $book = pg_fetch_all($rs);

      foreach ($book as $p) { 
      echo '<div class="book-wrap tooltip" data-id="'.$p['isbn'].'">';
      echo '<span class="tooltiptext">Κάντε κλικ για λεπτομέρειες.</span>';
      echo '  <div class="book-title">'.$p['title'].'</div>';
      echo '  <div class="book-isbn">'.$p['isbn'].'</div>';
      if (strlen($p['back_page'])> 0){
          echo '  <div class="book-desc" id="numpages">Descr: <span>'.substr($p['back_page'], 0, 300).'...</span></div>';
      }
      else if (strlen($p['back_page'])===0){
          echo '  <div class="book-desc" id="numpages">Descr: <span>No description.</span></div>';
      }
      else {
        '  <div class="book-desc" id="numpages">Descr: <span>'.$p['back_page'].'</span></div>';
      }
      
      echo '</div>';
      } ?>