<?php
$emnekode=$_POST["emnekode"];
if (!$emnekode){
    print("emnekode ikke er fylt</br>");

 }else if(strlen($emnekode)!=7){
    print("man må ha 7 tegn")
 }else{
    $tegn1=$emnekode[0];
    $tegn2=$emnekode[1];
    $tegn3=$emnekode[2];
    $steg4=$emnekode[3];
    $steg5=$emnekode[4];
    $steg6=$emnekode[5];
    $sted7=$emnekode[6];

    if (ctype_digit($tegn1)){

         print("første tegn må være en bokstav");
        
    } else if (ctype_digit($tegn2)) {
        print("andre tegn skal være en bokstav");

    }
    else if (ctype_digit($tegn3)){
        print("tredje skla være et bokstav");
    }else if(!ctype_digit($steg4)){
        print("fjerde skal være en tall")
    }else if (ctype_digit($steg5))

}

