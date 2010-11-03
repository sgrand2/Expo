<?php
echo "<div class='tempcolor'>";

echo "So students can pretty much query which companies and where
	they are going to be for that day";

echo "<br />An example here would be the companies attending, but we will allow
	students to search to their liking. <br /> The following are companies in the database";
Tools::InitMysql();

$static_query = "Select * From Company";
$query = Tools::Query($static_query);
while($row = mysql_fetch_array($query))
{
	$companyname = $row['Company_name'];
	$classtat =  $row['Class_status'];
	$dtype=  $row['Degree_type'];
	echo "<br /><strong>$companyname</strong> <br />Year looking: $classtat <br /> Degree Type: $dtype";
}
echo "</div>";
?>
