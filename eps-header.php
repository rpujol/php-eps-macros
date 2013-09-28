<?php
   /* Includes a standard EPS header

      Needs the following variables to be set:
      $lx
      $ly
      $ux
      $uy
      $author
      $title
      $date
   */

   require_once('fatal.php');

   if (!isset($ux,$uy,$lx,$ly)) {
      fatal('Error: Unset variables $ux or $uy or $lx or $ly for bounding box.'."\n");
   }
   if (!is_numeric($ux) or !is_numeric($uy) or !is_numeric($lx) or !is_numeric($ly)) {
      fatal('Error: Variables $ux or $uy or $lx or $ly not of numerical type.'."\n");
   }
   if(!isset($author)) {
      fatal('Error: Variable $author is not set.'."\n");
   }
   if(!isset($date)) {
      fatal('Error: Variable $date is not set.'."\n");
   }
   if(!isset($title)) {
      fatal('Error: Variable $title is not set.'."\n");
   }
?>
%!PS-Adobe-2.0 EPSF-3.0
%%BoundingBox: <?php echo "$lx $ly $ux $uy\n"; ?>
%%Creator: <?php echo "$author\n"; ?>
%%CreationDate: <?php echo "$date\n"; ?>
%%Title: <?php echo "$title\n"; ?>
%%Pages: 1
%%EndComments
