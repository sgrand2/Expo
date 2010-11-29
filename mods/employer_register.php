<?php
//Old code from previous website implementation
/*
$cname_post = $_POST['cname'];
$url_post = $_POST['url'];
$ntables_post = $_POST['ntables'];
$address_post = $_POST['address'];

$attend_dt_post = $_POST['attend_dt'];
$repno_post = $_POST['repno'];
$class_stat_post = $_POST['class_stat'];
$deg_type_post = $_POST['deg_type'];

$job_type_post = $_POST['job_type'];
$grad_dt_post = $_POST['grad_dt'];
$cit_stat_post = $_POST['cit_stat'];
$major_post = $_POST['major'];

$job_loc_post = $_POST['job_loc'];
$wirels_post = $_POST['wirels'];

echo "<form action='/index.php?disp=e&ncp=1' method='post' />";

echo "Name of Company: <input type='text' name='cname'/><br>"; 
echo "URL: <input type='text' name='url' /> <br>";
echo "No. of tables needed: <input type='text' name='ntables' /> <br>";
echo "Address: <input type='text' name='address' /> <br>";

echo "Dates attending: <input type='text' name='attend_dt' /> <br>";
echo "No. of representatives: <input type='text' name='repno' /> <br>";
echo "Class status(F/S/J/Sen/Grad): <input type='text' name='class_stat' /> <br>";
echo "Degree types (BS/MS/PhD): <input type='text' name='deg_type' /> <br>";
echo "Job types (Internship/Co-op/Full time): <input type='text' name='job_type' /> <br>";

echo "Graduation dates: <input type='text' name='grad_dt' /> <br>";
echo "Citizenship status (U.S. Citizen/ Permanent Res./ Intl): <input type='text' name='cit_stat' /> <br>";
echo "Majors accepted: <input type='text' name='major' /> <br>";
echo "Job locations: <input type='text' name='job_loc' /> <br>";
echo "Need wireless access (Y/N): <input type='text' name='wirels' /> <br>";

echo "<input type='submit' />";

echo "</form>";

if (isset($cname_post))
{
Tools::InitMysql();

    $user_query= "INSERT INTO `Company` (`Company_name`, `Num_table`, `Address`, `URL`, `Attend_dates`,`Rep_num`,`Class_status`,`Degree_type`,`Job_type`,`Grad_date`,`Citizenship_status`,`Discipline`,`Job_loc`,`Wireless_access`) 
        VALUES('$cname_post', '$ntables_post', '$address_post', '$url_post','$attend_dt_post','$repno_post','$class_stat_post','$deg_type_post','$job_type_post','$grad_dt_post','$cit_stat_post','$major_post','$job_loc_post','$wirels_post')";

     Tools::Query($user_query);
}

 */

Tools::InitMysql();
$day_attend = $_POST['day'];
$cname_post = $_POST['cname'];
$url_post = $_POST['url'];
$ntables_post = $_POST['ntables'];
$address_post = $_POST['address'];
$freshman_post= $_POST['Freshman'];
$sophomore_post= $_POST['Sophomore'];
$junior_post= $_POST['Junior'];
$senior_post= $_POST['Senior'];
$grad_post= $_POST['Grad'];

$attend_dt_post = $_POST['attend_dt'];
$repno_post = $_POST['repno'];

$degtypebs_post=$_POST['deg_type_bs'];
$degtypems_post=$_POST['deg_type_ms'];
$degtypephd_post=$_POST['deg_type_phd'];

$job_type_int_post = $_POST['job_type_int'];
$job_type_cop_post = $_POST['job_type_cop'];
$job_type_ft_post = $_POST['job_type_ft'];


$grad_dt_sp_post = $_POST['grad_dt_sp'];
$grad_dt_su_post = $_POST['grad_dt_su'];
$grad_dt_wn_post = $_POST['grad_dt_wn'];
$cit_stat_us_post = $_POST['cit_stat_us'];
$cit_stat_fn_post = $_POST['cit_stat_fn'];
$cit_stat_pr_post = $_POST['cit_stat_pr'];

$aero_post=$_POST['aero'];
$agri_post=$_POST['agri'];
$chemengg_post=$_POST['chemengg'];
$chem_post=$_POST['chem'];
$civil_post=$_POST['civil'];
$env_post=$_POST['env'];
$elec_post=$_POST['elec'];
$compengg_post=$_POST['compe'];
$compsci_post=$_POST['compsci'];
$math_post=$_POST['math'];
$phy_post=$_POST['phys'];
$engmech_post=$_POST['engmech'];
$indus_post=$_POST['indus'];
$meche_post=$_POST['mech'];
$gen_post=$_POST['gen'];
$nucl_post=$_POST['nucl'];
$matsci_post=$_POST['matsci'];
$stat_post=$_POST['stat'];
$bioe_post=$_POST['bioe'];

$job_loc_post = $_POST['job_loc'];
$wireless_post = $_POST['wireless'];
//$varname5 = $_POST['url'];
echo "$standing\n";
//echo "$varname $varname2";

//echo "hello world\n";



//echo "<form action='index.php' method='post' />";
echo "<form action='/index.php?disp=e&ncp=1' method='post' />";

echo "Name of Company: <input type='text' name='cname'/><br>"; 
echo "URL: <input type='text' name='url' /> <br>";
echo "No. of tables needed: <input type='text' name='ntables' /> <br>";
echo "Address: <input type='text' name='address' /> <br>";

echo "Year in school<br/> <input type='checkbox' name='Freshman' value='1'/> Freshman<br />";
echo "<input type='checkbox' name='Sophomore' value='1'/> Sophomore<br />";
echo "<input type='checkbox' name='Junior' value='1'/> Junior<br />";
echo "<input type='checkbox' name='Senior' value='1'/> Senior<br />";
echo "<input type='checkbox' name='Grad' value='1'/> Graduate<br />";

echo "<br/>";
echo "Dates attending: <br/> ";
//Do a database query and possibly lookup in realtime how many companyies have had reserved tables
//for now just do a lookup
$set_expo_id  = Tools::Query("Select * FROM site_setting WHERE indexo = '1'");
while($row = mysql_fetch_array($set_expo_id))
{
$eid = $row['current_expo_id'];
}

//Set Expo days
$Date_Counter = 0;    
$current_expo_days = "Select * FROM Dates WHERE Expo_ID = '$eid'";
$expo_days_result  = Tools::Query($current_expo_days);
echo "<table border='1px'>";
   echo "<tr> <td>Select</td><td>YYYY-MM-DD</td> <td>Tables Available</td> </tr>";
while($row = mysql_fetch_array($expo_days_result))
{
   $dates = $row['Day'];
   $table = $row['Num_Tables'];
   echo "<tr> <td><input type='checkbox' name = 'day' value='$dates'></td><td>$dates</td> <td>$table</td></tr>";
   $Date_Counter++;
}

echo "</table>";
echo "<input type='hidden' name ='del_eid' value='$eid'>";
if ($Date_Counter == 0)
{
   echo "<p>There seems to be an issue with registration, please contact administration</p>";
}
$cid_counter = "Select * FROM Company";
$cid_result = Tools::Query($cid_counter);
while($row = mysql_fetch_array($cid_result))
{
 $cid = $row['CID'];
}
if(!isset($cid))
{
$cid_next = 1;
}
else
{
 $cid_next = $cid + 1;
}


echo "<br/>";
echo "No. of representatives: <input type='text' name='repno' /> <br>";
echo "<br/>";
echo "Degree types: <br/>";
echo "<input type='checkbox' name='deg_type_bs' value='1'/> Bachelors <br>";
echo "<input type='checkbox' name='deg_type_ms' value='1'/> Masters <br>";
echo "<input type='checkbox' name='deg_type_phd' value='1'/> Doctoral <br>";
echo "<br/>";
echo "Job types: <br/>";
echo "<input type='checkbox' name='job_type_int' value='1'/>Internship <br>";
echo "<input type='checkbox' name='job_type_cop' value='1'/>Co-op <br>";
echo "<input type='checkbox' name='job_type_ft' value='1'/>Full time <br>";

echo "<br/>";
echo "Graduation dates: <br/>";
echo "<input type='checkbox' name='grad_dt_sp' value='1'/>May <br>";
echo "<input type='checkbox' name='grad_dt_wn' value='1'/>December <br>";
echo "<input type='checkbox' name='grad_dt_su' value='1'/>summer<br>";

echo "<br/>";
echo "Visa types accepted:<br/>";
echo "<input type='checkbox' name='cit_stat_us' value='1'/>U.S. Citizens <br>";
echo "<input type='checkbox' name='cit_stat_pr' value='1'/>U.S. Permanent Residents <br>";
echo "<input type='checkbox' name='cit_stat_fn' value='1'/>Foreign Nationals <br>";

echo "<br/>";
echo "Majors accepted: <br/>";
echo "<input type='checkbox' name='aero' value='1'/> Aerospace";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='checkbox' name='agri' value='1'/>Agricultural <br>";

echo "<input type='checkbox' name='bioe' value='1'/> Bioengineering";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='checkbox' name='chemengg' value='1'/>Chemical <br>";

echo "<input type='checkbox' name='chem' value='1'/> Chemistry";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='checkbox' name='major' value='civil' value='1'/>Civil <br>";

echo "<input type='checkbox' name='compe' value='1'/> Computer";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='checkbox' name='compsci' value='1'/>Computer Science <br>";

echo "<input type='checkbox' name='elec' value='1'/> Electrical";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='checkbox' name='engmech' value='1'/> Engineering Mechanics <br>";

echo "<input type='checkbox' name='env' value='1'/>  Environmental";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='checkbox' name='gen' value='1'/> General <br>";

echo "<input type='checkbox' name='indus' value='1'/> Industrial";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='checkbox' name='matsci' value='1'/>Material Science <br>";

echo "<input type='checkbox' name='math' value='1'/>  Math";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='checkbox' name='mech' value='1'/>Mechanical <br>";

echo "<input type='checkbox' name='nucl' value='1'/>  Nuclear";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='checkbox' name='phys' value='1'/>Physics <br>";

echo "<input type='checkbox' name='stat' value='1'/> Statistics<br>";

echo "<br/>";
echo "Job locations:<br/>";
echo "<input type='checkbox' name='job_loc' value='northeast'/> Northeast <br>";
echo "<input type='checkbox' name='job_loc' value='midatl'/> Mid-Atlantic <br>";
echo "<input type='checkbox' name='job_loc' value='southeast'/>  Southeast <br>";
echo "<input type='checkbox' name='job_loc' value='midwest'/> Midwest <br>";
echo "<input type='checkbox' name='job_loc' value='pacificnw'/> Pacific Northwest <br>";
echo "<input type='checkbox' name='job_loc' value='west'/> West Coast <br>";
echo "<input type='checkbox' name='job_loc' value='southwest'/> Southwest <br>";
echo "<input type='checkbox' name='job_loc' value='outus'/> Outside U.S. <br>";

echo "<br/>";
echo "Need wireless access: <br/>";
echo "<input type='radio' name='wireless' value='yes'/> Yes<br>";
echo "<input type='radio' name='wireless' value='no'/> No<br>";

echo "<br/>";
echo "<input type='submit' />";

echo "</form>";

if (isset($cname_post))
{
//   Tools::InitMysql();

   // THIS IS YOUR QUERY
   $results = "INSERT INTO `Company` (`URL`,`Company_name`,`Num_table`,`Address`,`Rep_num`,`Wireless_access`, `Expo_ID`) 
      VALUES('$url_post','$cname_post','$ntables_post','$address_post','$repno_post','$wireless_post', '$eid')";
   $results2= "INSERT INTO `Class_Standing`(`CID`,`Freshman`,`Sophomore`,`Junior`,`Senior`,`Grad`, `Expo_ID`)
      VALUES('$cid_next','$freshman_post','$sophomore_post','$junior_post','$senior_post','$grad_post', '$Expo_ID')";
   $results3="INSERT INTO `Degree_Type`(`CID`,`BS`,`MS`,`PHD`, `Expo_ID`)
    VALUES('$cid_next','$degtypebs_post','$degtypems_post','$degtypephd_post', '$eid')";
   $results4="INSERT INTO `Attend_Dates`(`CID`,`Date`, `Expo_ID`) VALUES ('$cid_next', '$day_attend', '$eid')";
   $results5="INSERT INTO `Grad_Date`(`CID`,`Spring`,`Winter`,`Summer`, `Expo_ID`)
    VALUES('$cid_next','$grad_dt_sp_post','$grad_dt_su_post','$grad_dt_wn_post', '$eid')";
   $results6="INSERT INTO `Citizen`(`CID`,`US`,`GC`,`INTL`, `Expo_ID`)
    VALUES('$cid_next','$cit_stat_us_post','$cit_stat_pr_post','$cit_stat_fn_post', '$eid')";
   $results7="INSERT INTO `Postition`(`CID`,`Full_Time`,`Intern`,`Coop`, `Expo_ID`)
    VALUES('$cid_next','$job_type_int_post','$job_type_cop_post','$job_type_ft_post', '$eid')";
   

   //$results = "ALTER TABLE `Company` ADD `somejkjkjng` INT NOT NULL ";

   // PASS YOUR QUERY AND THE "FP" HERE
   $result = mysql_query($results, $link);
   $result2= mysql_query($results2, $link);
   $result3= mysql_query($results3, $link);
   $result4= mysql_query($results4, $link);
   $result5= mysql_query($results5, $link);
   $result6= mysql_query($results6, $link);
   $result7= mysql_query($results7, $link);

   if($aero_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUES('1')";
      $result4= mysql_query($result4, $link);
   }
   if($agri_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUES('2')";
      $result4= mysql_query($result4, $link);
   }
   if($bioe_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUE('3')";
      $result4= mysql_query($result4, $link);
   }
   if($chemengg_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUES('4')";
      $result4= mysql_query($result4, $link);
   }
   if($chem_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUES('5')";
      $result4= mysql_query($result4, $link);
   }
   if($civil_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUES('6')";
      $result4= mysql_query($result4, $link);
   }
   if($compengg_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUES('7')";
      $result4= mysql_query($result4, $link);
   }
   if($compsci_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUES('8')";
      $result4= mysql_query($result4, $link);
   }
   if($elec_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUES('9')";
      $result4= mysql_query($result4, $link);
   }
   if($engmech_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUES('10')";
      $result4= mysql_query($result4, $link);
   }
   if($env_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUES('11')";
      $result4= mysql_query($result4, $link);
   }
   if($gen_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUES('12')";
      $result4= mysql_query($result4, $link);
   }
   if($indus_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUES('13')";
      $result4= mysql_query($result4, $link);
   }
   if($matsci_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUES('14')";
      $result4= mysql_query($result4, $link);
   }
   if($math_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUES('15')";
      $result4= mysql_query($result4, $link);
   }
   if($meche_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUES('16')";
      $result4= mysql_query($result4, $link);
   }
   if($nucl_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUES('17')";
      $result4= mysql_query($result4, $link);
   }
   if($phy_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUES('18')";
      $result4= mysql_query($result4, $link);
   }
   if($stat_post==1){
      $results4="INSERT INTO `Major`(`Discipline`) VALUES('19')";
      $result4= mysql_query($result4, $link);
   }


   // CLOSE THE FP
   mysql_close($link);
}



?>
