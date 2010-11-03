<?php
echo "<div class='tempcolor'>";
if ($_SESSION['LOGGED_IN'] == 1)
{
$fname = $_SESSION['First_Name'];
$netid = $_SESSION['netid'];
$email = $_SESSION['Email'];
echo "Hello $fname it looks like you are logged in as $netid $email";

}
echo "</div>";
?>
