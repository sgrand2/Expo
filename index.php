<?php

/******************************************************************************
 * Configuration data is loaded here such as where the root directory is 
******************************************************************************/
     include("./lib/session_config.php");

/******************************************************************************
 *This will load all the small library functionality that we need
******************************************************************************/
require_once("./lib/tools/libload.php");


//Begin Loading Website
/******************************************************************************/
/******************************************************************************/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
 <head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
   <title>Engineering Career Expo</title>
    <link rel="shortcut icon" href="favicon.ico"/>
    <link href="css/main.css" rel="stylesheet" type="text/css"/>
 </head>

     <body>
      <div align = "center">


<?php

/******************************************************************************
 * The included navigation file is basically a large switch structure that will
 * look at the GET variables passed by the browser at run time.
 * It generally defautls to just showing the header/main content/footer/
 ******************************************************************************/


include ("$serverroot/mods/header.php");
include ("$serverroot/mods/path_load.php");
include ("$serverroot/mods/footer.php");

?>
      </div>
     </body>


</html>







