<?php
$klassenr=$_POST["klassenr"];
if(!$klassenr){
    print("klassenr er ikke fylt ut </br>");

}else if (strlen($klassenr)!=3){
    print("Du må ha tre tegn");
}
else{
    $tegn1=$klassenr[0];
    $tegn2=$klassenr[1];
    $tegn3=$klassenr[2];

    if (ctype_digit($tegn1)){

         print("første tegn må være en bokstav");
        
    } else if (ctype_digit($tegn2)) {
        print("andre tegn skal være en bokstav");

    }
    else if (!ctype_digit($step3)){
        print("tredje skla være et tall");
    }else{
        print("det ble riktig klassenr $klassenr");
    }
}


