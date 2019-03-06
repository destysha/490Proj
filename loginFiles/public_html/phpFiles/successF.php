<?php

$myfile = fopen("log.txt","a+") or die ("file can not open");
$today = date("l jS \of F Y h:i:s A");
$success = "Logged in successful for $username  $today \n";
fwrite($myfile,$success);
fcloser($myfile);	

?>
