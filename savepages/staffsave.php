<?php
   require("dbcon.php");
   session_start();
   if(isset($_POST["btnsave"]))
   {
    $id=$_POST["txtid"];
    $usertype=$_POST["txtusertype"];
    $sname=$_POST["txtsname"];
    $logid=$_POST["txtlogid"];
    $pass=$_POST["txtpass"];
    $email=$_POST["txtemail"];
    $city=$_POST["txtcity"];
 
    $sql="select * from tblstaff where id=$id";
    $res=mysqli_query($link,$sql);
    if(mysqli_num_rows($res)>0)
    {

        $sql="delete from tblstaff where id='$id'";
        if(mysqli_query($link,$sql)){
          echo "<script>alert('Record updated....')</script>";
          echo"<script>open('../customer/staff.php','_self')</script>";       
        }

    }

       $sql="insert into tblstaff values('$id','$usertype','$sname','$logid','$pass','$email','$city')";
       if(mysqli_query($link,$sql))
       {
              echo "<script>alert('record is inserted')</script>";
              echo "<script>open('../customer/staff.php','_self')</script>";
       }
      
       mysqli_close($link);    
  
}
else if(isset($_GET["btndelete"]))
{
    $id=$_GET["id"];
    $sql="delete from tblstaff where id='$id'";
    if(mysqli_query($link,$sql))
    {
        echo "<script>alert('Recrod is Deleted')</script>";
        echo "<script>open('../customer/staff.php','_self')</script>";          
    }
}
 ?>  