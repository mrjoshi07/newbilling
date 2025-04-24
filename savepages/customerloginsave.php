<?php
 session_start();
 require("dbcon.php");
 if(isset($_SESSION["cname"]))
 { 
       echo"<script>open('../costomer side/customerheader.php','_self')</script>";
 }
 else if(isset($_POST["btnsave"]))
 {
       $logid=$_POST["txtlogid"];
       $pass=$_POST["txtpass"];
       $sql="select * from tblcustomer where email='$logid' and mobile='$pass'";
       $res=mysqli_query($link,$sql);
       if(mysqli_num_rows($res)>0)
       {
             if($row=mysqli_fetch_array($res))
             {
             
                     $_SESSION["cid"]=$row["id"];
                     $_SESSION["cname"]=$row["name"];
                     echo"<script>open('../costomer side/customerheader.php','_self')</script>";

              }
       }
       else
       {
              echo"<script>alert('Invalid Log-id and Password')</script>";
              echo"<script>open('../coustomerlogin.php','_self')</script>";
       }
 }
 else
 {
       echo"<script>alert('Invalid Log-id and Password')</script>";
       echo"<script>open('../coustomerlogin.php','_self')</script>";   
 }


 
?>