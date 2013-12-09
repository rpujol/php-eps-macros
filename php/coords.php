<?php
   /* An eps function that transforms coordinates (x,y) in a given frame to
      absolute coordinates. The EPS file must have defined:
      xmin xmax ymin ymax : the window in the given frame 
      Xmin Xmax Xmin Xmax : the window in the absolute coordinates system

      In fact, these names can be set to any names, using the PHP variables
      used below:
    */
    if(!isset($xmin_name)) { $xmin_name="xmin"; }
    if(!isset($xmax_name)) { $xmax_name="xmax"; }
    if(!isset($ymin_name)) { $ymin_name="ymin"; }
    if(!isset($ymax_name)) { $ymax_name="ymax"; }
    if(!isset($Xmin_name)) { $Xmin_name="Xmin"; }
    if(!isset($Xmax_name)) { $Xmax_name="Xmax"; }
    if(!isset($Ymin_name)) { $Ymin_name="Ymin"; }
    if(!isset($Ymax_name)) { $Ymax_name="Ymax"; }
    if(!isset($Deltax_name)) { $Deltax_name="@Deltax"; }
    if(!isset($Deltay_name)) { $Deltay_name="@Deltay"; }
    if(!isset($DeltaX_name)) { $DeltaX_name="@DeltaX"; }
    if(!isset($DeltaY_name)) { $DeltaY_name="@DeltaY"; }
?>
/ComputeDelta {
<?php
   echo "   /$DeltaX_name $Xmax_name $Xmin_name sub def\n";
   echo "   /$DeltaY_name $Ymax_name $Ymin_name sub def\n";
   echo "   /$Deltax_name $xmax_name $xmin_name sub def\n";
   echo "   /$Deltay_name $ymax_name $ymin_name sub def\n";
?>
} bind def
/Coords {
   % x y Coords X Y
   <?php echo "$ymin_name sub $DeltaY_name mul $Deltay_name div $Ymin_name add exch\n"; ?>
   <?php echo "$xmin_name sub $DeltaX_name mul $Deltax_name div $Xmin_name add exch\n"; ?>
} bind def
/deltay2DeltaY {
   % dy deltay2DeltaY DY
   <?php echo "$DeltaY_name mul $Deltay_name div"; ?>
} bind def
/deltax2DeltaX {
   % dx deltax2DeltaX DX
   <?php echo "$DeltaX_name mul $Deltax_name div"; ?>
} bind def
ComputeDelta
