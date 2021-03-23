<?php
    session_start();
    
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
    require_once($DOCUMENT_ROOT.'/ics/head.php');    
/*
    reader_id    
    surname      
    firstname    
    father_name  
    mother_name  
    date_of_birth
    sex          
    id_number    
    id_issue     
    address      
    city         
    postal_code  
*/
?>

<div class="container">
    <h2>Εισαγωγή Αναγνώστη</h2>
      <?php
        if  (!isset($_SESSION['userid']) AND !isset($_SESSION['admin'])){
          echo _('You must loged in to do this task as Administrator.');
          // header("location:".$DOCUMENT_ROOT.'/user/login');
          echo '<p><a href="'.$DOCUMENT_ROOT.'/user/login'.'">'._('Login').'</a></p>';
          exit;
        }
      ?>
      <form name="newreader" action="/dist/php/insert_reader"  onsubmit="return val_form()" method="post">
        <div class="row">
          <div class="col-25"><label for="surname">Επώνυμο Αναγνώστη:</label></div>
          <div class="col-45"><input type="text" id="surname" name="surname" placeholder="Καταχωρείστε το επώνυμο του αναγνώστη."></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="firstname">Όνομα Αναγνώστη:</label></div>
          <div class="col-45"><input type="text" id="firstname" name="firstname" placeholder="Καταχωρείστε το όνομα του αναγνώστη."></div>
          <div class="col-30"><span class="form_error"> <?php $isbn_error; ?></span></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="Email">Email:</label></div>
          <div class="col-45"><input type="email" id="email" name="email" placeholder="Καταχωρείστε το email." required></div>
          <div class="col-30"><span class="form_error"> <?php $isbn_error; ?></span></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="father_name">Πατρώνυμο:</label></div>
          <div class="col-45"><input type="text" id="father_name" name="father_name" placeholder="Καταχωρείστε το πατρώνυμο."></div>
          <div class="col-30"><span class="form_error"> <?php $isbn_error; ?></span></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="mother_name">Μητρώνυμο:</label></div>
          <div class="col-45"><input type="text" id="mother_name" name="mother_name" placeholder="Καταχωρείστε το μητρώνυμο."></div>
          <div class="col-30"><span class="form_error"> <?php $isbn_error; ?></span></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="date_of_birth">Ημερομηνία γέννησης:</label></div>
          <div class="col-45"><input type="date" min="01/01/1930" id="date_of_birth" name="date_of_birth" placeholder="Καταχωρείστε την ημερομηνία γέννησης του αναγνώστη."></div>
          <div class="col-30"><span class="form_error"> <?php $isbn_error; ?></span></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="sex">Φύλο:</label></div>
          <div class="col-45"><input type="text" id="sex" name="sex" placeholder="Καταχωρείστε το φύλο (Α/Θ)."></div>
          <div class="col-30"><span class="form_error"> <?php $isbn_error; ?></span></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="id_number">Αριθμός ταυτότητας:</label></div>
          <div class="col-45"><input type="text" id="id_number" name="id_number" placeholder="Καταχωρείστε τον αριθμό ταυτότητας."></div>
          <div class="col-30"><span class="form_error"> <?php $isbn_error; ?></span></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="id_issue">Ημερομηνία Έκδοσης:</label></div>
          <div class="col-45"><input type="date" min="01/01/1930" id="id_issue" name="id_issue" placeholder="Καταχωρείστε την ημερομηνία έκδοσης της ταυτότητας."></div>
          <div class="col-30"><span class="form_error"> <?php $isbn_error; ?></span></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="address">Διεύθυνση:</label></div>
          <div class="col-45"><input type="text" id="address" name="address" placeholder="Διεύθυνση του αναγνώστη."></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="city">Πόλη:</label></div>
          <div class="col-45"><input type="text" id="city" name="city" placeholder="Πόλη του αναγνώστη."></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="postal_code">Ταχυδρομικός Κώδικας:</label></div>
          <div class="col-45"><input type="text" id="postal_code" name="postal_code" placeholder="Ταχυδρομικός Κώδικας του αναγνώστη."></div>
        </div>
        <div class="row">
          <input type="submit" value="Καταχώρηση">
        </div>
      </form>
    </div>
