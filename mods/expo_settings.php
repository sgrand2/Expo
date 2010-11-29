<?php
$committee_menu_option = $_GET['cmod'];
$addexpo = $_GET['addexpo'];
$setexpo = $_GET['setexpo'];
$delday = $_GET['delday'];
$delexpoid = $_GET['delexpoid'];


$set_current_expo = $_POST['set_current_expo'];
$semester_post   = $_POST['semester'];
$year_post       = $_POST['year'];
$del_day_post        = $_POST['delete_day'];
$delete_eid_post = $_POST['del_eid'];
$delete_expo = $_POST['delete_expo'];


$adday= $_GET['adday'];
$add_new_day_post = $_POST['add_new_day'];
$num_table_post = $_POST['num_table'];
$add_eid_post = $_POST['add_eid'];


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





//delete an expo and all old associated data
echo "<u>Remove Past Expo and Data</u><hr /> <br />";
$existing_expo = "Select * From Expo_Main";
$display_old_expos = Tools::Query($existing_expo);
//Give the option to edit an expo
//
echo "<form action ='index.php?disp=panel&cmod=main&delexpoid=1' method='post'>";
echo "<table border='1px'>";
while($row = mysql_fetch_array($display_old_expos))
{
    $Year = $row['Year'];
    $Semester = $row['Semester'];
    $Expo_ID  = $row['Expo_ID'];
    echo "<tr><td><input type='radio' name ='delete_expo' value='$Expo_ID'></td> <td>$Year</td> <td>$Semester</td> <td>$Expo_ID</td></tr>";
}
echo "</table>";
echo "<input type='submit' value='Remove Old Expo and Data'></form><br />";
echo "<p>*Warning this will delete all data related with that expo</p>";
echo "</p></form>";




//Add New Expo
echo "<p align='left'>";
echo "<u>Add New Expo</u> <hr /><br/>";
echo "<form action ='index.php?disp=panel&cmod=main&addexpo=1' method='post'>";
    echo "<strong>Year:</strong><br /><input type='text' name = 'year' /><br />";
    echo "<strong>Semester:</strong> <br /><select name='semester'>";
    echo "<option value='Spring'>Spring</option>";
    echo "<option value='Fall'>Fall</option>";
    echo "</select><br />";
    echo "<input type='submit'>";
    echo "</form>";
    echo "</p><hr />";

//Grab current Expo
    $expo_date_id = "Select * FROM site_setting WHERE indexo = '1'";
    $set_expo_id = Tools::Query($expo_date_id);
    while($row = mysql_fetch_array($set_expo_id))
    {
        $eid = $row['current_expo_id'];
    }


    $semester_set = "Select * FROM Expo_Main WHERE Expo_ID = '$eid'";
    $semester_result = Tools::Query($semester_set);
    while($row = mysql_fetch_array($semester_result))
    {
        $yr  = $row['Year'];
        $sem = $row['Semester'];
    }

//Set Expo days
$Date_Counter = 0;    
$current_expo_days = "Select * FROM Dates WHERE Expo_ID = '$eid'";
$expo_days_result  = Tools::Query($current_expo_days);
echo "<form action ='index.php?disp=panel&cmod=main&delday=1' method='post'>";
echo "<table border='1px'>";
while($row = mysql_fetch_array($expo_days_result))
{
   $dates = $row['Day'];
   $table = $row['Num_Tables'];
   echo "<tr> <td><input type='radio' name = 'delete_day' value='$dates'></td><td>$sem</td><td>$yr</td> <td>$dates</td> <td>$table</td> <td>$eid</td> </tr>";
   $Date_Counter++;
}

echo "</table>";
echo "<input type='hidden' name ='del_eid' value='$eid'>";
if ($Date_Counter == 0)
   echo "<p>There Seems to be No Dates for this Expo ID</p>";
echo "<input type='submit' value='Remove Expo Date'></form><br />";


echo "<form action ='index.php?disp=panel&cmod=main&adday=1' method='post'>";
echo "Add Day yyyy-mm-dd";
echo "<input type = 'text' name='add_new_day' /><br />";
echo "Add Table";
echo "<input type = 'text' name='num_table' /><br />";
echo "<input type='hidden' name ='add_eid' value='$eid'>";
echo "<input type='submit' value='Add Date'></form><br />";



if($addexpo == 1)
{
    $result = "INSERT INTO `Expo_Main` (`Year`, `Semester`) VALUES ('$year_post', '$semester_post') ON DUPLICATE KEY UPDATE Semester = '$semester_post', Year = '$year_post'";
    mysql_query($result, $link);

}

if($setexpo== 1)
{
   $update_tuple = "UPDATE site_setting SET current_expo_id ='$set_current_expo' WHERE indexo = '1'";
   mysql_query($update_tuple, $link);
   echo $set_current_expo;
}
if($delday== 1)
{
  // echo $del_day_post;
  // echo $delete_eid_post;
   $del_tuple = "DELETE FROM Dates where Day = '$del_day_post'";
   mysql_query($del_tuple, $link);
}
if($adday== 1)
{
   $add_a_day = "INSERT INTO `Dates` (`Expo_ID`, `Day`, `Num_Tables`) VALUES ('$add_eid_post', '$add_new_day_post', '$num_table_post') ON DUPLICATE KEY UPDATE Num_Tables = '$num_table_post'";
   mysql_query($add_a_day, $link);
}

if($delexpoid== 1)
{
   $attend_del= "DELETE FROM Attend_Dates WHERE Expo_ID = '$delete_expo'";
   mysql_query($attend_del, $link);
   $citizen_del= "DELETE FROM Citizen WHERE Expo_ID = '$delete_expo'";
   mysql_query($citizen_del, $link);
   $class_del= "DELETE FROM Class_Standing WHERE Expo_ID = '$delete_expo'";
   mysql_query($class_del, $link);
   $company_del= "DELETE FROM Company WHERE Expo_ID = '$delete_expo'";
   mysql_query($company_del, $link);
   $dates_del= "DELETE FROM Dates WHERE Expo_ID = '$delete_expo'";
   mysql_query($dates_del, $link);
   $degree_del= "DELETE FROM Degree_Type WHERE Expo_ID = '$delete_expo'";
   mysql_query($degree_del, $link);
   $expo_del= "DELETE FROM Expo_Main WHERE Expo_ID = '$delete_expo'";
   mysql_query($expo_del, $link);
   $grad_del= "DELETE FROM Grad_Date WHERE Expo_ID = '$delete_expo'";
   mysql_query($grad_del, $link);
   $major_del= "DELETE FROM Major WHERE Expo_ID = '$delete_expo'";
   mysql_query($major_del, $link);
   $position_del= "DELETE FROM Position WHERE Expo_ID = '$delete_expo'";
   mysql_query($position_del, $link);
   
   echo "$delete_expo";

}


?>
