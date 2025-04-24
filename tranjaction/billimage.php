<?php
require("../dbcon.php");
if(isset($_GET["btndelete"]))
{
       $trno=$_GET["trno"];
       // $sql="delete from tblstaff where id='$id'";
       // if(mysqli_query($link,$sql))
       // {
       //        echo "<script>alert('Recrod is Deleted')</script>";
       //        echo "<script>open('../customer/staff.php','_self')</script>";          
       // }
}
?>
<!DOCTYPE html>
<html lang="">
       <head>
              <meta charset="utf-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <title>Title Page</title>

              <!-- Bootstrap CSS -->
              <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

              <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
              <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
              <!--[if lt IE 9]>
                     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
                     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
              <![endif]-->
       </head>
       <body>
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="top: 30px; left: 50px;">
                     <a href="reciept.php" type="button">
                     <button type="button" class="btn btn-primary">< Back</button>
                     </a>  
              </div>
              <?php
             
                         $sql="select * from tblsale where trno='$trno'";
                         $res=mysqli_query($link,$sql);
                         if(mysqli_num_rows($res)>0)
                         {
                                while($row=mysqli_fetch_array($res))
                                {
                                       $billno=$row[1];
                                       $paidamt=$row[6];
                                       $salesman=$row[4];
                                       $customer=$row[3];
                                }
                                                           
                         }
                          ?>
                          
                         
                          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" style="margin:70px 0px 0px 50px">
                               <Strong>Billno:</Strong> <?php echo $billno."<br>" ?>
                               <Strong>Paid Amount:</Strong> <?php echo $paidamt; ?>
                               <Strong>Customer:</Strong> <?php echo $customer; ?>
                          </div>
                          
                         
                         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                         <?php
                         $sql="select * from tblphoto where billno='$billno' ";
                         $res=mysqli_query($link,$sql);
                         if(mysqli_num_rows($res)>0)
                         {
                            if($row=mysqli_fetch_array($res))
                            {
                                   ?>
                                       <img src="<?php echo $row[5]; ?>" width="600px" height="500px" style="margin:50px 0px 0px 0px" alt="">
                                   <?php
                            }
                         }
                            ?>
                         </div>
                         
           
                

              <!-- jQuery -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <!-- Bootstrap JavaScript -->
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       </body>
</html>
