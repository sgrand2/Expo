<?php 


$display = $_GET['disp'];

switch($display)
{
    case "t";
    include("$serverroot/mods/students.php");
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
    
    case "panel";
    include("$serverroot/mods/panel.php");
    break; 

Default;
include("$serverroot/mods/main_page.php");

}

?>
