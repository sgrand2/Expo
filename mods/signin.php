<?php
require_once("$serverroot/lib/tools/libload.php");

$User_Post= $_POST['user']; //Submitted Username
$pwd_sub  = $_POST['pwd'];  //Submitted Password

//Perform the query only if those values have something in them
if ((isset($User_Post)) && (isset($pwd_sub)) && !isset($_SESSION['LOGGED_IN']))
{
    Tools::InitMysql();
    //We distinguist between company and committies based on if they entered
    //an email address
    if(strpbrk($User_Post, '@') == FALSE)
    {
        //this conditional basically means we on the student committee signing in
        $user_query= "Select * FROM expo_committee where netid ='$User_Post'";
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
                //This loop basically means we are a corporate representative signing in
                $user_query= "Select * FROM Representatives where Email ='$User_Post'";
                $query = Tools::Query($user_query);
                while($row = mysql_fetch_array($query))
                {
                    //so if the user kind of fails to login lets boot him mang
                    if($row['Password']!= md5($pwd_sub))
                    { 
                        //should probably pretty print this or something
                        //Div class that outputs error messages
                        echo "Invalid Password or Login";
                        break;
                    }else
                    {
                        $_SESSION['Rep_ID']     =  $row['Rep_ID'];
                        $_SESSION['First_Name'] =  $row['First_Name'];
                        $_SESSION['Last_Name']  =  $row['Last_Name'];
                        $_SESSION['Tel']        =  $row['Tel'];
                        $_SESSION['Email']      =  $row['Email'];
                        $_SESSION['CID']        =  $row['CID'];
                        $_SESSION['Fax']        =  $row['Fax'];
                        $_SESSION['Actived']     = $row['Actived'];
                        $_SESSION['LOGGED_IN'] = '1';
                    }



                }
            }
}else
        {
            echo "<form action = '/index.php?disp=e' method='post' enctype = 'multipart/form-data' class='inlog' />";
            echo "<b>Username: </b>";
            echo "<br />";
            echo "<input type = 'text' name='user' />";
            echo "<br />";
            echo "Ex: username@company.com";
            echo "<br />";
            echo "<b>Password:</b>";
            echo "<br />";
            echo "<input type = 'password' name='pwd' />";
            echo "<br />";
            echo "<input type='submit' value='Sign In' name='Sign In' />";
            echo "<br />";
            echo "Register an account <a href='/index.php?disp=e&rep=1'>here</a>";
            echo "</form>";

        }
?>
