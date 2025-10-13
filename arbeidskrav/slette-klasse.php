<?php /* slett-klasse */
/*
/* Programmet lager et skjema for å kunne slette et klasse
/* Programmet sletter det valgte klasse
*/
?>
<script src="funksjoner.js"> </script>
<h3>slette klasse</h3>
<form method="post" action="" id="sletteemneskjema" name="sletteemneskjema" onSubmit="return bekreft()">
Emnekode <input type="text" id="sletteklasse" name="sletteklasse" required /> <br/>
<input type="submit" value="Slett klasse" name="sletteemneKnapp" id="sletteemneKnapp" />
</form>
<?php
if (isset($_POST ["sletteemneKnapp"]))
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$emnekode=$_POST ["sletteklasse"];
$sqlSetning="DELETE FROM klasse WHERE emnekode='$emnekode';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende klasse er n&aring; slettet: $emnekode <br />");
}
?>