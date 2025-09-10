<?php 
$svar=$_POST ["svar"];
if (!$svar) 
{
print("Du har ikke svart p&aring; sp&oslash;rsm&aring;let om du er student <br/>");
}
else if ($svar == "j") 
{
print("Du har svart ja p&aring; sp&oslash;rsm&aring;let om du er student <br/>");
}
else if ($svar == "n") 
{
print("Du har svart nei p&aring; sp&oslash;rsm&aring;let om du er student <br/>");
}
else 
{
print("Du har ikke svart ja eller nei p&aring; sp&oslash;rsm&aring;let om du er student <br/>");
}
?>
