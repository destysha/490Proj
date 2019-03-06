<?php

$myfile = fopen("log.txt","a+") or die ("file can not open");
$today = date("l jS \of F Y h:i:s A");
$fail = "Logged in unsuccessful for $username  $today \n";
fwrite($myfile,$fail);
fcloser($myfile);	

?>
