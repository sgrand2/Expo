<?php
/******************************************************************************
All user variables are defined here at startup to be placed in the user's
Session. This should be the first thing that is called so that proper
functions and libraries can be called
******************************************************************************/


//$serveroot is the root directory from the server variable settings
foreach(glob($_SERVER['DOCUMENT_ROOT']) as $serverroot);

//This will begin the user session
session_start();


?>

