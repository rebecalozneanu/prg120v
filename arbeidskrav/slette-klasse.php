<?php  /* slett-klasse */
/*
/*  Programmet lager et skjema for å velge en klasse som skal slettes
/*  Programmet sjekker om det er studenter i klassen før sletting
/*  Programmet sletter den valgte klassen */
?>

<script src="funksjoner.js"> </script>

<h3>Slett klasse</h3>

<form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" onSubmit="return bekreft()">
  Klasse <br />
  <?php
    // Dynamisk listeboks
    include("db-tilkobling.php");

    echo '<select name="klassekode" id="klassekode">';
    echo '<option value=""> Velg klasse </option>';

    $sql = "SELECT klassekode, klassenavn FROM klasse ORDER BY klassekode;";
    $res = mysqli_query($db, $sql) or die("Feil ved henting av klasser fra databasen");
    while ($rad = mysqli_fetch_assoc($res)) {
        $kode = htmlspecialchars($rad['klassekode'], ENT_QUOTES, 'UTF-8');
        $navn = htmlspecialchars($rad['klassenavn'], ENT_QUOTES, 'UTF-8');
        echo "<option value=\"{$kode}\">{$kode} - {$navn}</option>";
    }

    echo '</select>';
  ?> <br/>
  <input type="submit" value="Slett klasse" name="slettKlasseKnapp" id="slettKlasseKnapp" />
</form>

<?php
  if (isset($_POST["slettKlasseKnapp"]))
    {
      $klassekode = isset($_POST["klassekode"]) ? $_POST["klassekode"] : '';
      if ($klassekode === '')
        {
          print ("Ingen klasse er valgt. <br />");
        }
      else
        {
          include("db-tilkobling.php");

          $kk = mysqli_real_escape_string($db, $klassekode);

          /* Sjekk om det finnes studenter i klassen */
          $sjekkSql = "SELECT COUNT(*) AS cnt FROM student WHERE klassekode = '$kk';";
          $sjekkResult = mysqli_query($db, $sjekkSql) or die("Feil ved sjekk i databasen");
          $row = mysqli_fetch_assoc($sjekkResult);

          if ($row['cnt'] > 0)
            {
              print ("Du kan ikke slette en klasse som har studenter i seg (klassekode: $kk) <br />");
            }
          else
            {
              $sqlSetning = "DELETE FROM klasse WHERE klassekode='$kk';";
              mysqli_query($db, $sqlSetning) or die ("Ikke mulig å slette data i databasen");
              print ("Valgt klasse er nå slettet. <br />");
            }
        }
    }
?>