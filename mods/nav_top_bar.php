<?php

echo "<div id = 'top_nav_bar'>";
echo "<a href = './index.php?disp=m'>Home</a>";
echo " | ";
echo "<a href = './index.php?disp=t'>Students</a>";
echo " | ";
echo "<a href = './index.php?disp=e'>Employers</a>";
if (isset($_SESSION['netid']))
{
echo " | ";
echo "<a href = './index.php?disp=panel'>Committee Panel</a>";
}

if (($_SESSION['LOGGED_IN']) == 1)
{
echo " | ";
	echo "<a href = './index.php?disp=l'>Logout</a>";
} 
echo "</div>";


?>
