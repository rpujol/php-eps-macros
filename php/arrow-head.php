/ArrowHeadAngle 15 def
/ArrowHeadProportion 1.67 def
/ArrowHeadHorizontalSize 3 def
/ArrowHead {
   % angle X Y ArrowHead
   gsave
      translate
      180 add rotate
      newpath
         0 0 moveto
         ArrowHeadHorizontalSize ArrowHeadProportion mul dup ArrowHeadAngle cos mul exch ArrowHeadAngle sin mul 2 copy lineto
         ArrowHeadHorizontalSize 0 lineto
         neg lineto closepath
      fill
   grestore
} bind def
