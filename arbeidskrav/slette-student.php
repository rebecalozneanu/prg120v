<?php  /* slett-student */
/*
/*  Programmet lager et skjema for å velge en student som skal slettes
/*  Programmet sletter den valgte studenten */
?>

<script src="funksjoner.js"> </script>

<h3>Slett student</h3>

<form method="post" action="" id="slettStudentSkjema" name="slettStudentSkjema" onSubmit="return bekreft()">
  Student <br />
  <?php
    // Dynamisk listeboks
    include("db-tilkobling.php");

    echo '<select name="brukernavn" id="brukernavn">';
    echo '<option value=""> Velg student </option>';

    $sql = "SELECT brukernavn, fornavn, etternavn FROM student ORDER BY etternavn, fornavn;";
    $res = mysqli_query($db, $sql) or die("Feil ved henting av studenter fra databasen");
    while ($rad = mysqli_fetch_assoc($res)) {
        $brukernavn = htmlspecialchars($rad['brukernavn'], ENT_QUOTES, 'UTF-8');
        $navn = htmlspecialchars(trim($rad['fornavn'] . ' ' . $rad['etternavn']), ENT_QUOTES, 'UTF-8');
        echo "<option value=\"{$brukernavn}\">{$navn} ({$brukernavn})</option>";
    }

    echo '</select>';
  ?> <br/>
  <input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" />
</form>

<?php
  if (isset($_POST["slettStudentKnapp"]))
    {
      $brukernavn = isset($_POST["brukernavn"]) ? $_POST["brukernavn"] : '';
      if ($brukernavn === '')
        {
          print ("Ingen student er valgt. <br />");
        }
      else
        {
          include("db-tilkobling.php");

          $bn = mysqli_real_escape_string($db, $brukernavn);
          $sqlSetning = "DELETE FROM student WHERE brukernavn='$bn';";
          mysqli_query($db, $sqlSetning) or die ("Ikke mulig å slette data i databasen");
          print ("Valgt student er nå slettet. <br />");
        }
    }
?>