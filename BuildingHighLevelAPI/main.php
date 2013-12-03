<!DOCTYPE html>
<html>
<body>

<script>
   debugger;  // Forces debugger to stop on the first line

   var i = 1;
   var j = 2;
   var sum = i + j;
   document.write(sum);
</script>



<p>Some Javascript above, we will use Firebug to debug it.</p>

<?php
   require_once "GoogleManager.php";


   $g = new GoogleManager;


   $page = $g->Query("presidents");
   echo $page;

   $page = $g->Query("synthesizer");
   echo $page;

   $page = $g->Query("literate programming");
   echo $page;

?>


</body>
</html>
