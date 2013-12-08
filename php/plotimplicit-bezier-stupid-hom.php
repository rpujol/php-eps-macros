<?php
   /*
      This function will plot an implicit curve of the form f(x,y)=0. We need:
         * The function f
         * The gradient of the function f
         * An initial point x0,y0
         * A number of points to plot "to the left"
         * A number of points to plot "to the right"
         * The distance between points
      Notes:
         * f is a function of 2 variables
         * gradf pops 2 values on the stack (the x and y coordinates)
         and pushes 2 values on the stack (the x and y coordinates of the gradient of f)
         * Left/Right is with respect to gradient at (x0,y0), when pointing upward
   */
   require_once "newton-solver.php";
   require_once "coords.php";
   require_once "trigonometry.php";
?>
/@PlotImplicitCurveEpsilon 0.001 def
%%% Plots a certain nb of points to the left and to the right
/PlotImplicitCurveNbPoints {
   % { f } { gradf } x0 y0 maxL maxR dist PlotImplicitCurve
   14 dict begin
      /@dist exch def
      /@maxR exch def
      /@maxL exch def
      /@y0i exch def
      /@x0i exch def
      /@gradfimpl exch def
      /@fimpl exch def
      /left@rightpi2 pi 2 div def
      /do@leftright {
         /@impltheta @x0 @y0 @gradfimpl exch atanr left@rightpi2 add def
         { @g } { @gprime }
         @impltheta
         @PlotImplicitCurveEpsilon
         NewtonSolver
         dup cosr @dist mul @x0 add exch sinr @dist mul @y0 add
         /@ynew exch def
         /@xnew exch def
         @impltheta dup cosr @dist 3 div mul @x0 add exch sinr @dist 3 div mul @y0 add Coords
         @xnew @ynew @gradfimpl exch atanr left@rightpi2 sub dup cosr @dist 3 div mul @xnew add exch sinr @dist 3 div mul @ynew add Coords
         @xnew @ynew Coords curveto
         /@x0 @xnew def
         /@y0 @ynew def
      } bind def
      /@g { dup cosr @dist mul @x0 add exch sinr @dist mul @y0 add @fimpl } bind def
      /@gprime { dup dup cosr @dist mul @x0 add exch sinr @dist mul @y0 add @gradfimpl 3 2 roll dup cosr @dist mul 3 2 roll mul 3 1 roll sinr @dist mul mul neg add } bind def
      % To the left:
      /@x0 @x0i def
      /@y0 @y0i def
      newpath
      @x0 @y0 Coords moveto
      @maxL { do@leftright } repeat
      stroke
      % To the right
      /@x0 @x0i def
      /@y0 @y0i def
      newpath
      @x0 @y0 Coords moveto
      /left@rightpi2 left@rightpi2 neg def
      @maxR { do@leftright } repeat
      stroke
   end
} bind def
%%% This one stops when a point exits the given window
/PlotImplicitCurveWindow {
   % { f } { gradf } x0 y0 xmin xmax ymin ymax dist PlotImplicitCurve
   14 dict begin
      /@dist exch def
      /@implymax exch def
      /@implymin exch def
      /@implxmax exch def
      /@implxmin exch def
      /@y0i exch def
      /@x0i exch def
      /@gradfimpl exch def
      /@fimpl exch def
      /left@rightpi2 pi 2 div def
      /do@leftright {
         /@impltheta @x0 @y0 @gradfimpl exch atanr left@rightpi2 add def
         { @g } { @gprime }
         @impltheta
         @PlotImplicitCurveEpsilon
         NewtonSolver
         dup cosr @dist mul @x0 add exch sinr @dist mul @y0 add
         /@ynew exch def
         /@xnew exch def
         @impltheta dup cosr @dist 3 div mul @x0 add exch sinr @dist 3 div mul @y0 add Coords
         @xnew @ynew @gradfimpl exch atanr left@rightpi2 sub dup cosr @dist 3 div mul @xnew add exch sinr @dist 3 div mul @ynew add Coords
         @xnew @ynew Coords curveto
         /@x0 @xnew def
         /@y0 @ynew def
      } bind def
      /@g { dup cosr @dist mul @x0 add exch sinr @dist mul @y0 add @fimpl } bind def
      /@gprime { dup dup cosr @dist mul @x0 add exch sinr @dist mul @y0 add @gradfimpl 3 2 roll dup cosr @dist mul 3 2 roll mul 3 1 roll sinr @dist mul mul neg add } bind def
      % To the left:
      /@x0 @x0i def
      /@y0 @y0i def
      newpath
      @x0 @y0 Coords moveto
      {
         do@leftright
         @x0 @implxmin lt { exit } if
         @y0 @implymin lt { exit } if
         @x0 @implxmax gt { exit } if
         @y0 @implymax gt { exit } if
      } loop
      stroke
      % To the right
      /@x0 @x0i def
      /@y0 @y0i def
      newpath
      @x0 @y0 Coords moveto
      /left@rightpi2 left@rightpi2 neg def
      {
         do@leftright
         @x0 @implxmin lt { exit } if
         @y0 @implymin lt { exit } if
         @x0 @implxmax gt { exit } if
         @y0 @implymax gt { exit } if
      } loop
      stroke
   end
} bind def
