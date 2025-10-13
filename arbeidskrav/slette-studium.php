<?php /* slette-studium */
/*
/* Programmet lager et skjema for å kunne slette et studium
/* Programmet sletter det valgte studiet
*/
?>
<script src="funksjoner.js"> </script>
<h3>slette studium</h3>
<form method="post" action="" id="sletteStudiumSkjema" name="sletteStudiumSkjema" onSubmit="return bekreft()">
Studiumkode <input type="text" id="studiumkode" name="studiumkode" required /> <br/>
<input type="submit" value="Slett studium" name="slettStudiumKnapp" id="slettStudiumKnapp" />
</form>
<?php
if (isset($_POST ["sletteStudiumKnapp"]))
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$studiumkode=$_POST ["studiumkode"];
$sqlSetning="DELETE FROM studium WHERE studiumkode='$studiumkode';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende studium er n&aring; slettet: $studiumkode <br />");
}
?>