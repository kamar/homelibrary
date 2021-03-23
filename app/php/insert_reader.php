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
        require 'connect.php';

        $firstname = $_POST['firstname'];           
        if (strlen($firstname)==0){
            $firstname = NULL;
        }
        $surname = trim($_POST['surname']);
        if (strlen($surname)==0){
            $surname = NULL;
        }
        $father_name = trim($_POST['father_name']);
        $mother_name = trim($_POST['mother_name']);
        $date_of_birth = $_POST['date_of_birth'];
        $sex = trim($_POST['sex']);
        $id_number = trim($_POST['id_number']);
        $id_issue = $_POST['id_issue'];
        $address = trim($_POST['address']);
        $city = trim($_POST['city']);
        $postal_code = trim($_POST['postal_code']);
        $email = trim($_POST['email']);

        $con = pdo_homelibrary();
        $query = "INSERT INTO tbl_readers (surname, firstname, father_name, mother_name, date_of_birth, sex, id_number, id_issue, address, city, postal_code, email)
        VALUES (:surname, :firstname, :father_name, :mother_name, :date_of_birth, :sex, :id_number, :id_issue, :address, :city, :postal_code, :email) RETURNING *";

        $result = $con->prepare($query);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $result->bindParam(':father_name', $father_name, PDO::PARAM_STR);
        $result->bindParam(':mother_name', $mother_name, PDO::PARAM_STR);
        $result->bindParam(':date_of_birth', $date_of_birth, PDO::PARAM_STR);
        $result->bindParam(':sex', $sex, PDO::PARAM_STR, 1);
        $result->bindParam(':id_number', $id_number, PDO::PARAM_STR);
        $result->bindParam(':id_issue', $id_issue, PDO::PARAM_STR);
        $result->bindParam(':address', $address, PDO::PARAM_STR);
        $result->bindParam(':city', $city, PDO::PARAM_STR);
        $result->bindParam(':postal_code', $postal_code, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);

        try{
            $result->execute();
            $reader = $result->fetchAll();
            if (sizeof($reader)>0){
                foreach ($reader as $r) {
                    echo '<div id="myModal" class="modal">';
                    echo"<div class='modal-content'>";
                    echo "<div class='modal-header'>";
                    echo '<span class="close">&times;</span>';
                    echo "<h2>Επιτυχής Εισαγωγή Αναγνώστη (Μέλους)</h2>";
                  echo "</div>";
                  echo '<div class="modal-body">';
                      echo "<p>Ονοματεπώνυμο: ".$r['firstname']." ".$r['surname']."</p>";
                  echo "</div>";
                  echo '<div class="modal-body">';
                      echo "<p>Πατρώνυμο: ".$r['father_name']."</p>";
                  echo "</div>";
                  echo '<div class="modal-body">';
                      echo "<p>Μητρώνυμο: ".$r['mother_name']."</p>";
                  echo "</div>";
                  echo '<div class="modal-body">';
                      echo "<p>Φύλο: ".$r['sex']."</p>";
                  echo "</div>";
                  echo '<div class="modal-body">';
                    $dofb = new DateTime($r['date_of_birth']);    
                  echo "<p>Ημερομηνία Γέννησης: ".$dofb->format('d-m-Y')."</p>";
                  echo "</div>";
                  echo '<div class="modal-body">';
                      echo "<p>Αριθμός ταυτότητας: ".$r['id_number']."</p>";
                  echo "</div>";
                  echo '<div class="modal-body">';
                    $dt = new DateTime($r['id_issue']);    
                  echo "<p>Ημερομηνία Έκδοσης: ".$dt->format('d-m-Y')."</p>";
                  echo "</div>";
                  echo '<div class="modal-body">';
                      echo "<p>Διεύθυνση: ".$r['address']." ".$r['postal_code']." ".$r['city']."</p>";
                  echo "</div>";
                }
            }
            echo "</div>";
        echo "</div>";
        }
        catch (PDOException $e){
            echo '<div id="myModal" class="modal">';
            echo"<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo '<span class="close">&times;</span>';
            echo "<h2>Δεν έγινε εισαγωγή του Αναγνώστη.</h2>";
            echo "</div>";
            echo "<div class='modal-body'>";
            echo "<h3>Exception: </h3>";
            if ($e->getCode() == '23502'){
                echo "<p>Το όνομα και το επίθετο δεν πρέπει να είναι κενά.</p>";     
            }
            elseif ($e->getCode() == '23514'){
                echo "<p>Το όνομα και το επίθετο πρέπει να συμπληρωθούν σωστά.</p>";     
            }
            echo "<p>".$e->getMessage()."</p>";
            // $errors = $result->errorInfo();
            // echo "<p>".$errors[2]."</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";      
        }
        $con = null;
    ?>
    <script src="/dist/modal.js"></script>
    </body>
</html>