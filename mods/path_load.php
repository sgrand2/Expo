<?php 


$display = $_GET['disp'];

switch($display)
{
    case "t";
    echo "Students Page where they find out stuffs about companies";
    break; 

    case "e";
    include("$serverroot/mods/employers.php");
    break; 

    case "m";
    include("$serverroot/mods/main_page.php");
    break;

    case "l";
    include("$serverroot/mods/signout.php");
    break; 
    
    case "r";
    include("$serverroot/mods/employer_register.php");
    break; 

Default;
include("$serverroot/mods/main_page.php");

}

?>
