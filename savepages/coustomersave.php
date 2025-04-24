<?php
   require("dbcon.php");
   session_start();
   if(isset($_POST["btnsave"]))
   {
       $trno=$_POST["txttrno"];
       $name=$_POST["txtname"];
       $mno=$_POST["txtmno"];
       $salesman=$_POST["txtsaleman"];
       $email=$_POST["txtemail"];
       $subdist=$_POST["txtsubdis"];
       $city=$_POST["txtcity"];
       
       $sql="select *from tblcustomer where trno=$trno";
       $res=mysqli_query($link,$sql);
       if(mysqli_num_rows($res)>0)
       {
 
          $sql="DELETE FROM tblcustomer WHERE `tblcustomer`.`trno` = $trno";
           if(mysqli_query($link,$sql)){
             echo "<script>alert('Record updated....')</script>";
             echo"<script>open('../customer/customer.php','_self')</script>";       
           }
 
       }
       $sql="insert into tblcustomer values('$trno','$name','$mno','$salesman','$email','$subdist','$city')";
       if(mysqli_query($link,$sql))
       {
              echo "<script>alert('record is inserted')</script>";
              echo "<script>open('../customer/customer.php','_self')</script>";
       }
       mysqli_close($link);    
  
    }
    else if(isset($_GET["btndelete"]))
    {
        $trno=$_GET["trno"];
        $sql="delete from tblcustomer where trno='$trno'";
        if(mysqli_query($link,$sql))
        {
            echo "<script>alert('Recrod is Deleted')</script>";
            echo "<script>open('../customer/customer.php','_self')</script>";          
        }
    }
 ?>  