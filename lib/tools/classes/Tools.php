<?php

class Tools
{
   /**
    * Cleans $input trimming whitespace and stripping slashes.

    * @param $input array containing input to filter
    * @return boolean
   */

   public static function clean_input($input)
   {
               $input = trim(stripslashes($input));

            # strip the slashes if magic quotes is on
            if(get_magic_quotes_gpc()) {
               $input = trim(stripslashes($input));
            }
            else {
               $input = trim($input);
            }
	return ($input);

   }

   public static function is_assoc($array) {
      if (is_array($array)) {
         foreach ($array as $key => $value) {
            if (!is_integer($key)) {
               return true;
            }
         }
         return false;
      }
      else {
         return false;
      }
   }


      public static function UnitedStates() {
      return array(
         'AL' => 'Alabama',
         'AK' => 'Alaska',
         'AZ' => 'Arizona',
         'AR' => 'Arkansas',
         'CA' => 'California',
         'CO' => 'Colorado',
         'CT' => 'Connecticut',
         'DC' => 'District of Columbia',
         'DE' => 'Delaware',
         'FL' => 'Florida',
         'GA' => 'Georgia',
         'HI' => 'Hawaii',
         'ID' => 'Idaho',
         'IL' => 'Illinois',
         'IN' => 'Indiana',
         'IA' => 'Iowa',
         'KS' => 'Kansas',
         'KY' => 'Kentucky',
         'LA' => 'Louisiana',
         'ME' => 'Maine',
         'MD' => 'Maryland',
         'MA' => 'Massachusetts',
         'MI' => 'Michigan',
         'MN' => 'Minnesota',
         'MS' => 'Mississippi',
         'MO' => 'Missouri',
         'MT' => 'Montana',
         'NE' => 'Nebraska',
         'NV' => 'Nevada',
         'NH' => 'New Hampshire',
         'NJ' => 'New Jersey',
         'NM' => 'New Mexico',
         'NY' => 'New York',
         'NC' => 'North Carolina',
         'ND' => 'North Dakota',
         'OH' => 'Ohio',
         'OK' => 'Oklahoma',
         'OR' => 'Oregon',
         'PA' => 'Pennsylvania',
         'RI' => 'Rhode Island',
         'SC' => 'South Carolina',
         'SD' => 'South Dakota',
         'TN' => 'Tennessee',
         'TX' => 'Texas',
         'UT' => 'Utah',
         'VT' => 'Vermont',
         'VA' => 'Virginia',
         'WA' => 'Washington',
         'WV' => 'West Virginia',
         'WI' => 'Wisconsin',
         'WY' => 'Wyoming'
      );
   }

	public static function InitMySQL() { 
		global $link;
		global $dbname;
		if (!$link) {
		   echo 'Could not connect to MySQL';
		   exit;
		}

		if (!mysql_select_db($dbname, $link)) {
		   echo 'Could not select database';
		   exit;
		}
	}
	
   public static function cleanusername($username) {
	   global $showname;
	   $showname = ucwords(str_replace(".", " ", "$username"));
		
	}	
		
	public static function Query($results) {
		global $link;
		$result = mysql_query($results, $link);

		if (!$result) {
		   echo "DB Error, could not query the database\n";
		   echo 'MySQL Error: ' . mysql_error();
		   exit;
		}
		return $result;		
	}
	
	public static function ImportStylesheets() {
		global $stylesheets;
		foreach ($stylesheets as $path) {
			echo "<link href=\"/main/style/css/$path\" rel=\"stylesheet\" type=\"text/css\" />\n";
		}
	}

}
?>
