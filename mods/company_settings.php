<?php
$whichdelete = $_GET['delcmpy'];
$comp_delete = $_POST['delete_company'];

//do an isset for net id
Tools::InitMysql();

echo "Delete a Company";

//first obtain the current_cid which will let us delete the company
$expo_date_id = "Select * FROM site_setting WHERE indexo = '1'";
$set_expo_id  = Tools::Query($expo_date_id);
while($row= mysql_fetch_array($set_expo_id))
{
    $eid = $row['current_expo_id'];
}

echo "<p>Select a Company From Expo $eid to Delete</p>";

$company_delete = "Select * From Company WHERE Expo_ID = $eid";
$display_companies = Tools::Query($company_delete);


echo "<form action = '/index.php?disp=panel&cmod=comp&delcmpy=1' method='post'>";
echo "<table border = '1px'>";
while($row = mysql_fetch_array($display_companies))
{

    $compname = $row['Company_name'];
    $cid      = $row['CID'];

    echo "<tr> <td><input type='radio' name='delete_company' value='$cid'></td> <td>$compname</td> </tr>";
}
echo "</table>";
echo "<input type='submit' value='Delete Company'>";
echo "</form>";



if($whichdelete == '1')
{

   $attend_del= "DELETE FROM Attend_Dates WHERE CID = '$comp_delete'";
   mysql_query($attend_del, $link);
   $citizen_del= "DELETE FROM Citizen WHERE CID = '$comp_delete'";
   mysql_query($citizen_del, $link);
   $class_del= "DELETE FROM Class_Standing WHERE CID = '$delete_expo'";
   mysql_query($class_del, $link);
   $company_del= "DELETE FROM Company WHERE CID = '$comp_delete'";
   mysql_query($company_del, $link);
   $dates_del= "DELETE FROM Dates WHERE CID = '$comp_delete'";
   mysql_query($dates_del, $link);
   $degree_del= "DELETE FROM Degree_Type WHERE CID = '$comp_delete'";
   mysql_query($degree_del, $link);
   $expo_del= "DELETE FROM Expo_Main WHERE CID = '$comp_delete'";
   mysql_query($expo_del, $link);
   $grad_del= "DELETE FROM Grad_Date WHERE CID = '$comp_delete'";
   mysql_query($grad_del, $link);
   $major_del= "DELETE FROM Major WHERE CID = '$comp_delete'";
   mysql_query($major_del, $link);
   $position_del= "DELETE FROM Position WHERE CID = '$comp_delete'";
   mysql_query($position_del, $link);
}

?>
