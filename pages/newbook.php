    <?php
    require_once('../ics/head.php');
    include '../dist/php/scripts.php';
    /*
      isbn           *
      isbn10         
      title          *
      publisher_id   *
      year           
      pages          
      back_page      
      category_id    *
      translated     
      translator_id  *
      eidos_grafis_id
      copies_standard
      copies_avail   
      in_stock       
    */

    $isbn_error = $title_error = $publisher_id_error = $category_id_error = $translator_id_error = "";
    
    ?>
    <div class="container">
    <h2>Εισαγωγή Βιβλίου</h2>
      <form name="newbook" action="/dist/php/insert_book"  onsubmit="return val_form()" method="post">
        <div class="row">
          <div class="col-25"><label for="isbn">ISBN:</label></div>
          <div class="col-60"><input type="text" id="isbn" name="isbn" placeholder="Καταχωρείστε το ISBN  του βιβλίου."></div>
          <div class="col-15"><span class="form_error">* <?php $isbn_error; ?></span></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="isbn10">ISBN 10:</label></div>
          <div class="col-60"><input type="text" id="isbn10" name="isbn10"></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="title">Τίτλος:</label></div>
          <div class="col-60"><input type="text" id="title" name="title"></div>
          <div class="col-15"><span class="form_error">* <?php $title_error; ?></span></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="publisher_id">Εκδότης:</label></div>
          <div class="col-60">
            <select id="publisher_id" name="publisher_id">
            <?php
              $publishers = get_publishers();
              foreach ($publishers as $p){
                echo '<option value="'.$p['publisher_id'].'">'.$p['name'].'</option>';
              }
            ?>
            </select>
          </div>
          <div class="col-15"><span class="form_error">* <?php $publisher_id_error; ?></span></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="year">Έτος έκδοσης:</label></div>
          <div class="col-60"><input type="text" id="year" name="year"></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="pages">Σελίδες:</label></div>
          <div class="col-60"><input type="text" id="pages" name="pages"></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="back_page">Οπισθόφυλλο - Περιγραφή:</label></div>
          <div class="col-60">
            <textarea id="back_page" name="back_page" rows="8" cols="50">
            </textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-25"><label for="category_id">Κατηγορία:</label></div>
          <div class="col-60">
            <select name="category_id" id="category_id">
            <?php
              $categories = get_categories();
              foreach ($categories as $c){
                echo '<option value="'.$c['category_id'].'">'.$c['description'].'</option>';
            
              }
            ?>
            </select>
          </div>
          <div class="col-15"><span class="form_error">* <?php $category_id_error; ?></span></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="translated">Μεταφρασμένο:</label></div>
          <div class="col-60"><input type="checkbox" name="translated" id="translated" value="1"></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="translator_id">Μεταφραστής:</label></div>
          <div class="col-60"><select name="translator_id" id="translator_id">
          <?php
          $translators = get_translators();
          foreach ($translators as $t){
            echo '<option value="'.$t['translator_id'].'">'.$t['fullname'].'</option>';
            
          }
          ?>
        </select>
        </div>
        <div class="col-15"><span class="form_error">* <?php $translator_id_error; ?></span>
      </div>
        <div class="row">
          <div class="col-25"><label for="author_id">Συγγραφέας:</label></div>
          <div class="col-60">
            <select id="author_id" name="author_id">
              <?php
                $authors = get_authors();
                foreach ($authors as $a){
                  echo '<option value="'.$a['author_id'].'">'.$a['fullname'].'</option>';
                }
              ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-25"><label for="eidos_grafis_id">Είδος Γραφής:</label></div>
          <div class="col-60">
            <select id="eidos_grafis_id" name="eidos_grafis_id">
              <?php
                $eidosgrafis = get_eidosgrafis();
                foreach ($eidosgrafis as $eg){
                  echo '<option value="'.$eg['eidos_grafis_id'].'">'.$eg['description'].'</option>';
                }
              ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-25"><label for="copies_standard">Αντίτυπα:</label></div>
          <div class="col-60"><input type="text" name="copies_standard" id="copies_standard" onchange="fill_available()"></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="copies_avail">Διαθέσιμα αντίγραφα:</label></div>
          <div class="col-60"><input type="text" name="copies_avail" id="copies_avail"></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="in_stock">Διαθέσιμο:</label></div>
          <div class="col-60"><input type="checkbox" name="in_stock" id="in_stock" value="t"></div>
        </div>
        <div class="row">
      <input type="submit" value="Καταχώρηση">
    </div>
      </form>
    </div>
    <!-- <?php require_once '../ics/footer.php'; ?> -->
    <!-- Script section -->
    <script src="/dist/menu.js"></script>
    <script src="/dist/functions.js"></script>
    <!-- <script src="/..dist/script.js"></script> -->
    <!-- <script src="../dist/scroll.js"></script> -->
    <!-- </div> -->
    <script src="/dist/functions.js"></script>
  </body>
</html>