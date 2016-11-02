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

   require_once("fatal.php");

   function SmartInsertFont($fontname,$path_regex="//") {
      /* escape the font name, as it will be passed to a shell function */
      $esa=escapeshellarg("\\".$fontname);
      /* use locate -b (only match basename)
         moreover, the font name has been prepended with a backslash
         so that locate matches that name exactly */
      exec("locate -b $esa",$found_ary,$return_value);
      if($return_value!=0) {
         fatal("Error in LocateFont while processing locate: maybe there are no found fonts. Returned $return_value.",$return_value);
      }
      /* Separate the font name with the directory name */
      $old_found_ary=$found_ary;
      $found_ary=array();
      foreach($old_found_ary as $i) {
         $found_ary[]=array(dirname($i),basename($i));
      }
      $nb=count($found_ary);
      if($nb>1) {
         /* Found more than one font file.
            Will filter with respect to the directory name */
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
      $font_string=passthru("t1ascii $fontname",$return_value);
      if($return_value!=0) {
         fatal("Error in SmartInsertFont: error while processing t1ascii.",$return_value);
      }
   }
?>
