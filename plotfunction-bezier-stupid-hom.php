<?php
   /* This EPS function plots the graph of a function using Bezier curves,
      splitting the range into subintervals of equal width
      Uses implicitely coords.php

      Bezier: will connect all the parts with Bezier curves. As we control the
      tangents, you need to have the derivative of the function given
      explicitly.

      Stupid: Divides each subinterval into 3 equal parts for the control
      points. This is stupid and doesn't work well if the function has very
      steep slopes.

      Hom: Uses a homoegeneous splitting of the range into N subintervals.
    */
    require_once 'coords.php';
    require_once 'plotparametric-bezier-stupid-hom.php'
?>
<? // Old version was:
   /*
/PlotFunctionBezierStupidHom {
   % f f' xmin xmax N PlotFunctionBezierStupidHom
   9 dict begin
      /@N exch def
      /@xmax exch def
      /@xmin exch def
      /@fprime exch def
      /@f exch def
      /@Dx @xmax @xmin sub def
      newpath
         @xmin dup @f Coords moveto
         0 1 @N 1 sub {
            /@k exch def
            /@x @xmin @Dx @N div @k mul add def
            /@xnext @xmin @Dx @N div @k 1 add mul add def
            @x 2 mul @xnext add 3 div @x @fprime @xnext @x sub 3 div mul @x @f add Coords
            @x @xnext 2 mul add 3 div @xnext @fprime @x @xnext sub 3 div mul @xnext @f add Coords
            @xnext dup @f Coords
            curveto
         } for
      stroke
   end
} bind def
   */
?>

/PlotFunctionBezierStupidHom {
   % f f' xmin xmax N PlotFunctionBezierStupidHom
   { } { pop 1 } 7 2 roll PlotParametricBezierStupidHom
} bind def
