<?php 
    session_start();
    require_once('ics/head.php');
?>
    <!-- (B) BOOKS LIST -->
    <h1>Διαθέσιμα Βιβλία</h1>
    <p>Κάντε κλικ πάνω στο βιβλίο.</p>
    <div id="our-books">
      <?php
      // error_reporting(E_ALL);
      // ini_set("display_errors", true);
      require "dist/php/books.php";
      ?>
      <!-- Script section -->
    </div>
    <?php require_once('ics/footer.php'); ?>
    <script src="/dist/menu.js"></script>
    <script src="/dist/functions.js"></script>
    <!-- <script src="dist/script.js"></script> -->
    <script src="dist/scroll.js"></script>
  </body>
</html>