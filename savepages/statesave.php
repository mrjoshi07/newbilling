<?php
   require("dbcon.php");
   session_start();
   if(isset($_POST["btnsave"]))
   {
      $id=$_POST["txtid"];
      $state=$_POST["txtstate"];
      $sql="select *from tblstate where id='$id'";
      $res=mysqli_query($link,$sql);
      if(mysqli_num_rows($res)>0)
      { 
          $sql="delete from tblstate where id='$id'";
          if(mysqli_query($link,$sql)){
            echo "<script>alert('Record updated....')</script>";
            echo"<script>open('../master/state.php','_self')</script>";       
          }

      }
      $sql="insert into tblstate values('$id','$state')";
      if(mysqli_query($link,$sql))
      {
         echo "<script>alert('Record inserted....')</script>";
         echo"<script>open('../master/district.php','_self')</script>";       
      }
     
      mysqli_close($link);    
  
    }
    else if(isset($_GET["btndelete"]))
    {
      $id=$_GET["id"];
        $sql="delete from tblstate where id='$id'";
        if(mysqli_query($link,$sql))
        {
            echo "<script>alert('Recrod is Deleted')</script>";
            echo "<script>open('../master/state.php','_self')</script>";          
        }
    }
?>