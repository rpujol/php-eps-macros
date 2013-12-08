<?php
   /* Newton solver in PostScript
      This is a set of macros that finds approximations of the equation f(x)=0
      using the Newton-Raphson method: starting from an approximation x_0,
      generate the sequence (x_n) defined by:
      x_{n+1}=x_n-f(x_n)/f'(x_n)
   */
?>
/NewtonSolverMaxIterations 20 def
/NewtonSolver {
   % { f } { fprime } x0 epsilon NewtonSolver x
   % where x is an approximation of the root f(x*)=0
   % close to x0, with |x-xnext|≤epsilon
   % We also have a maximum number of iterations in the global variable @NewtonSolverMaxIterations
   5 dict begin
      /@epsilon exch def
      /@x0 exch def
      /@fprime exch def
      /@f exch def
      NewtonSolverMaxIterations {
         /@xnext @x0 dup @f @x0 @fprime div sub def
         @x0 @xnext sub abs @epsilon le { exit } if
         /@x0 @xnext def
      } repeat
      @xnext
   end
} bind def
