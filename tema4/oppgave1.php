<?php
$postnr=$_POST["postnr"];
if(!$postnr) {
    print("Postnr er ikke fylt ut </br/>");

} else if (strlen($postnr)!=4) {//1234 | 4 != 4
        print("Postnr må være på 4 tall </br>");
    
} else if (!ctype_digit($postnr)) {
    print("Bruke tall");
} else {
    print("$postnr");
}

print("$postnr");
?>