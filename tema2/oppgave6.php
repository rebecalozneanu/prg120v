<?php 
$tall1=$_POST ["tall1"];
$tall2=$_POST ["tall2"];
print ("Tall 1 er $tall1 <br/>");
print ("Tall 2 er $tall2 <br/>"); /* de 2 tallene skrevet ut */
print ("<br/>");
if ($tall1 < $tall2) /* tall 1 er mindre enn tall 2 */
{
print ("Tall 1 er mindre enn Tall 2 <br/>");
}
else if ($tall1 == $tall2) /* tall 1 er lik tall 2 */
{
print ("Tall 1 er lik Tall 2 <br/>");
}
else if ($tall1 > $tall2) /* tall 1 er større enn tall 2 */
{
print ("Tall 1 er st&oslash;rre enn Tall 2 <br/>");
}
?>
