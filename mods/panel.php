<?php
$committee_menu_option = $_GET['cmod'];

echo "<div class='LRPanel'>";

if (isset($_SESSION['netid']))
{
//////////////////////////////////////

echo "<div class='lpanel'>";
  echo "<a href='/index.php?disp=panel&cmod=main'>Expo Settings</a><br />";
  echo "<a href='/index.php?disp=panel&cmod=comp'>Company Settings</a>";
echo "</div>";

//////////////////////////////////////

echo "<div class='rpanel'>";


switch($committee_menu_option)
{

  case "main";
  include ("$serverroot/mods/expo_settings.php");
  break;
  
  case "comp";
  include ("$serverroot/mods/company_settings.php");
  break;

Default;
echo "Display Current Expo Statistics Right here Maybe a moderation queue?";
echo "or something that reflects the current committee actions";

}
echo "</div>";


}else
{
  echo "ZOMG YOU're not logged in";
}


echo "</div>";


?>
