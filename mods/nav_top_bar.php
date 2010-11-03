<?php

echo "<div id = 'top_nav_bar'>";
echo "<a href = './index.php?disp=t'>Students</a>";
echo " | ";
echo "<a href = './index.php?disp=m'>Home</a>";
echo " | ";
if (isset($_SESSION['UNAME']))
{
	echo "<a href = './index.php?disp=l'>Logout</a>";
}else 
{
	echo "<a href = './index.php?disp=l'>Login</a>";
}
echo "</div>";


?>
