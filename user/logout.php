<?php 
session_start();
session_destroy();
unset($_SESSION['userid']);

//Remove Cookies
setcookie("identifier","",time()-(3600*24*365)); 
setcookie("securitytoken","",time()-(3600*24*365)); 
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once($DOCUMENT_ROOT."/dist/php/connect.php");
$pdo = pdo_homelibrary();
require_once("inc/functions.inc.php");

include($DOCUMENT_ROOT."/ics/head.php");
?>

<div class="container">
Der Logout war erfolgreich. <a href="login">Zurück zum Login</a>.
</div>
<?php 
include($DOCUMENT_ROOT."/ics/footer.php");
?>
</body>
</html>