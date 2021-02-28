<?php 
  session_start();
  require_once '../ics/head.php';?>
    <!-- (B) READERS LIST -->
    <h1>Αναγνώστες</h1>
    <div id="our-readers">
      <?php
      require "../dist/php/readers_data.php";
      ?>
    </div>
    <?php require_once '../ics/footer.php';?>
    <!-- Script section -->
    <script src="/dist/menu.js"></script>
    <script src="/dist/functions.js"></script>
    <script src="/dist/script.js"></script>
    <script src="/dist/scroll.js"></script>
  </body>
</html>