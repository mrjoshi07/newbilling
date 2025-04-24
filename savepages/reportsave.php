<?php
   require("dbcon.php");
   session_start();
   if(isset($_POST["btnsave"]))
   {
      $name=$_POST["txtname"];
      $sql="select from tblsale where name='$name'";
   

   }
  ?>    