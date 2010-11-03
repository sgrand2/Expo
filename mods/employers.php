<?php

$regrep    = $_GET['rep'];
$signed_in = $_SESSION['LOGGED_IN'];
//if the user session is not set have them try to login or create a profile
if ($regrep == 1)
{
	//here we will include a form which will let the individual representative
	//Register
	include("$serverroot/mods/rep_reg.php");
}
else
{
	if($signed_in != 1)
	include("$serverroot/mods/signin.php");
}
//if it is set provide them a panel to change their company info

?>
