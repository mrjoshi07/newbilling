<?php
   require("dbcon.php");
   session_start();
   $user=$_SESSION["user"];
   if(isset($_POST["btnsave"]))
   {
      $trno=$_POST["txttrno"];
      $date=$_POST["txtdate"];
      $billno=$_POST["txtbillno"];
      $name=$_POST["txtname"];
      $billamt=$_POST["txtbill"]; 
      $paid=$_POST["txtpaid"];
   
        $sql="insert into tblreciept values('$trno','$date','$billno','$name','$billamt','$paid')";
        if(mysqli_query($link,$sql))
        {
            echo "<script>alert('Record updated...')</script>";
            // echo"<script>open('../tranjaction/reciept.php','_self')</script>";      
        }
    

        $sql="select *from tblsale where billno='$billno'";
        $res=mysqli_query($link,$sql);
        if(mysqli_num_rows($res)>0)
        {                   
            while($row=mysqli_fetch_array($res))
            { 
                $paidamt=$row[6];
                $paidamt+=$paid;
                $rmg=$billamt-$paidamt;
                
                if($user=='Salesman')
                {
                    $sql="update tblsale set paidamt='$paidamt',rmgamt='$rmg',status='Not-Approved' where billno='$billno'";
                    if(mysqli_query($link,$sql))
                    {
                        echo"<script>open('../tranjaction/reciept.php','_self')</script>";      
                    }
                    else
                    {
                        echo mysqli_error($link);
                    }
                }
               else if($user=='Labour')
                {
                    $sql="update tblsale set paidamt='$paidamt',rmgamt='$rmg',status='Not-Approved' where billno='$billno'";
                    if(mysqli_query($link,$sql))
                    {
                        echo"<script>open('../tranjaction/reciept.php','_self')</script>";      
                    }
                    else
                    {
                        echo mysqli_error($link);
                    }
                }
                else if($user=='Manager')
                {
                    $sql="update tblsale set paidamt='$paidamt',rmgamt='$rmg',status='Not-Approved' where billno='$billno'";
                    if(mysqli_query($link,$sql))
                    {
                        echo"<script>open('../tranjaction/reciept.php','_self')</script>";      
                    }
                    else
                    {
                        echo mysqli_error($link);
                    }
                }
                else if($user=='Admin')
                {
                    $sql="update tblsale set paidamt='$paidamt',rmgamt='$rmg' where billno='$billno'";
                    if(mysqli_query($link,$sql))
                    {
                        echo"<script>open('../tranjaction/reciept.php','_self')</script>";      
                    }
                    else
                    {
                        echo mysqli_error($link);
                    }
                }
            }
                
        }
        

    
    mysqli_close($link);

   }

   else if(isset($_GET["btndelete"]))
   {
       $trno=$_GET["trno"];
       $sql="delete from tblreciept where trno='$trno'";
       if(mysqli_query($link,$sql))
       {
           echo "<script>alert('Recrod is Deleted')</script>";
           echo "<script>open('../tranjaction/reciept.php','_self')</script>";          
       }
   }
   
?>