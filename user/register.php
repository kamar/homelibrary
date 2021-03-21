<?php 
session_start();
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
require_once($DOCUMENT_ROOT."/dist/php/connect.php");
require_once("inc/functions.inc.php");
$pdo = pdo_homelibrary();
include($DOCUMENT_ROOT."/ics/head.php");
?>
<div class="container">
<h1>Registrierung</h1>
<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
 
if(isset($_GET['register'])) {
	$error = false;
	$vorname = trim($_POST['vorname']);
	$nachname = trim($_POST['nachname']);
	$email = trim($_POST['email']);
	$passwort = $_POST['passwort'];
	$passwort2 = $_POST['passwort2'];
	
	if(empty($vorname) || empty($nachname) || empty($email)) {
		echo 'Bitte alle Felder ausfüllen<br>';
		$error = true;
	}
  
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
		$error = true;
	} 	
	if(strlen($passwort) == 0) {
		echo 'Bitte ein Passwort angeben<br>';
		$error = true;
	}
	if($passwort != $passwort2) {
		echo 'Die Passwörter müssen übereinstimmen<br>';
		$error = true;
	}
	
	//Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
	if(!$error) { 
		$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		$result = $statement->execute(array('email' => $email));
		$user = $statement->fetch();
		
		if($user !== false) {
			echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
			$error = true;
		}	
	}
	
	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error) {	
		$passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
		
		$statement = $pdo->prepare("INSERT INTO users (email, passwort, vorname, nachname) VALUES (:email, :passwort, :vorname, :nachname)");
		$result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash, 'vorname' => $vorname, 'nachname' => $nachname));
		
		if($result) {		
			echo 'Du wurdest erfolgreich registriert. <a href="login">Zum Login</a>';
			$showFormular = false;
		} else {
			echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
		}
	} 
}
 
if($showFormular) {
?>

<form action="?register=1" method="post">

<div class="row">
	<div class="col-25"><label for="inputVorname">Vorname:</label></div>
	<div class="col-45"><input type="text" id="inputVorname" size="40" maxlength="250" name="vorname" class="form-control" required></div>
</div>

<div class="row">
	<div class="col-25"><label for="inputNachname">Nachname:</label></div>
	<div class="col-45"><input type="text" id="inputNachname" size="40" maxlength="250" name="nachname" class="form-control" required></div>
</div>

<div class="row">
	<div class="col-25"><label for="inputEmail">E-Mail:</label></div>
	<div class="col-45"><input type="email" id="inputEmail" size="40" maxlength="250" name="email" class="form-control" required></div>
</div>

<div class="row">
	<div class="col-25"><label for="inputPasswort">Dein Passwort:</label></div>
	<div class="col-45"><input type="password" id="inputPasswort" size="40"  maxlength="250" name="passwort" class="form-control" required></div>
</div> 

<div class="row">
	<div class="col-25"><label for="inputPasswort2">Passwort wiederholen:</label></div>
	<div class="col-45"><input type="password" id="inputPasswort2" size="40" maxlength="250" name="passwort2" class="form-control" required></div>
</div> 
<div class="row">
	<div class="col-45">
		<input type="submit" value="Registrieren">
	</div>
</div>
</form>
 
<?php
} //Ende von if($showFormular)
	

?>
</div>
<?php 
include($DOCUMENT_ROOT."ics/footer.php");
?>
</body>
</html>