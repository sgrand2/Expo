<?php

$user_query = $_GET['usrq'];


$day_attend = $_POST['day'];
$freshman_post= $_POST['Freshman'];
$sophomore_post= $_POST['Sophomore'];
$junior_post= $_POST['Junior'];
$senior_post= $_POST['Senior'];
$grad_post= $_POST['Grad'];

//$attend_dt_post = $_POST['attend_dt'];
//$repno_post = $_POST['repno'];

$degtypebs_post    =$_POST['deg_type_bs'];
$degtypems_post    =$_POST['deg_type_ms'];
$degtypephd_post   =$_POST['deg_type_phd'];

$job_type_int_post  = $_POST['job_type_int'];
$job_type_cop_post  = $_POST['job_type_cop'];
$job_type_ft_post   = $_POST['job_type_ft'];


$grad_dt_sp_post    = $_POST['grad_dt_sp'];
$grad_dt_su_post    = $_POST['grad_dt_su'];
$grad_dt_wn_post    = $_POST['grad_dt_wn'];
$cit_stat_us_post   = $_POST['cit_stat_us'];
$cit_stat_fn_post   = $_POST['cit_stat_fn'];
$cit_stat_pr_post   = $_POST['cit_stat_pr'];

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


echo "<div class='tempcolor'>";



Tools::InitMysql();



echo "<form action='/index.php?disp=t&usrq=1' method='post' />";

/*
echo "Year in school<br/> <input type='checkbox' name='Freshman' value='1'/> Freshman<br />";
echo "<input type='checkbox' name='Sophomore' value='1'/> Sophomore<br />";
echo "<input type='checkbox' name='Junior' value='1'/> Junior<br />";
echo "<input type='checkbox' name='Senior' value='1'/> Senior<br />";
echo "<input type='checkbox' name='Grad' value='1'/> Graduate<br />";
 */
echo "<br/>";
//Do a database query and possibly lookup in realtime how many companyies have had reserved tables
//for now just do a lookup

$current_expo_id = "Select * FROM site_setting where indexo = '1'";
$results_expo_id = mysql_query($current_expo_id, $link);
while($row = mysql_fetch_array($results_expo_id))
{
$eid = $row['current_expo_id'];

}


/*echo "Degree types: <br/>";
echo "<input type='checkbox' name='deg_type_bs' value='1'/> Bachelors <br>";
echo "<input type='checkbox' name='deg_type_ms' value='1'/> Masters <br>";
echo "<input type='checkbox' name='deg_type_phd' value='1'/> Doctoral <br>";
echo "<br/>";*/
/*
echo "Job types: <br/>";
echo "<input type='checkbox' name='job_type_int' value='1'/>Internship <br>";
echo "<input type='checkbox' name='job_type_cop' value='1'/>Co-op <br>";
echo "<input type='checkbox' name='job_type_ft' value='1'/>Full time <br>";

echo "<br/>";*/
/*echo "Graduation dates: <br/>";
echo "<input type='checkbox' name='grad_dt_sp' value='1'/>May <br>";
echo "<input type='checkbox' name='grad_dt_wn' value='1'/>December <br>";
echo "<input type='checkbox' name='grad_dt_su' value='1'/>summer<br>";*/
/*
echo "<br/>";
echo "Visa types accepted:<br/>";
echo "<input type='checkbox' name='cit_stat_us' value='1'/>U.S. Citizens <br>";
echo "<input type='checkbox' name='cit_stat_pr' value='1'/>U.S. Permanent Residents <br>";
echo "<input type='checkbox' name='cit_stat_fn' value='1'/>Foreign Nationals <br>";
 */
echo "<br/>";
echo "Majors accepted: <br/>";
echo "<input type='radio' name='major' value='1'/> Aerospace";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='radio' name='major'' value='2'/>Agricultural <br>";

echo "<input type='radio' name='major' value='3'/> Bioengineering";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='radio' name='major' value='4'/>Chemical <br>";

echo "<input type='radio' name='major' value='5'/> Chemistry";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='radio' name='major' value='civil' value='6'/>Civil <br>";

echo "<input type='radio' name='major' value='7'/> Computer";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='radio' name='major' value='8'/>Computer Science <br>";

echo "<input type='radio' name='major' value='9'/> Electrical";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='radio' name='major' value='10'/> Engineering Mechanics <br>";

echo "<input type='radio' name='major' value='11'/>  Environmental";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='radio' name='major' value='12'/> General <br>";

echo "<input type='radio' name='major' value='13'/> Industrial";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='radio' name='major' value='14'/>Material Science <br>";

echo "<input type='radio' name='major' value='15'/>  Math";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='radio' name='major' value='16'/>Mechanical <br>";

echo "<input type='radio' name='major' value='17'/>  Nuclear";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='radio' name='major' value='18'/>Physics <br>";

echo "<input type='radio' name='major' value='19'/> Statistics<br>";

echo "<input type='submit' value='Search' />";

echo "</form>";




// so on page load if we havent specified, we'll show all the companies
if (!isset($user_query))
{
 echo "<hr /><p>All Companies Attending</p>";
 $student_query= "Select * From Company WHERE Expo_ID = '$eid'";
 $query = mysql_query($student_query, $link);
 echo "<table border='1px'>";
 while($row = mysql_fetch_array($query))
 {
  $companyname = $row['Company_name'];
  echo "<tr> <td>$companyname</td> <td> <a href='/index.php?disp=view' class='thickbox'> company_info</a></td> </tr>";
 }
 echo "</table>";
}
else
{
 echo "<hr /><p>Search Results</p>";
echo "Not yet implemented";

}
//this query comes from the form










echo "</div>";


   
   
?>
