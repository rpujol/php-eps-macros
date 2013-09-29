<?php
   $lx=0;
   $ly=0;
   $ux=400;
   $uy=200;
   $author="Romaric Pujol";
   $date="2013/09/29";
   $title="plotfunction-bezier-stupid-hom Demo";
   require_once '../../../eps-header.php';

   require_once '../../../vector.php';
?>

/xmin <?php echo -2*M_PI; ?> def
/xmax <?php echo 4*M_PI; ?> def
/ymin -1.3 def
/ymax 1.3 def
/Xmin <?php echo "$lx"; ?> def
/Xmax <?php echo "$ux"; ?> def
/Ymin <?php echo "$ly"; ?> def
/Ymax <?php echo "$uy"; ?> def

/pi <?php echo M_PI; ?> def

<?php
   require_once '../../../plotfunction-bezier-stupid-hom.php';
?>

% Plots axes
gsave
   0.4 setlinewidth
   xmin 0 Coords xmax 0 Coords Vector
   0 ymin Coords 0 ymax Coords Vector
grestore

/cosrad { pi div 180 mul cos } bind def
/sinrad { pi div 180 mul sin } bind def

/f { cosrad } bind def
/fprime { sinrad neg } bind def

gsave
   0.1 setlinewidth
   { f } { fprime } xmin xmax 6 PlotFunctionBezierStupidHom
grestore
