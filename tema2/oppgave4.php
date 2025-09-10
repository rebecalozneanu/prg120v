<?php 
$gift=$_POST ["gift"];
$barn=$_POST ["barn"];
if (!$gift || !$barn) 
{
print("Du har ikke svart p&aring; begge sp&oslash;rsm&aring;lene <br/>");
}
else if ($gift == "j" && $barn == "j") 
{
print("Du er gift og har barn <br/>");
}
else if ($gift == "j" && $barn == "n") 
{
print("Du er gift og har ikke barn <br/>");
}
else if ($gift == "n" && $barn == "j") 
{
print("Du er ikke gift og har barn <br/>");
}
else if ($gift == "n" && $barn == "n")
{
print("Du er ikke gift og har ikke barn <br/>");
}
else 
{
print("Du har ikke svart ja eller nei p&aring; begge sp&oslash;rsm&aring;lene <br/>");
}
?>

