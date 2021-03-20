<?php 
session_start();
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
// require_once("inc/config.inc.php");
require_once($DOCUMENT_ROOT.'/dist/php/connect.php');
require_once("inc/functions.inc.php");

$pdo = pdo_homelibrary();

$error_msg = "";
if(isset($_POST['email']) && isset($_POST['passwort'])) {
	$email = $_POST['email'];
	$passwort = $_POST['passwort'];

	$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
	$result = $statement->execute(array('email' => $email));
	$user = $statement->fetch();

	//Überprüfung des Passworts
	if ($user !== false && password_verify($passwort, $user['passwort'])) {
		$_SESSION['userid'] = $user['id'];

		//Möchte der Nutzer angemeldet beleiben?
		if(isset($_POST['angemeldet_bleiben'])) {
			$identifier = random_string();
			$securitytoken = random_string();
				
			$insert = $pdo->prepare("INSERT INTO securitytokens (user_id, identifier, securitytoken) VALUES (:user_id, :identifier, :securitytoken)");
			$insert->execute(array('user_id' => $user['id'], 'identifier' => $identifier, 'securitytoken' => sha1($securitytoken)));
			setcookie("identifier",$identifier,time()+(3600*24*365)); //Valid for 1 year
			setcookie("securitytoken",$securitytoken,time()+(3600*24*365)); //Valid for 1 year
		}

		header("location: internal");
		exit;
	} else {
		$error_msg =  "E-Mail oder Passwort war ungültig<br><br>";
	}

}

$email_value = "";
if(isset($_POST['email']))
	$email_value = htmlentities($_POST['email']); 

include($DOCUMENT_ROOT."/ics/head.php");
?>
 <div class="container">
  <form action="login" method="post">
	<h2>Login</h2>
	
<?php 
if(isset($error_msg) && !empty($error_msg)) {
	echo $error_msg;
}
?>

	<div class="row">
		<div class="col-25"><label for="inputEmail">E-Mail</label></div>
		<div class="col-45"><input type="email" name="email" id="inputEmail" placeholder="E-Mail" value="<?php echo $email_value; ?>" required autofocus></div>
	</div>
	<div class="row">
		<div class="col-25"><label for="inputPassword">Passwort</label></div>
		<div class="col-45"><input type="password" name="passwort" id="inputPassword" placeholder="Passwort" required></div>
	</div>
	<div class="row">
	  <div class=" col-25 col-45">
		  <label>
				  <input type="checkbox" value="remember-me" name="angemeldet_bleiben" value="1" checked> Angemeldet bleiben
		  </label>
	  </div>
	</div>
	<div class="row">
		<div class="col-45"><input type="submit"></div>
	</div>
	
	<div class="row">
		<div class="col-45"><a href="passwortvergessen">Passwort vergessen</a></div>
	</div>
  </form>

</div> <!-- /container -->
 </body>
 </html>

<?php 
include($DOCUMENT_ROOT."/ics/footer.php")
?>