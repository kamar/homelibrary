<?php
session_start();
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
// require_once("inc/config.inc.php");
require_once($DOCUMENT_ROOT."/dist/php/connect.php");
require_once("inc/functions.inc.php");

$pdo = pdo_homelibrary();
//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();

include($DOCUMENT_ROOT."/ics/head.php");
// include("templates/header.inc.php");
?>

<div class="container main-container">

<h1>Herzlich Willkommen!</h1>

Hallo <?php echo htmlentities($user['vorname']); ?>,<br>
Herzlich Willkommen im internen Bereich!<br><br>

<div>
 
<table id="bookloan">
<tr>
	<th>#</th>
	<th>Vorname</th>
	<th>Nachname</th>
	<th>E-Mail</th>
</tr>
<?php 
$statement = $pdo->prepare("SELECT * FROM users ORDER BY id");
$result = $statement->execute();
$count = 1;
while($row = $statement->fetch()) {
	echo "<tr>";
	echo "<td>".$count++."</td>";
	echo "<td>".$row['vorname']."</td>";
	echo "<td>".$row['nachname']."</td>";
	echo '<td><a href="mailto:'.$row['email'].'">'.$row['email'].'</a></td>';
	echo "</tr>";
}
?>
</table>
</div>


</div>
<?php 
include($DOCUMENT_ROOT."/ics/footer.php");
?>
</body>
</html>
