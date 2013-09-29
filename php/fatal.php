<?php
   /* Little helper function for fatal errors
      Takes 1+1 arguments, returns nothing
      */

   function fatal($string,$error_code=1) {
      if(!is_numeric($error_code)) {
         $string.="\n".$error_code."\n";
         $error_code=1;
      }
      fwrite(fopen('php://stderr','w'),$string."\n");
      exit($error_code);
   }
?>
