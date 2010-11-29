<?php
$committee_menu_option = $_GET['cmod'];
$addexpo = $_GET['addexpo'];
$setexpo = $_GET['setexpo'];
$set_current_expo = $_POST['set_current_expo'];
$semester_post = $_POST['semester'];
$year_post     = $_POST['year'];



Tools::InitMysql();
//Display all the old Expo
echo "<p align='left'>";
echo "<u>Set Current Expo</u><br />";
$setting_expos = "Select * From Expo_Main";
$drop_down     = Tools::Query($setting_expos);
echo "<form action ='index.php?disp=panel&cmod=main&setexpo=1' method='post'>";
echo "<select name='set_current_expo'>";
while($row = mysql_fetch_array($drop_down))
{
    $Year = $row['Year'];
    $Semester = $row['Semester'];
    $Expo_ID  = $row['Expo_ID'];
    echo "<option value='$Expo_ID'>$Semester $Year</option>";
}
echo "</select>";
echo "<input type='submit' value='Current Expo'></form><br />";

echo "<u>Past Expo</u> <br />";
$existing_expo = "Select * From Expo_Main";
$display_old_expos = Tools::Query($existing_expo);
//Give the option to edit an expo
//
echo "<form action ='index.php?disp=panel&cmod=main&addexpo=1' method='post'>";
echo "<table border='1px'>";
while($row = mysql_fetch_array($display_old_expos))
{
    $Year = $row['Year'];
    $Semester = $row['Semester'];
    $Expo_ID  = $row['Expo_ID'];
    echo "<tr><td><input type='radio' name = 'expo_id' value='$Expo_ID'></td> <td>$Year</td> <td>$Semester</td></tr>";
}
echo "</table>";
echo "</p>";




//Add New Expo
echo "<p align='left'>";
echo "<u>Add New Expo</u><br/>";
echo "<form action ='index.php?disp=panel&cmod=main&addexpo=1' method='post'>";
    echo "<strong>Year:</strong><br /><input type='text' name = 'year' /><br />";
    echo "<strong>Semester:</strong> <br /><select name='semester'>";
    echo "<option value='Spring'>Spring</option>";
    echo "<option value='Fall'>Fall</option>";
    echo "</select><br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<input type='submit'>";
    echo "</form>";
    echo "</p>";

//Grab current Expo
    $expo_date_id = "Select * FROM site_setting WHERE indexo = '1';
    $set_expo_id = Tools::Query($expo_date_id);
    while($row = mysql_fetch_array($set_expo_id))
    {
        $eid = $row[current_expo_id];
    }

    $semester_set = "Select * From Expo_Main WHERE Expo_ID = '$eid'";
    $semester_result = Tools:Query($semester_set);
    while($row = mysql_fetch_array($set_expo_id))
    {
        $sem = $row['Semester'];
        $yr  = $row['Year'];
    }

//Set Expo days

if($addexpo == 1)
{
    $result = "INSERT INTO `Expo_Main` (`Year`, `Semester`) VALUES ('$year_post', '$semester_post')";
    mysql_query($result, $link);

}

if($setexpo== 1)
{
    $update_tuple = "UPDATE site_setting SET current_expo_id ='$set_current_expo' WHERE indexo = '1'";
    mysql_query($update_tuple, $link);
   echo $set_current_expo;
}




?>
