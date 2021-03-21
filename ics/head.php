<?php
  session_start();
  // $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
  // require_once($DOCUMENT_ROOT."/dist/php/connect.php");
  // require_once($DOCUMENT_ROOT."/user/inc/functions.inc.php");
  // $user = 
  // $pdo = pdo_homelibrary();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      Οικιακή Βιβλιοθήκη
    </title>
    <link rel="icon" href="/favicon.png" type="image/png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn:ital,wght@0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/dist/style.css" rel="stylesheet">
  </head>
  <body>
      <nav id="testmenu" class="navbar">
              <a href="/" id="home" class="btn">Home</a>
              <div class="dropdown">
                <button class="dropbtn">Books
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                <a href="/pages/showbooks" id="showbooks" class="btn">Εμφάνιση Βιβλίων</a>
                <?php
                  if (isset($_SESSION['userid']) AND isset($_SESSION['admin'])){
                    echo '<a href="/pages/newbook" id="newbook" class="btn">Εισαγωγή Βιβλίου</a>';
                    echo '<a href="/pages/updatebook">Update Book</a>';
                    echo '<a href="#">Delete Book</a>';
                  }
                ?>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn">Authors
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="/pages/showauthors">Συγγραφείς</a>
                  <?php
                  if (isset($_SESSION['userid']) AND isset($_SESSION['admin'])){
                    echo '<a href="/pages/newauthor">Εισαγωγή Συγγραφέα</a>';
                  }
                  ?>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn">Translators
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="/pages/showtranslators">Μεταφραστές</a>
                  <?php
                    if (isset($_SESSION['userid']) AND isset($_SESSION['admin'])){
                      echo '<a href="/pages/newtranslator">Εισαγωγή Μεταφραστή</a>';
                    }
                  ?>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn">Εκδότες
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="/pages/showpublishers">Εκδότες</a>
                  <?php
                  if (isset($_SESSION['userid']) AND isset($_SESSION['admin'])){
                    echo '<a href="/pages/newpublisher">Εισαγωγή Εκδότη</a>';
                  }
                  ?>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn">Readers
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="/pages/readers" id="readers" class="btn">Readers</a>
                  <?php
                  if (isset($_SESSION['userid']) AND isset($_SESSION['admin'])){
                    echo '<a href="/pages/newreader" id="newreader" class="btn">Εισαγωγή Αναγνώστη</a>';
                  }
                  ?>
                </div>
              </div>
              <div class="login">
              <?php
                if (isset($_SESSION['userid'])){
                  echo '<a href="/pages/readers">'.htmlentities($_SESSION['firstname']).'</a>';
                  echo '<a id="logout" href="/user/logout">Logout</a>';  // onclick="btnHideShow(this)"
                }
                else{
                  echo '<a id="registerme" href="/user/register">Register</a>';
                  echo '<a id="login" href="/user/login">Login</a>';
                }
              ?>
              </div>
              <div class="search-container">
                <form action="/dist/php/search" method="post">
                  <input type="search" name="mysearch" id="mySearch" placeholder="Search...">
                  <button type="submit"><i class="fa fa-search"></i></button>
                `</form>
              </div>
          <!-- <input type="search" name="mysearchsearch" id="mysearch" placeholder="Search..."> -->
        </nav>
        
    <!-- Κουμπί για να ανεβαίνω στην κορυφή. -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>