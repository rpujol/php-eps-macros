<?php
   /* Newton solver in PostScript
      This is a set of macros that finds approximations of the equation f(x)=0
      using the Newton-Raphson method: starting from an approximation x_0,
      generate the sequence (x_n) defined by:
      x_{n+1}=x_n-f(x_n)/f'(x_n)
   */
?>
/@NewtonSolverMaxIterations 20 def
/NewtonSolver {
   % { f } { fprime } x0 epsilon NewtonSolver x
   % where x is an approximation of the root f(x*)=0
   % close to x0, with |x-xnext|≤epsilon
   % We also have a maximum number of iterations in the global variable @NewtonSolverMaxIterations
   5 dict begin
      /ns@epsilon exch def
      /ns@x0 exch def
      /ns@fprime exch def
      /ns@f exch def
      /ns@xnext { error }  def
      @NewtonSolverMaxIterations {
         /ns@xnext ns@x0 dup ns@f ns@x0 ns@fprime div sub def
         ns@x0 ns@xnext sub abs ns@epsilon le { exit } if
         /ns@x0 ns@xnext def
      } repeat
      ns@xnext
   end
} bind def
