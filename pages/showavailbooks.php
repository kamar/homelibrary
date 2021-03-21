<?php 
    session_start();
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
    require_once($DOCUMENT_ROOT.'/ics/head.php')
?>
    <!-- (B) BOOKS LIST -->
    <h1>Διαθέσιμα Βιβλία για Δανεισμό.</h1>
    
    <!-- <p>Κάντε κλικ πάνω στο βιβλίο.</p> -->
    <div id="our-books">
      <?php
      // error_reporting(E_ALL);
      // ini_set("display_errors", true);
      require $DOCUMENT_ROOT."/dist/php/books.php";
      ?>
      <!-- Script section -->
    </div>
    <?php require_once($DOCUMENT_ROOT.'/ics/footer.php'); ?>
    <script src="/dist/menu.js"></script>
    <script src="/dist/functions.js"></script>
    <!-- <script src="/dist/script.js"></script> -->
    <script src="/dist/scroll.js"></script>
  </body>
</html>