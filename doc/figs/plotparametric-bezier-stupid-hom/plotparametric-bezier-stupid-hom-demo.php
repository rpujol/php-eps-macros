<?php
   $lx=0;
   $ly=0;
   $ux=200;
   $uy=200;
   $author="Romaric Pujol";
   $title="Demo using plotparametric-bezier-stupid-hom.php";
   $date="2013/09/29";
   require_once '../../../php/eps-header.php';
?>

/pi <?php echo M_PI; ?> def
/2pi <?php echo 2*M_PI; ?> def

/xmin -2.4 def
/xmax 2.4 def
/ymin -2.4 def
/ymax 2.4 def
/Xmin <?php echo "$lx"; ?> def
/Xmax <?php echo "$ux"; ?> def
/Ymin <?php echo "$ly"; ?> def
/Ymax <?php echo "$uy"; ?> def

<?php
   require_once '../../../php/plotparametric-bezier-stupid-hom.php';
   require_once '../../../php/vector.php';
?>

/cosrad { 180 mul pi div cos } bind def
/sinrad { 180 mul pi div sin } bind def

/x { dup cosrad exch 2pi div mul } bind def
/y { dup sinrad exch 2pi div mul } bind def
/xprime { dup cosrad 2pi div exch y sub } bind def
/yprime { dup sinrad 2pi div exch x add } bind def

% /x { cosrad } bind def
% /xprime { sinrad neg } bind def
% /y { sinrad } bind def
% /yprime { cosrad } bind def

gsave
   0.2 setlinewidth
   xmin 0 Coords xmax 0 Coords Vector
   0 ymin Coords 0 ymax Coords Vector
grestore

gsave
   0.4 setlinewidth
   { x } { xprime } { y } { yprime } 0 2pi 2 mul 10 PlotParametricBezierStupidHom
grestore

