<?php
/* registrer-student */
/*
/* Programmet lager et HTML-skjema for å registrere en student
/* Programmet registrerer data i databasen
*/
?>

<h3>Registrer student</h3>

<form method="post" action="" id="registrerStudentSkjema" name="registrerStudentSkjema">
  Brukernavn <input type="text" id="brukernavn" name="brukernavn" required /> <br/>
  Fornavn <input type="text" id="fornavn" name="fornavn" required /> <br/>
  Etternavn <input type="text" id="etternavn" name="etternavn" required /> <br/>
  Klassekode 
  <select id="klassekode" name="klassekode" required>
    <option value="">Velg klassekode</option>
    <option value="IT1">IT1</option>
    <option value="IT2">IT2</option>
    <option value="IT3">IT3</option>
  </select> <br/>
  
  <input type="submit" value="Registrer student" id="registrerStudentKnapp" name="registrerStudentKnapp" />
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php
if (isset($_POST["registrerStudentKnapp"])) {
  $brukernavn = $_POST["brukernavn"];
  $fornavn = $_POST["fornavn"];
  $etternavn = $_POST["etternavn"];
  $klassekode = $_POST["klassekode"];

  // Ekstra validering av klassekode
  $gyldigeKlassekoder = ["IT1", "IT2", "IT3"];
  if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode) {
    print("Alle felt må fylles ut");
  } elseif (!in_array($klassekode, $gyldigeKlassekoder)) {
    print("Ugyldig klassekode valgt");
  } else {
    include("db-tilkobling.php"); // Tilkobling til database-serveren og valg av database

    $sqlSetning = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
    $sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");
    $antallRader = mysqli_num_rows($sqlResultat);

    if ($antallRader != 0) {
      print("Studenten er registrert fra før");
    } else {
      $sqlSetning = "INSERT INTO student (brukernavn, fornavn, etternavn, klassekode)
                     VALUES ('$brukernavn', '$fornavn', '$etternavn', '$klassekode');";
      mysqli_query($db, $sqlSetning) or die("Ikke mulig å registrere data i databasen");
      print("Følgende student er nå registrert: $brukernavn $fornavn $etternavn $klassekode");
    }
  }
}
?>