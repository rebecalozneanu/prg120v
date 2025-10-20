<?php /* slette-student */
/*
/* Programmet lager et skjema for å kunne slette et student
/* Programmet sletter det valgte studiet
*/
?>
<script src="funksjoner.js"> </script>
<h3>slette student</h3>
<form method="post" action="" id="sletteStudentSkjema" name="sletteStudentSkjema" onSubmit="return bekreft()">
brukernavn$brukernavn <input type="text" id="brukernavn$brukernavn" name="brukernavn$brukernavn" required /> <br/>
<input type="submit" value="Slette student" name="sletteStudentKnapp" id="sletteStudentKnapp" />
</form>
<?php
if (isset($_POST ["sletteStudentKnapp"]))
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$brukernavn=$_POST ["brukernavn$brukernavn"];
$sqlSetning="DELETE FROM student WHERE brukernavn='$brukernavn';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende student er n&aring; slettet: $brukernavn <br />");
}
?>