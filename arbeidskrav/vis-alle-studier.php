<?php /* vis-alle-studier */
/*
/* Programmet skriver ut alle registrerte studier
*/
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$sqlSetning="SELECT * FROM student ORDER BY studentkode;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
/* SQL-setning sendt til database-serveren */
$antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */
print ("<h3>Registrerte studier </h3>");
print ("<table border=1>");
print ("<tr><th align=left>studentkode</th> <th align=left>studentnavn</th> </tr>");
for ($r=1;$r<=$antallRader;$r++)
{
$rad=mysqli_fetch_array($sqlResultat);
$studentkode=$rad["studentkode"];
$elevnavn=$rad["studentnavn"];
print ("<tr> <td> $studentkode </td> <td> $elevnavn </td> </tr>");
}
print ("</table>");
?>