<?php
   /*
      This EPS function plots the graph of a parametric curve using Bezier
      curves, splitting the range into subintervals of equal width
      Uses implicitely coords.php

      Bezier: will connect all the parts with Bezier curves. As we control the
      tangents, you need to have the derivative of the coordinate functions
      given explicitly.

      Stupid: Divides each subinterval of the parametrization into 3 equal
      parts for the control points. This is stupid and doesn't work well if the
      curve doesn't have a nice (with not too large velocity) parametrization.

      Hom: Uses a homoegeneous splitting of the parametrization range into N
      subintervals.
    */
    require_once 'coords.php';
?>
/PlotStupidHom@newpath true def
/PlotStupidHom@initpoint true def
/PlotParametricBezierStupidHom {
   % x x' y y' tmin tmax N PlotParametricBezierStupidHom
   12 dict begin
      /@N exch def
      /@tmax exch def
      /@tmin exch def
      /@yprime exch def
      /@y exch def
      /@xprime exch def
      /@x exch def
      /@Dt @tmax @tmin sub def
      /@dt3 @Dt @N div 3 div def
      PlotStupidHom@newpath { newpath } if
         PlotStupidHom@newpath PlotStupidHom@initpoint or { @tmin @x @tmin @y Coords moveto } if
         0 1 @N 1 sub {
            /@k exch def
            /@t @tmin @Dt @N div @k mul add def
            /@tnext @tmin @Dt @N div @k 1 add mul add def
            @t @x @dt3 @t @xprime mul add @t @y @dt3 @t @yprime mul add Coords
            @tnext @x @dt3 @tnext @xprime mul sub @tnext @y @dt3 @tnext @yprime mul sub Coords
            @tnext @x @tnext @y Coords
            curveto
         } for
      PlotStupidHom@newpath { stroke } if
   end
} bind def
