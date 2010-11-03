<?php
echo "<div class='tempcolor'>";
$regrep    = $_GET['rep'];
$newcmp	   = $_GET['ncp'];
$signed_in = $_SESSION['LOGGED_IN'];
//if the user session is not set have them try to login or create a profile
if ($regrep == 1)
{
	//here we will include a form which will let the individual representative
	//Register
	include("$serverroot/mods/rep_reg.php");
}
else
{
	if($signed_in != 1)
	include("$serverroot/mods/signin.php");
}
//if it is set provide them a panel to change their company info
//
if($signed_in == '1')
{
	$Email = $_SESSION['Email'];

	if(($_SESSION['CID'] == '0') && ($newcmp != 1))
	{
		Tools::InitMysql();
		$company = substr(strstr($Email, '@'), 1);
		$explode_company = explode(".", $company);
		$company = $explode_company[count($explode_company)-2];
		echo "<p>Now to register you with a company</p>";
		echo "<p>We have the following companies listed based on your email address:<strong> $company</strong><br /> <br /> If this is correct please select the company and hit add company or <a href='/index.php?disp=e&ncp=1'>Register a New One</a></p>";

		$search_name= "%$company%";
		$auto_query = "Select * From Company WHERE Company_name LIKE '$search_name' OR URL LIKE '$search_name'";
		$find_company = Tools::Query($auto_query);
		$company_count = 0;

		echo "<form action = 'index.php?disp=e' method='post' enctype='multipart/form-data'>";
		while($row = mysql_fetch_array($find_company))
		{
			$CID = $row['CID'];
			$Company_name = $row['Company_name'];
			$URL = $row['URL'];
			$Address= $row['Address'];
			echo "<p><input type='radio' name='found_companies' value='$CID'>";
			echo "  <strong>$Company_name</strong>";
			echo "  | $URL";
			echo "  | $Address</p>";

			$company_count++;
		}

		if ($company_count != 0)
		{

			echo "<input type = 'submit' value = 'Add Company' name 'Add Company to profile' />";
		}else
		{
			echo "It looks like $company was not found, please register here";
		}
		echo "</form>";



		//Look up possible matches for that company based on their email address domain
		//tokeninze the string possibly
		//present them the option to choose from a list of prefilled
		//if company profile doesn't exist then ask them to create one

	}
	if(($_SESSION['CID'] == '0') && ($newcmp == 1))
	{
		include("$serverroot/mods/employer_register.php");
	}

}
echo "</div>";

?>
