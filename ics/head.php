<?php
  session_start();
  $locale = 'de_DE';
  putenv('LC_ALL='.$locale);
  setlocale(LC_MESSAGES, $locale.'.UTF-8');
  // bindtextdomain("homelibrary", "locale");
  textdomain("homelibrary");
  bind_textdomain_codeset("homelibrary", 'UTF-8');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      <?php echo _("Home Library"); ?>
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
              <a href="/" id="home" class="btn"><?php echo _('Home'); ?></a>
              <div class="dropdown">
                <button class="dropbtn"><?php echo _('Books') ?>
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                <a href="/pages/showbooks" id="showbooks" class="btn"><?php echo _('All Books'); ?></a>
                <a href="/pages/showavailbooks" id="showavailbooks" class="btn"><?php echo _('Available Books'); ?></a>
                <?php
                  if (isset($_SESSION['userid']) AND isset($_SESSION['admin'])){
                    echo '<a href="/pages/newbook" id="newbook" class="btn">'._('Insert Book').'</a>';
                    echo '<a href="/pages/updatebook">'._('Update Book').'</a>';
                    echo '<a href="#">'._('Delete Book').'</a>';
                  }
                ?>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn"><?php echo _('Authors');?>
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="/pages/showauthors"><?php echo _('Authors'); ?></a>
                  <?php
                  if (isset($_SESSION['userid']) AND isset($_SESSION['admin'])){
                    echo '<a href="/pages/newauthor">'._('Insert Author').'</a>';
                  }
                  ?>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn"><?php echo _('Translators'); ?>
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="/pages/showtranslators"><?php echo _('Translators'); ?></a>
                  <?php
                    if (isset($_SESSION['userid']) AND isset($_SESSION['admin'])){
                      echo '<a href="/pages/newtranslator">'._('Insert Translator').'</a>';
                    }
                  ?>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn"><?php echo _('Publishers'); ?>
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="/pages/showpublishers"><?php echo _('Publishers'); ?></a>
                  <?php
                  if (isset($_SESSION['userid']) AND isset($_SESSION['admin'])){
                    echo '<a href="/pages/newpublisher">'._('Insert Publisher').'</a>';
                  }
                  ?>
                </div>
              </div>
                  <?php
                  if (isset($_SESSION['userid']) AND isset($_SESSION['admin'])){
                    echo '<div class="dropdown">
                      <button class="dropbtn">'. _('Readers').'
                        <i class="fa fa-caret-down"></i>
                      </button>
                      <div class="dropdown-content">
                        <a href="/pages/readers" id="readers" class="btn">'. _('Readers').'</a>';
                          echo '<a href="#" id="newreader" class="btn">'._('Loan a Book').'</a>';
                          echo '<a href="/pages/newreader" id="newreader" class="btn">'._('New Reader').'</a>
                      </div>
                    </div>';
                  }
                  ?>
              <div class="login">
              <?php
                if (isset($_SESSION['userid'])){
                  echo '<a href="/pages/readers">'.htmlentities($_SESSION['firstname']).'</a>';
                  echo '<a id="logout" href="/user/logout">'._('Logout').'</a>';  // onclick="btnHideShow(this)"
                }
                else{
                  echo '<a id="registerme" href="/user/register">'._('Register').'</a>';
                  echo '<a id="login" href="/user/login">'._('Login').'</a>';
                }
              ?>
              </div>
              <div class="search-container">
                <form action="/dist/php/search" method="post">
                  <input type="search" name="mysearch" id="mySearch" placeholder="<?php echo _('Search...'); ?>">
                  <button type="submit"><i class="fa fa-search"></i></button>
                `</form>
              </div>
          <!-- <input type="search" name="mysearchsearch" id="mysearch" placeholder="Search..."> -->
        </nav>
        
    <!-- Κουμπί για να ανεβαίνω στην κορυφή. -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>