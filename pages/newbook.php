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
    <link href="../dist/style.css" rel="stylesheet">
  </head>
  <body>
    <!-- Κουμπί για να ανεβαίνω στην κορυφή. -->
    <nav>
    <div class="header__menu has-fade">
      <a href="/">Home</a>
      <a href="readers">Readers</a>
      <a href="#">Contact</a>
      <a href="#">Blog</a>
      <a href="#">Careers</a>
    </div>
    </nav>
    <?php
    /*
      isbn           
      isbn10         
      title          
      publisher_id   
      year           
      pages          
      back_page      
      category_id    
      translated     
      translator_id  
      eidos_grafis_id
      copies_standard
      copies_avail   
      in_stock       
    */
    ?>
      <?php include '../dist/php/scripts.php'; ?>
    <div>
      <form action="" method="post"><br>
        <label for="isbn">ISBN:</label>
        <input type="text" id="isbn" name="isbn"><br>
        <label for="isbn10">ISBN 10:</label>
        <input type="text" id="isbn10" name="isbn10"><br>
        <label for="title">Τίτλος:</label>
        <input type="text" id="title" name="title"><br>
        <label for="publisher_id">Εκδότης:</label>
        <select id="publisher_id" name="publisher_id">
        <?php
          $publishers = get_publishers();
          foreach ($publishers as $p){
            echo '<option value="'.$p['publisher_id'].'">'.$p['name'].'</option>';
          }
        ?>
        </select><br>
        <label for="year">Έτος έκδοσης:</label>
        <input type="text" id="year" name="year"><br>
        <label for="pages">Σελίδες:</label>
        <input type="text" id="pages" name="pages"><br>
        <label for="back_page">Οπισθόφυλλο - Περιγραφή:</label>
        <textarea id="back_page" name="back_page" rows="8" cols="50">
        </textarea><br>
        <label for="category_id">Κατηγορία:</label>
        <select name="category_id" id="category_id">
        <?php
          $categories = get_categories();
          foreach ($categories as $c){
            echo '<option value="'.$c['category_id'].'">'.$c['description'].'</option>';
            
          }
        ?>
        </select><br>
        <label for="translated">Μεταφρασμένο:</label>
        <input type="checkbox" name="translated" id="translated" value="1"><br>
        <label for="translator_id">Μεταφραστής:</label>
        <select name="translator_id" id="translator_id">
        <?php
          $translators = get_translators();
          foreach ($translators as $t){
            echo '<option value="'.$t['translator_id'].'">'.$t['fullname'].'</option>';
            
          }
        ?>
        </select><br>
        <label for="author_id">Συγγραφέας:</label>
        <select id="author_id" name="author_id">
          <?php
            $authors = get_authors();
            foreach ($authors as $a){ 
              echo '<option value="'.$a['author_id'].'">'.$a['fullname'].'</option>';
            }
          ?>
        </select><br>
        <label for="eidos_grafis_id">Είδος Γραφής:</label>
        <select id="eidos_grafis_id" name="eidos_grafis_id">
          <?php
            $eidosgrafis = get_eidosgrafis();
            foreach ($eidosgrafis as $eg){ 
              echo '<option value="'.$eg['eidos_grafis_id'].'">'.$eg['description'].'</option>';
            }
          ?>
        </select><br>
        <label for="copies_standard">Αντίτυπα:</label>
        <input type="text" name="copies_standard" id="copies_standard"><br>
        <label for="copies_avail">Διαθέσιμα αντίγραφα:</label>
        <input type="text" name="copies_avail" id="copies_avail"><br>
        <label for="in_stock">Διαθέσιμο:</label>
        <input type="checkbox" name="in_stock" id="in_stock" value="1"><br>
      </form>
    </div>  
    <!-- Script section -->
    <script src="/..dist/script.js"></script>
    <script src="../dist/scroll.js"></script>
    <!-- </div> -->
  </body>
</html>