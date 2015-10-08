<?php
   require_once "arrow-head.php"
?>

<?php
   /* Draw an arrow
      If the length of the arrow is less than the size of the arrow head, draw
      nothing.
    */
?>
/Vector {
   % Usage: Xa Ya Xb Yb Vector
   6 dict begin
      /@Yb exch def
      /@Xb exch def
      /@Ya exch def
      /@Xa exch def
      /@l @Yb @Ya sub dup mul @Xb @Xa sub dup mul add sqrt def
      ArrowHeadHorizontalSize @l le {
         /@a @Yb @Ya sub @Xb @Xa sub atan def
         /@Xc @Xa @a cos @l ArrowHeadHorizontalSize sub mul add def
         /@Yc @Ya @a sin @l ArrowHeadHorizontalSize sub mul add def
         gsave
            newpath
            @Xa @Ya moveto
            @Xc @Yc lineto
            stroke
         grestore
         @a @Xb @Yb ArrowHead
      } if
   end
} bind def

<?php
   /* Draw a double arrow
      If the length of the arrow is less than twice the size of the arrow head,
      draw nothing.
   */
?>
/DoubleVector {
   % Usage: Xa Ya Xb Yb DoubleVector
   8 dict begin
      /@Yb exch def
      /@Xb exch def
      /@Ya exch def
      /@Xa exch def
      /@l @Yb @Ya sub dup mul @Xb @Xa sub dup mul add sqrt def
      ArrowHeadHorizontalSize 2 mul @l le {
         /@dX @Xb @Xa sub @l div ArrowHeadHorizontalSize mul def
         /@dY @Yb @Ya sub @l div ArrowHeadHorizontalSize mul def
         /@a @Yb @Ya sub @Xb @Xa sub atan def
         gsave
            newpath
            @Xa @dX add @Ya @dY add moveto
            @Xb @dX sub @Yb @dY sub lineto
            stroke
         grestore
         @a @Xb @Yb ArrowHead
         @a 180 add @Xa @Ya ArrowHead
      } if
   end
} bind def

