<?php
   /* Just basic trigonometry in radians */
?>
/pi <?php echo M_PI; ?> def
/tan { dup sin exch cos div } bind def
/sinr { 180 mul pi div sin } bind def
/cosr { 180 mul pi div cos } bind def
/tanr { 180 mul pi div tan } bind def
/atanr { atan pi mul 180 div } bind def
/acosr {
   % Using formula: acos(x)=atan2(sqrt(1-x^2),x)
   dup dup % x x x
   mul % x x^2
   neg 1 add sqrt % x 1-x^2
   exch atanr
} bind def
/asinr {
   % Using formula: asin(x)=atan2(x,sqrt(1-x^2))
   dup dup dup % x x x x
   mul % x x x^2
   neg 1 add sqrt % x 1-x^2
   atanr % x asin(x)
   exch
   0 lt {
      2 pi mul sub
   } if
} bind def
