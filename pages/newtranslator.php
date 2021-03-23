    <?php
    session_start();
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
    require_once($DOCUMENT_ROOT.'/ics/head.php');
    include $DOCUMENT_ROOT.'/dist/scripts.php';
    /*
      firstname
      surname
    */
    
    ?>
    <div class="container">
    <h2>Εισαγωγή Μεταφραστή</h2>
    <?php
        if  (!isset($_SESSION['userid']) AND !isset($_SESSION['admin'])){
          echo _('You must loged in to do this task as Administrator.');
          // header("location:".$DOCUMENT_ROOT.'/user/login');
          echo '<p><a href="'.'/user/login'.'">'._('Login').'</a></p>';
          exit;
        }
    ?>
      <form name="newbook" action="/dist/php/insert_translator"  onsubmit="return val_form()" method="post">
        <div class="row">
          <div class="col-25"><label for="firstname">Όνομα:</label></div>
          <div class="col-45"><input type="text" id="firstname" name="firstname" placeholder="Καταχωρείστε το όνομα του μεταφραστή."></div>
          <div class="col-30"><span class="form_error">* <?php $isbn_error; ?></span></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="surname">Επώνυμο Μεταφραστή:</label></div>
          <div class="col-45"><input type="text" id="surname" name="surname"  placeholder="Καταχωρείστε το επώνυμο του μεταφραστή."></div>
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