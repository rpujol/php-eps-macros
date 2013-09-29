<?php
   $lx=0;
   $ly=0;
   $ux=200;
   $uy=150;
   $title="SmartInsertFont demo";
   $author="Romaric Pujol";
   $date="2013/09/29";
   require_once '../../../php/eps-header.php';

   require_once '../../../php/SmartInsertFont.php';
   SmartInsertFont("cmr10.pfb");
   SmartInsertFont("cmmi10.pfb");
?>

/charsize 10 def
/setCMR10 { /CMR10 findfont charsize scalefont setfont } bind def
/setCMMI10 { /CMMI10 findfont charsize scalefont setfont } bind def

gsave
   setCMR10
   50 50 moveto (123456789 Hello, world!) show
   setCMMI10
   50 100 moveto (xyz) show
grestore

