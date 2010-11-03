<?php

$First_Name_Post = $_POST['First_Name']; //Submitted Username
$Last_Name_Post  = $_POST['Last_Name']; //Submitted Username
$Email_Post      = $_POST['Email']; //Submitted Username
$Password_Post   = $_POST['Password']; //Submitted Username
$Password_Check_Post = $_POST['Password_check']; //Submitted Username
$Tel_Post        = $_POST['Tel']; //Submitted Username
$Fax_Post        = $_POST['Fax']; //Submitted Username

//Perform the query only if those values have something in them
if ((isset($First_Name_Post)) && (isset($Password_Post)) && !isset($_SESSION['LOGGED_IN']) && ($Password_Post == $Password_Check_Post))
{
    Tools::InitMysql();
    $Password_Post = md5($Password_Post); //lets store the hashed passwords
    $Activated = md5($Email_Post); //hashed email's gotta be unique you know
    $CID = NULL;

    $user_query= "INSERT INTO `Representatives` (`First_Name`, `Last_Name`, `Password`, `Tel`, `Email`, `CID`, `Fax`, `Activated`) VALUES ('$First_Name_Post', '$Last_Name_Post', '$Password_Post', '$Tel_Post', '$Email_Post', '$CID', '$Fax_Post', '$Activated') ";
    
    $query = Tools::Query($user_query);
}else
{
    echo "<form action = '/index.php?disp=e&rep=1' method='post' enctype = 'multipart/form-data' class='register' />";

    if(($Password_Post != $Password_Check_Post))
    {
        echo "*Passwords do not match";
    }

    //------------First name
    echo "<br />";
    echo "<b>First Name</b>";
    echo "<br />";
    echo "<input type = 'text' name='First_Name' />";
    echo "<br />";
    //------------First name

    //------------Last name
    echo "<br />";
    echo "<b>Last Name</b>";
    echo "<br />";
    echo "<input type = 'text' name='Last_Name' />";
    echo "<br />";
    //------------Last name

    //------------Email Address this will be the login
    echo "<br />";
    echo "<b>Company Email Address </b>";
    echo "<br />";
    echo "<input type = 'text' name='Email' />";
    echo "<br />";
    echo "Ex: username@company.com";
    echo "<br />";
    //------------Email Address

    //------------Password
    echo "<br />";
    echo "<b>Password:</b>";
    echo "<br />";
    echo "<input type = 'password' name='Password' />";
    echo "<br />";
    //------------Password

    //------------Retype Password
    echo "<br />";
    echo "<b>Retype Password:</b>";
    echo "<br />";
    echo "<input type = 'password' name='Password_check' />";
    echo "<br />";
    //------------Retype Password

    //------------Telephone
    echo "<br />";
    echo "<b>Telephone</b>";
    echo "<br />";
    echo "<input type = 'text' name='Tel' />";
    echo "<br />";
    //------------Telephone

    //------------Fax
    echo "<br />";
    echo "<b>Fax</b>";
    echo "<br />";
    echo "<input type = 'text' name='Fax' />";
    echo "<br />";
    //------------Fax
    echo "<br />";
    echo "<input type='submit' value='Register' name='Register' />";
    echo "<br />";
    echo "</form>";

}
?>
