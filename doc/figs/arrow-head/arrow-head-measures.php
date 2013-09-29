<?php
   $arrowwidth=200;
   $theta=25;
   $proportion=1.6;
   $m_lx=20;
   $m_ux=20;
   $my=10;
   $width=$arrowwidth+$m_lx+$m_ux;
   $lx=0;
   $ly=0;
   $ux=$lx+$width;
   $uy=$ly+2*($arrowwidth*tan(deg2rad($theta))+$my);
   $author="Romaric Pujol";
   $title="Arrow Head Measures";
   $date="2013/09/28";
   require_once "../../../eps-header.php";
   require_once "../../../arrow-head.php";

   require_once "../../../SmartInsertFont.php";
?>

/theta <?php echo $theta; ?> def
/proportion <?php echo $proportion; ?> def
/horsize <?php echo $arrowwidth/($proportion*cos(deg2rad($theta))); ?> def

/DotSize <?php echo $arrowwidth*.01; ?> def
/Dot {
   % X Y dot
   gsave newpath DotSize 0 360 arc fill grestore
} bind def

<?php
   SmartInsertFont("cmmi10.pfb");
?>

/charsize 10 def
/setCMMI10 { /CMMI10 findfont charsize scalefont setfont } bind def

gsave
   0.4 setlinewidth
   <?php echo $lx+$m_lx." ".($uy+$ly)/2; ?> translate
   0 0 Dot
   horsize 0 Dot
   newpath
   0 0 moveto
   <?php echo $arrowwidth; ?>
   <?php echo $arrowwidth*tan(deg2rad($theta)); ?>
   2 copy Dot
   lineto
   horsize 0
   lineto
   <?php echo $arrowwidth; ?>
   <?php echo -$arrowwidth*tan(deg2rad($theta)); ?>
   lineto
   closepath
   stroke
grestore

gsave
   0.1 setlinewidth
   [ 3 3 ] 0 setdash
   <?php echo $lx." ".($uy+$ly)/2; ?> moveto
   <?php echo $ux." ".($uy+$ly)/2; ?> lineto
   stroke
grestore

gsave
   0.1 setlinewidth
   <?php echo $lx+$m_lx." ".($uy+$ly)/2; ?> translate
   newpath
   0 0 <?php echo $arrowwidth*.15; ?> 0 theta arc
   stroke
grestore

gsave
   1 setlinewidth
   newpath
   <?php echo $lx+$m_lx." ".($uy+$ly)/2; ?> translate
   DotSize -3 mul DotSize 2.6 mul moveto
      setCMMI10 (O) show
   horsize 0 moveto
   DotSize -3 mul DotSize 2.6 mul rmoveto
      setCMMI10 (A) show
   <?php echo $arrowwidth; ?>
   <?php echo $arrowwidth*tan(deg2rad($theta)); ?>
   moveto
   0 charsize neg DotSize sub rmoveto
      setCMMI10 (B) show
   <?php echo $arrowwidth*.16; ?> DotSize 2.6 mul moveto
      setCMMI10 (\022) show
grestore

