<?php
    session_start();
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
    require_once($DOCUMENT_ROOT.'/ics/head.php');
    
    /*
    publisher_id
    name        
    address     
    tk          
    phone_number
    fax_number  
    email       
    site        
    */

?>
<div class="container">
    <h2>Εισαγωγή Εκδότη</h2>
      <form name="newpublisher" action=""  onsubmit="return val_form()" method="post">
        <div class="row">
          <div class="col-25"><label for="name">Επωνυμία:</label></div>
          <div class="col-45"><input type="text" id="name" name="name" placeholder="Καταχωρείστε την επωνυμία του εκδότη."></div>
          <div class="col-30"><span class="form_error">* <?php $isbn_error; ?></span></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="address">Διεύθυνση:</label></div>
          <div class="col-45"><input type="text" id="address" name="address" placeholder="Διεύθυνση εκδότη."></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="tk">Ταχυδρομικός Κώδικας:</label></div>
          <div class="col-45"><input type="text" id="tk" name="tk"  placeholder="Ταχυδρομικός Κώδικας"></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="phone_number">Τηλέφωνο:</label></div>
          <div class="col-45"><input type="text" id="phone_number" name="phone_number" placeholder="Αριθμός τηλεφώνου"></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="fax_number">FAX:</label></div>
          <div class="col-45"><input type="text" id="fax_number" name="fax_number" placeholder="Αριθμός FAX"></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="email">Email:</label></div>
          <div class="col-45"><input type="email" id="email" name="email" placeholder="Email"></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="site">Ιστοσελίδα:</label></div>
          <div class="col-45"><input type="url" id="site" name="site" placeholder="Site"></div>
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
    <script src="/dist/functions.js"></script>
  </body>
</html>