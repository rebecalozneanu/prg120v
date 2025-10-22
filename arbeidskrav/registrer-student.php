<?php 
?>
<h3>Registrer student
    </h3>
<form method="post" action="" id="registrerStudiumSkjema" name="registrerStudiumSkjema">
brukernavn <input type="text" id="brukernavn" name="brukernavn" required /> <br/>
fornavn <input type="text" id="fornavn" name="fornavn" required /> <br/>
etternavn <input type="text" id="etternavn" name="etternavn" required /> <br/>
klassekode 
<select id="klassekode" name="klassekode" required>
    <option value="">Velg klassekode</option>
    <option value="IT1">IT1</option>
    <option value="IT2">IT2</option>
    <option value="IT3">IT3</option>
</select> <br/>

<input type="submit" value="Registrer student" id="registrerStudiumKnapp" name="registrerStudiumKnapp" />
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
if (isset($_POST ["registrerStudiumKnapp"]))
{
$brukernavn=$_POST ["brukernavn"];
$fornavn=$_POST ["fornavn"];
$etternavn=$_POST ["etternavn"];
$klassekode=$_POST ["klassekode"];
if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode)
{
print ("Alle felt m&aring; fylles ut");
}
else
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$sqlSetning="SELECT * FROM student WHERE klassekode='$brukernavn';";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
$antallRader=mysqli_num_rows($sqlResultat);
if ($antallRader!=0) /* studiet er registrert fra før */
{
print ("Studenten er registrert fra f&oslashr");
}
else
{
$sqlSetning="INSERT INTO student (brukernavn,fornavn,etternavn,klassekode)
VALUES('$brukernavn','$fornavn','$etternavn','$klassekode');";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende klasse er n&aring; registrert: $brukernavn $fornavn $etternavn $klassekode");
}
}
}
?>