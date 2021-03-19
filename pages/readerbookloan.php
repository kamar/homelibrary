<!DOCTYPE html>
<?php 
  session_start();
  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
  require_once $DOCUMENT_ROOT.'/ics/head.php';
?>
    <!-- (B) READERS LIST -->
    <!-- <div id="reader-bookloan"> -->
      <?php
      // TODO: Add reader's Fullname as caption.
      $_SESSION['reader_id'] = $_GET['rid'];
      // $_SESSION['full_name'] = $_GET['full_name'];
      echo "<h1>Αναγνώστης: ".$_GET['full_name']."</h1>";
      echo '<div class="btnsdiv">';
        echo '<button class="btnclose" onclick="goBack()">Κλείσιμο</button>';
      echo '</div>';
        require $DOCUMENT_ROOT."/dist/php/reader_bookloan.php";
      require_once $DOCUMENT_ROOT.'/ics/footer.php';
      ?>
      <!-- Script section -->
      <script src="/dist/menu.js"></script>
      <script src="/dist/functions.js"></script>
      <script src="/dist/script.js"></script>
      <script src="/dist/scroll.js"></script>
    <!-- </div> -->
  </body>
</html>