<?php
$standing = $_POST['standing'];
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
echo "$standing\n";
//echo "$varname $varname2";

//echo "hello world\n";



echo "<form action='index.php' method='post' />";

echo "Name of Company: <input type='text' name='cname'/><br>"; 
echo "URL: <input type='text' name='url' /> <br>";
echo "No. of tables needed: <input type='text' name='ntables' /> <br>";
echo "Address: <input type='text' name='address' /> <br>";

echo "Year in school<br/> <input type='checkbox' name='standing' value='Freshman' /> Freshman<br />";
echo "<input type='checkbox' name='standing' value='Sophomore' /> Sophomore<br />";
echo "<input type='checkbox' name='standing' value='Junior' /> Junior<br />";
echo "<input type='checkbox' name='standing' value='Senior' /> Senior<br />";
echo "<input type='checkbox' name='standing' value='Grad' /> Graduate<br />";

echo "<br/>";
echo "Dates attending: <br/> ";
echo "<input type='checkbox' name='attend_dt' value='Wed'/> Wednesday, 2/9/2011<br/>";
echo "<input type='checkbox' name='attend_dt' value='Thur'/> Thursday, 2/10/2011<br/>";
echo "<br/>";
echo "No. of representatives: <input type='text' name='repno' /> <br>";
echo "<br/>";
//echo "Class status: <br/>";
//echo "<input type='checkbox' name='class_stat' /> <br>";
echo "Degree types: <br/>";
echo "<input type='checkbox' name='deg_type' value='bs'/> Bachelors <br>";
echo "<input type='checkbox' name='deg_type' value='ms'/> Masters <br>";
echo "<input type='checkbox' name='deg_type' value='phd'/> Doctoral <br>";
echo "<br/>";
echo "Job types: <br/>";
echo "<input type='checkbox' name='job_type' value='intern'/>Internship <br>";
echo "<input type='checkbox' name='job_type' value='co-op'/>Co-op <br>";
echo "<input type='checkbox' name='job_type' value='fulltime'/>Full time <br>";

echo "<br/>";
echo "Graduation dates: <br/>";
echo "<input type='checkbox' name='grad_dt' value='may'/>May <br>";
echo "<input type='checkbox' name='grad_dt' value='dec'/>December <br>";

echo "<br/>";
echo "Visa types accepted:<br/>";
echo "<input type='checkbox' name='cit_stat' value='uscitizen'/>U.S. Citizens <br>";
echo "<input type='checkbox' name='cit_stat' value='permres'/>U.S. Permanent Residents <br>";
echo "<input type='checkbox' name='cit_stat' value='intl'/>Foreign Nationals <br>";

echo "<br/>";
echo "Majors accepted: <br/>";
echo "<input type='checkbox' name='major' value='aero'/> Aerospace";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='checkbox' name='major' value='agri'/>Agricultural <br>";

echo "<input type='checkbox' name='major' value='bioe'/> Bioengineering";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='checkbox' name='major' value='chemengg'/>Chemical <br>";

echo "<input type='checkbox' name='major' value='chem'/> Chemistry";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='checkbox' name='major' value='civil'/>Civil <br>";

echo "<input type='checkbox' name='major' value='compe'/> Computer";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='checkbox' name='major' value='compsci'/>Computer Science <br>";

echo "<input type='checkbox' name='major' value='elec'/> Electrical";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='checkbox' name='major' value='engmech'/> Engineering Mechanics <br>";

echo "<input type='checkbox' name='major' value='env'/>  Environmental";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='checkbox' name='major' value='gen'/> General <br>";

echo "<input type='checkbox' name='major' value='indus'/> Industrial";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='checkbox' name='major' value='matsci'/>Material Science <br>";

echo "<input type='checkbox' name='major' value='math'/>  Math";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='checkbox' name='major' value='mech'/>Mechanical <br>";

echo "<input type='checkbox' name='major' value='nucl'/>  Nuclear";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='checkbox' name='major' value='phys'/>Physics <br>";

echo "<input type='checkbox' name='major' value='stat'/> Statistics<br>";

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



//USE THIS TO CONNECT WHILE DEBUGGING
$link = mysql_connect('localhost', 'sbhobe2_expo', 'password');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
//echo 'Connected successfully';

//USE THIS TO SELECT THE ACTUAL DATABASE
$db_selected = mysql_select_db('sbhobe2_test', $link);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}


// THIS IS YOUR QUERY
$results = "INSERT INTO `Company` (`Company_name`, `Num_table`, `Address`, `URL`, `Attend_dates`,`Rep_num`,`Class_status`,`Degree_type`,`Job_type`,`Grad_date`,`Citizenship_status`,`Discipline`,`Job_loc`,`Wireless_access`) 
VALUES('$cname_post', '$ntables_post', '$address_post', '$url_post','$attend_dt_post','$repno_post','$class_stat_post','$deg_type_post','$job_type_post','$grad_dt_post','$cit_stat_post','$major_post','$job_loc_post','$wirels_post')";
//$results = "ALTER TABLE `Company` ADD `somejkjkjng` INT NOT NULL ";

// PASS YOUR QUERY AND THE "FP" HERE
$result = mysql_query($results, $link);


// CLOSE THE FP
mysql_close($link);


/////////////////////////EXAMPLE
//Tools::InitMysql();
//$comment_query = "INSERT INTO `ratings` (`post_id`, `uid`, `crn`, `dept`, `course_num`, `comment`) VALUES ('$post_id', '$uid','$crn', '$department', '$coursenumb', '$comment') ON DUPLICATE KEY UPDATE comment='$comment'";
//$query = Tools::Query($comment_query);




?>
