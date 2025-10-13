<?php /* slette-student */
/*
/* Programmet lager et skjema for å kunne slette et student
/* Programmet sletter det valgte studiet
*/
?>
<script src="funksjoner.js"> </script>
<h3>slette student</h3>
<form method="post" action="" id="sletteStudentSkjema" name="sletteStudentSkjema" onSubmit="return bekreft()">
Studentkode <input type="text" id="studentkode" name="studentkode" required /> <br/>
<input type="submit" value="Slette student" name="sletteStudentKnapp" id="sletteStudentKnapp" />
</form>
<?php
if (isset($_POST ["sletteStudentKnapp"]))
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$studentumkode=$_POST ["studentkode"];
$sqlSetning="DELETE FROM student WHERE studentkode='$studentkode';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende student er n&aring; slettet: $studentkode <br />");
}
?>