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
      <a href="readers.php">Readers</a>
      <a href="#">Contact</a>
      <a href="#">Blog</a>
      <a href="#">Careers</a>
    </div>
    </nav>

    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <!-- (B) READERS LIST -->
    
    <!-- <div id="reader-bookloan"> -->
      <?php
      // TODO: Add reader's Fullname as caption.
      session_start();
      $_SESSION['reader_id'] = $_GET['r_id'];
      require "../dist/php/reader_bookloan.php";
      ?>
      <!-- Script section -->
      <script src="/..dist/script.js"></script>
      <script src="../dist/scroll.js"></script>
    <!-- </div> -->
  </body>
</html>