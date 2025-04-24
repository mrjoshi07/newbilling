<?php
 session_start();
 require("dbcon.php");
 if(isset($_SESSION["name"]))
 { 
       // $_SESSION["id"]=$row["id"];
       // $_SESSION["name"]=$row["sname"];
       $user=$_SESSION["user"]; 
       if( $user =="Labour")
       {                    
           
              echo"<script>alert('Welcome labour')</script>";
              echo"<script>open('../tranjaction/photos.php','_self')</script>";
              

       }
       else if( $user =="Admin")
       {
            
              echo"<script>alert('Welcome Admin')</script>";
              echo"<script>open('../customer/customer.php','_self')</script>";
       }
       else if( $user =="Salesman")
       {
            
              echo"<script>alert('Welcome Salesman')</script>";
              echo"<script>open('../tranjaction/reciept.php','_self')</script>";
       }
       else if( $user =="Manager")
       {
           
              echo"<script>alert('Welcome Manager')</script>";
              echo"<script>open('../tranjaction/sale.php','_self')</script>";
       }
       else
       {
              echo"<script>alert('Some Issue Generated Try After Some Time')</script>";   
       }
     
       
 }
 else if(isset($_POST["savelogin"]))
 {
       $logid=$_POST["txtname"];
       $pass=$_POST["txtpass"];
       $sql="select usertype,sname,logid from tblstaff where logid='$logid' and password='$pass'";
       $res=mysqli_query($link,$sql);
       if(mysqli_num_rows($res)>0)
       {
             if($row=mysqli_fetch_array($res))
             {
                     $text = $row[0];
                     $trimmed = trim($text);
                     $log=$row[2];


                     if($trimmed =="Labour")
                     {                    
                            $_SESSION["user"]=$trimmed;
                            $_SESSION["name"]=$row["sname"];
                            $_SESSION["logid"]=$log;
                            echo"<script>alert('Welcome labour')</script>";
                            echo"<script>open('../tranjaction/photos.php','_self')</script>";
                          

                     }
                     else if( $trimmed =="Admin")
                     {
                            $_SESSION["user"]=$trimmed;
                            $_SESSION["name"]=$row["sname"];
                            $_SESSION["logid"]=$log;
                            echo"<script>alert('Welcome Admin')</script>";
                            echo"<script>open('../customer/customer.php','_self')</script>";
                     }
                     else if( $trimmed =="Salesman")
                     {
                            $_SESSION["user"]=$trimmed;
                            $_SESSION["name"]=$row["sname"];
                            $_SESSION["logid"]=$log;
                            echo"<script>alert('Welcome Salesman')</script>";
                            echo"<script>open('../tranjaction/reciept.php','_self')</script>";
                     }
                     else if( $trimmed =="Manager")
                     {
                            $_SESSION["user"]=$trimmed;
                            $_SESSION["name"]=$row["sname"];
                            $_SESSION["logid"]=$log;
                            echo"<script>alert('Welcome Manager')</script>";
                            echo"<script>open('../tranjaction/sale.php','_self')</script>";
                     }
                     else
                     {
                            echo"<script>alert('its Not Work .$row[1].')</script>";
                            echo"<script>open('../adminlogin.php','_self')</script>";
                     }
              }
       }
      
       $sql="select * from tblcustomer where email='$logid' and mobile='$pass'";
       $res=mysqli_query($link,$sql);
       if(mysqli_num_rows($res)>0)
       {
             if($row=mysqli_fetch_array($res))
             {
                     $_SESSION["ctrno"]=$row["trno"];
                     $_SESSION["cname"]=$row["name"];
                     echo"<script>alert('Welcome Sir')</script>";
                     echo"<script>open('../costomer side/customerpayment.php','_self')</script>";
             }
       }
       else
       {
              echo"<script>alert('Invalid Log-id and Password')</script>";
              echo"<script>open('../adminlogin.php','_self')</script>";
       }
 }
 else
 {
       echo"<script>alert('Invalid Log-id and Password')</script>";
       echo"<script>open('../adminlogin.php','_self')</script>";   
 }


 
?>