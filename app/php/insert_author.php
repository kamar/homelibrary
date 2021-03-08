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
    <link href="/dist/style.css" rel="stylesheet">
  </head>
  <body>

    <!-- <button id="myBtn">Open Modal</button> -->
    <?php
    include 'connect.php';

    $firstname = $_POST['firstname'];           
    if (strlen($firstname)==0){
      $firstname = NULL;
    }
    $surname = $_POST['surname'];
    if (strlen($surname)==0){
      $surname = NULL;
    }
    $email = $_POST['email'];
    $site = $_POST['site'];   
    $bio = $_POST['bio'];

    $con = pdo_homelibrary();
    
    $query = "INSERT INTO tbl_author (firstname, surname, email, site, bio) 
    VALUES (:firstname, :surname, :email, :site, :bio) RETURNING *";
    
    $result = $con->prepare($query);
    $result->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $result->bindParam(':surname', $surname, PDO::PARAM_STR);
    $result->bindParam(':email', $email, PDO::PARAM_STR);
    $result->bindParam(':site', $site, PDO::PARAM_STR);
    $result->bindParam(':bio', $bio, PDO::PARAM_STR);

    try{
      $result -> execute() or die("Query failed.");
      
      $author = $result ->fetchAll();
      if (sizeof($author )>0){
        foreach ($author as $t){
        echo '<div id="myModal" class="modal">';
            echo"<div class='modal-content'>";
              echo "<div class='modal-header'>";
                echo '<span class="close">&times;</span>';
                echo "<h2>Επιτυχής Εισαγωγή Συγγραφέα</h2>";
              echo "</div>";
              echo '<div class="modal-body">';
                  echo "<p>Ονοματεπώνυμο: ".$t['firstname']." ".$t['surname']."</p>";
              echo "</div>";
              echo '<div class="modal-body">';
                  echo "<p>Email: ".$t['email']."</p>";
              echo "</div>";
              echo '<div class="modal-body">';
                  echo "<p>Ιστοσελίδα: ".$t['site']."</p>";
              echo "</div>";
              echo '<div class="modal-body">';
                  echo "<p>Βιογραφικό: ".$t['bio']."</p>";
              echo "</div>";
                  }
    }
    echo "</div>";
  echo "</div>";
  } 
      catch (PDOException $e)
      {
        echo '<div id="myModal" class="modal">';
        echo"<div class='modal-content'>";
        echo "<div class='modal-header'>";
          echo '<span class="close">&times;</span>';
          echo "<h2>Δεν έγινε εισαγωγή του συγγραφέα.</h2>";
        echo "</div>";
        echo "<div class='modal-body'>";
          echo "<p>Exception: ".$e->getMessage()."</p>";
          $errors = $result->errorInfo();
          echo "<p>".$errors[2]."</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";      }
    
    $con = null;
    ?>
    <script src="/dist/modal.js"></script>
  </body>
</html>