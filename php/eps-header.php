<?php
   /* Includes a standard EPS header

      Needs the following variables to be set:
      $lx
      $ly
      $ux
      $uy

      Optionally these can be set:
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
   if(!isset($date)) {
      $date=date("Y/m/d");
   }
?>
%!PS-Adobe-2.0 EPSF-3.0
%%BoundingBox: <?php echo "$lx $ly $ux $uy\n"; ?>
<?php if(isset($author)) echo "%%Creator: $author\n"; ?>
%%CreationDate: <?php echo "$date\n"; ?>
<?php if(isset($title)) echo "%%Title: $title\n"; ?>
%%Pages: 1
%%EndComments
