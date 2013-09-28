% FlecheH1=Longueur de la grande barre
/FlecheH1 5 def
% FlecheH2=Longueur de la petite barre
/FlecheH2 3 def
% Angle entre la fleche et le segment
/FlecheAngle { 15 } def
/Fleche {
   % angle X Y Fleche
   3 dict begin
   /Y exch def /X exch def /a exch def
   newpath
      X Y moveto
      a FlecheAngle sub 180 add cos FlecheH1 mul
      a FlecheAngle sub 180 add sin FlecheH1 mul rlineto
      X a 180 add cos FlecheH2 mul add
      Y a 180 add sin FlecheH2 mul add lineto
      X a FlecheAngle add 180 add cos FlecheH1 mul add
      Y a FlecheAngle add 180 add sin FlecheH1 mul add lineto
      closepath
   fill
   end
} bind def
