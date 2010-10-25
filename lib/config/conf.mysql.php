<?php
/* 
 * This file sets up some global variables so we don't have to repeat them. 
 * Makes things safer too, since there's passwords up in hurr.
 * Also makes it easier to change them, should we ever have to. 
 */
         
$mysql = "localhost";
$dbuname = "netid_test";
$password = 'password';
$dbname = "netid_test";
global $dbname;

global $link;
$link = mysql_connect($mysql, $dbuname, $password);      

//global $allowregister;
//$allowregister = "no"

?>
