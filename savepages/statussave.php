<?php
   require("dbcon.php");
   session_start();
   if(isset($_GET["btndelete"]))
   {
        $user=$_SESSION["user"];
        // echo "<script> var user ='$user'</script>";
        if($user=='Admin')
        {
                $trno=$_GET["trno"];
                $sql="update tblsale set status='Approved' where trno='$trno'";
                if(mysqli_query($link,$sql))
                {
                    echo "<script>alert('Status is Approved')</script>";
                    echo "<script>open('../tranjaction/status.php','_self')</script>";          
                }
        }
        else{
            echo "<script>alert('Staff is cannot update status')</script>";
            echo "<script>open('../tranjaction/status.php','_self')</script>";          
        }
   }
?>