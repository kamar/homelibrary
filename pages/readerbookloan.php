<!DOCTYPE html>
<?php require_once '../ics/head.php'; ?>
    <!-- (B) READERS LIST -->
    <!-- <div id="reader-bookloan"> -->
      <?php
      // TODO: Add reader's Fullname as caption.
      session_start();
      $_SESSION['reader_id'] = $_GET['r_id'];
      // $_SESSION['full_name'] = $_GET['full_name'];
      echo "<h1>Αναγνώστης: ".$_GET['full_name']."</h1>";
      require "../dist/php/reader_bookloan.php";
      require_once '../ics/footer.php';
      ?>
      <!-- Script section -->
      <script src="/..dist/script.js"></script>
      <script src="../dist/scroll.js"></script>
    <!-- </div> -->
  </body>
</html>