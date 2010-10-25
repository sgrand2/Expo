<?php
   /** @file
   *
   * Sets the autoloader to locate classes at run-time.
   */

   $search_paths = array(
      $_SERVER['DOCUMENT_ROOT'] . '/include/tools/classes',
      $_SERVER['DOCUMENT_ROOT'] . '/include/tools/classes'
   );

   function __autoload($search_class)
   {
      global $search_paths;

      foreach ($search_paths as $path) {
         foreach (glob("$path/*.php") as $class) {
            if ("$search_class.php" == basename($class)) {
               require_once($class);
               return;
            }
         }
      }
      //throw new Exception("Unable to find class $search_class");
   }
?>
