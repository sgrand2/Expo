<?php
   /**
    * @file
    *
    */
   # Grab all configuration docs
   foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/lib/config/conf.*.php') as $conf) {
      require_once($conf);
   }

   # Grab all includes
   foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/lib/tools/functions/*.php') as $include) {
      require_once($include);
   }

?>
