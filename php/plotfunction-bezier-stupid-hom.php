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

      Hom: Uses a homogeneous splitting of the range into N subintervals.

      Note: uses the parametric curve plotting function
         PlotParametricBezierStupidHom from file
         plotparametric-bezier-stupid-hom.php
    */
    require_once 'coords.php';
    require_once 'plotparametric-bezier-stupid-hom.php'
?>

/PlotFunctionBezierStupidHom {
   % f f' xmin xmax N PlotFunctionBezierStupidHom
   { } { pop 1 } 7 2 roll PlotParametricBezierStupidHom
} bind def
