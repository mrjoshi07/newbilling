<?php
   require("dbcon.php");
   session_start();
   if(isset($_POST["btnsave"]))
   {
      $trno=$_POST["txttrno"];
      $billno=$_POST["txtbillno"];
      $date=$_POST["txtdate"];
      $name=$_POST["txtname"];
      $saleman=$_POST["txtsaleman"];
      $billamt=$_POST["txtbillamt"]; 
      $dc=$_POST["txtdc"];
      $ref=$_POST["txtref"];
      $status=$_POST["txtstatus"];

      $sql="select *from tblsale where trno='$trno'";
      $res=mysqli_query($link,$sql);
      if(mysqli_num_rows($res)>0)
      {

         $sql="update tblsale set date='$date',billno='$billno',name='$name',salesman='$saleman',billamt='$billamt',dc='$dc', status='$status' where trno='$trno'";
          if(mysqli_query($link,$sql)){
            echo "<script>alert('Record updated....')</script>";
            echo"<script>open('../tranjaction/sale.php','_self')</script>";       
          }

      }
      
      $rmgamt=$billamt;
      $sql="select name from tblcustomer where name='$name'";
      $res=mysqli_query($link,$sql);
      if(mysqli_num_rows($res)>0)
      {
         
         $sql="insert into tblsale values('$trno','$billno','$date','$name','$saleman','$billamt','$rmgamt','$dc','$status')";
         if(mysqli_query($link,$sql))
         {
                echo "<script>alert('record is inserted')</script>";
                echo "<script>open('../tranjaction/sale.php','_self')</script>";
         }
      }   
      else{
         echo "<script>alert('Create Customer')</script>";
         echo"<script>open('../customer/customer.php','_self')</script>";
      }
      mysqli_close($link);    
  
   }
   else if(isset($_GET["btndelete"]))
   {
       $trno=$_GET["trno"];
       $sql="delete from tblsale where trno='$trno'";
       if(mysqli_query($link,$sql))
       {
           echo "<script>alert('Recrod is Deleted')</script>";
           echo "<script>open('../tranjaction/sale.php','_self')</script>";          
       }
   }
   
?>