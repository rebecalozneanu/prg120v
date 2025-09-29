<?php /* registrer-studium */
/*
/* Programmet lager et html-skjema for å registrere et studium
/* Programmet registrerer data (studiumkode og studiumnavn) i databasen
*/
?>
<h3>Registrer studium </h3>
<form method="post" action="" id="registrerStudiumSkjema" name="registrerStudiumSkjema">
klassekode <input type="text" id="klassekode" name="klassekode" required /> <br/>
klassenavn <input type="text" id="klassenavn" name="klassenavn" required /> <br/>
Studiumkode <input type="text" id="studiumnavn" name="studiumnavn" required /> <br/>
<input type="submit" value="Registrer studium" id="registrerStudiumKnapp" name="registrerStudiumKnapp" />
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
if (isset($_POST ["registrerStudiumKnapp"]))
{
$klassekode=$_POST ["klassekode"];
$klassenavn=$_POST ["klassenavn"];
$studiumkode=$_POST ["studiumkode"];
if (!$klassekode || !$klassemnavn || !$studiumkode)
{
print ("Alle felt m&aring; fylles ut");
}
else
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$sqlSetning="SELECT * FROM klasse WHERE klassekode='$studiumkode';";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
$antallRader=mysqli_num_rows($sqlResultat);
if ($antallRader!=0) /* studiet er registrert fra før */
{
print ("Studiet er registrert fra f&oslashr");
}
else
{
$sqlSetning="INSERT INTO studium (studiumkode,studiumnavn)
VALUES('$klassekode','$klassenavn','$studiumkode');";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende studium er n&aring; registrert: $klassekode $klassenavn $studiumkode");
}
}
}
?>
