<?php

session_start();
print "<pre>";
echo "WELCOME". "\t ".$_COOKIE["cookie_username"]."<br>"."<br>";
print "<pre>";
echo "Full name is". "\t ".$_SESSION["session_fullname"]."<br>";
print "<pre>";
echo "User name is". " \t".$_SESSION["session_username"]."<br>";
print "<pre>";
echo "User name is". " \t".$_SESSION["session_email"]."<br>";
print "<pre>";
echo "Power Animal is". "\t ".$_SESSION["session_animal"]."<br>";
print "<pre>";
echo '<img src="'.$_SESSION["session_animal"].'">';
?>