<?php 


$display = $_GET['disp'];

switch($display)
{
    case "t";
    echo "Students Page where they find out stuffs about companies";
    break; 

    case "e";
    echo "Employers Page where they find out stuffs about students school";
    break; 

    case "m";
include("$serverroot/mods/main_page.php");
    break;

Default;
include("$serverroot/mods/main_page.php");

}

?>
