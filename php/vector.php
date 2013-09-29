<?php
   /* Draw an arrow
      If the length of the arrow is less than the size of the arrow head, draw
      nothing.
    */
   require_once "arrow-head.php"
?>
/Vector {
   % Usage: Xa Ya Xb Yb Vector
   8 dict begin
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

