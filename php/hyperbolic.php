<?php
   /* Just basic hyperbolic and exponentials */
?>
/E <?php echo M_E; ?> def
/EXP { exch exp } bind def
/cosh { dup EXP exch neg EXP add 2 div } bind def
/sinh { dup EXP exch neg EXP sub 2 div } bind def
/tanh { dup sinh exch cosh div } bind def
/arcsinh { dup dup mul 1 add sqrt add ln } bind def
/arccosh { dup dup mul 1 sub sqrt add ln } bind def
/arctanh { dup 1 add exch neg 1 add div ln 2 div } bind def
