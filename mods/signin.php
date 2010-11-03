<?php
require_once("$serverroot/lib/tools/libload.php");

$user_sub = $_POST['user']; //Submitted Username
$pwd_sub  = $_POST['pwd'];  //Submitted Password
echo $_SESSION['LOGGED_IN'];

//Perform the query only if those values have something in them
if ((isset($user_sub)) && (isset($pwd_sub)) && !isset($_SESSION['LOGGED_IN']))
{
    Tools::InitMysql();

    $user_query= "Select * FROM expo_committee where netid ='$user_sub'";
    $query = Tools::Query($user_query);
    while($row = mysql_fetch_array($query))
    {
        //so if the user kind of fails to login lets boot him mang
        if($row['password']!= md5($pwd_sub))
        { 
            //should probably pretty print this or something
            //Div class that outputs error messages
            echo "Invalid Password or Login";
            break;
        }else
        {
           $_SESSION['netid']      =  $row['netid'];
           $_SESSION['first_name'] =  $row['first_name'];
           $_SESSION['last_name']  =  $row['last_name'];
           $_SESSION['pref_email'] =  $row['pref_email'];
           $_SESSION['year']       =  $row['year'];
           $_SESSION['print_name'] =  $row['print_name'];
           $_SESSION['permissions']=  $row['permissions'];
           $_SESSION['position']   =  $row['position'];
           $_SESSION['active']     =  $row['active'];
           $_SESSION['shirt_size'] =  $row['shirt_size'];
           $_SESSION['LOGGED_IN'] = '1';
        }

    }
}else
        {
            echo "<form action = '/index.php' method='post' enctype = 'multipart/form-data' class='inlog' />";
            echo "<b>Username: </b>";
            echo "<br />";
            echo "<input type = 'text' name='user' />";
            echo "<br />";
            echo "<b>Password:</b>";
            echo "<br />";
            echo "<input type = 'password' name='pwd' />";
            echo "<br />";
            echo "<input type='submit' value='Sign In' name='Sign In' />";
            echo "<br />";
            echo "</form>";
        }
?>
