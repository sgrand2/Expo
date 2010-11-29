<?php

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
//$varname5 = $_POST['url'];

//echo "$varname $varname2";

//echo "hello world\n";

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




?>
