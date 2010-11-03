<?php

echo "<div id = 'top_nav_bar'>";
echo "<a href = './index.php?disp=m'>Home</a>";
echo " | ";
echo "<a href = './index.php?disp=t'>Students</a>";
echo " | ";
echo "<a href = './index.php?disp=e'>Employers</a>";
echo " | ";

if (($_SESSION['LOGGED_IN']) == 1)
{
	echo "<a href = './index.php?disp=l'>Logout</a>";
}else 
{
	echo "<a href = './index.php?disp=r'>Register</a>";
	echo $_SESSION['LOGGED_IN'];
}
echo "</div>";


?>
