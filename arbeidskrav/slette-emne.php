<?php /* slett-emne */
/*
/* Programmet lager et skjema for å kunne slette et emne
/* Programmet sletter det valgte emne
*/
?>
<script src="funksjoner.js"> </script>
<h3>slette emne</h3>
<form method="post" action="" id="sletteemneskjema" name="sletteemneskjema" onSubmit="return bekreft()">
Emnekode <input type="text" id="sletteemne" name="sletteemne" required /> <br/>
<input type="submit" value="Slett emne" name="sletteemneKnapp" id="sletteemneKnapp" />
</form>
<?php
if (isset($_POST ["sletteemneKnapp"]))
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$emnekode=$_POST ["sletteemne"];
$sqlSetning="DELETE FROM emne WHERE emnekode='$emnekode';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende emne er n&aring; slettet: $emnekode <br />");
}
?>