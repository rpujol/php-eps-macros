<?php
   /* SmartInsertFont
      Usage:
      void SmartInsertFont( string fontname [ , string path_regex = "//" ] )

      fontname = Name of font to include. Must be a .pfb font
      path_regex = to filter wrt path name from all find fonts

      returns nothing

      Will include (passthru) the corresponding .pfa font, suitable for
      inclusion in .eps file
    */

   function SmartInsertFont($fontname,$path_regex="//") {
      $esa=escapeshellarg($fontname);
      exec("locate $esa",$output_ary,$return_value);
      if($return_value!=0) {
         die("Error in LocateFont while processing locate");
      }
      /* Make sure we have the correct font */
      $found=array();
      foreach($output_ary as $i) {
         $dir=dirname($i);
         $name=basename($i);
         if($name==$fontname) {
            $found_ary[]=array($dir,$name);
         }
      }
      $nb=count($found_ary);
      if($nb==0) {
         die("Couldn't find font $fontname");
      }
      elseif($nb>1) {
         /* Found more than one font file */
         $old_found_ary=$found_ary;
         $found_ary=array();
         foreach($old_found_ary as $i) {
            $dir=$i[0];
            $name=$i[1];
            if(preg_match("$path_regex",$dir)) {
               $found_ary[]=array($dir,$name);
            }
         }
         $nb=count($found_ary);
      }
      if($nb==0) {
         /* Among the found font, couldn't obtain one with path matching given regex
          * Will use the first found given by locate instead */
         $dir=$old_found_ary[0][0];
         $name=$old_found_ary[0][1];
      }
      elseif($nb==1) {
         /* Best thing! Got a unique font with matching path */
         $dir=$found_ary[0][0];
         $name=$found_ary[0][1];
      }
      else {
         /* Got many fonts with matching path
          * Will use the first one given by locate */
         $dir=$found_ary[0][0];
         $name=$found_ary[0][1];
      }
      $fontname=escapeshellarg("$dir/$name");
      $font_string=passthru("t1ascii $fontname",$retval);
      if($retval!=0) {
         die("Error in SmartInsertFont: error while processing t1ascii\n");
      }
   }
?>
