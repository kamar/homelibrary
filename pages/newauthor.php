    <?php
    session_start();
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
    require_once($DOCUMENT_ROOT.'/ics/head.php');

    /*
      firstname
      surname
      email
      site
      bio
    */
    
    ?>
    <div class="container">
    <h2>Εισαγωγή Συγγραφέα</h2>
      <form name="newbook" action="/dist/php/insert_author"  onsubmit="return val_form()" method="post">
        <div class="row">
          <div class="col-25"><label for="firstname">Όνομα Συγγραφέα:</label></div>
          <div class="col-45"><input type="text" id="firstname" name="firstname" placeholder="Καταχωρείστε το όνομα του συγγραφέα."></div>
          <div class="col-30"><span class="form_error">* <?php $isbn_error; ?></span></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="surname">Επώνυμο Συγγραφέα:</label></div>
          <div class="col-45"><input type="text" id="surname" name="surname" placeholder="Καταχωρείστε το επώνυμο του συγγραφέα."></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="email">Email Συγγραφέα:</label></div>
          <div class="col-45"><input type="email" id="email" name="email" placeholder="Καταχωρείστε το email του συγγραφέα."></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="site">Ιστοσελίδα Συγγραφέα:</label></div>
          <div class="col-45"><input type="url" id="site" name="site" placeholder="Καταχωρείστε την ιστοσελίδα του συγγραφέα."></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="bio">Βιογραφικό Συγγραφέα:</label></div>
          <div class="col-45"><textarea  rows="8" cols="50" id="bio" name="bio" placeholder="Καταχωρείστε το βιογραφικό του συγγραφέα."></textarea></div>
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