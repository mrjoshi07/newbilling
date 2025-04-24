
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
              <style>
                     .ccol a{
                            font-size: 20px;
                     }
              </style>
       </head>
       <body style="background-color: rgb(221, 216, 216);">
             <?php
                     include("customerheader.php");
             ?>
      
             <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2 ccol">
                     <a  onclick="logout()" class="logout"> 
                            
                            <button type="button" class="btn btn-danger">Log-Out</button>
                            
                     </a>
             </div>
                     <script>          
                     function logout(){
                            ans=confirm("Do you want logout...")
                            if(ans)
                            {
                                   open("customer logout.php","_self"); 
                            }
                            else
                            {
                                   alert("You click cancel...");
                            }
                            }
                     </script>   
              
              <div class="col-xs-11 col-sm-11 col-md-7 col-lg-7" style="padding: 20px 0px; margin: 15px;">
                     
              
              <div class="panel panel-primary">
                       <div class="panel-heading">
                                   <h3 class="panel-title">Remaining Bill</h3>
                       </div>
                       <div class="panel-body">
                               
              
                    <div class="table-responsive">
                     <table class="table table-hover table-bordered">
                            <thead>
                                    <tr>
                                          <th>Bill No.</th>
                                          <th>Date</th>
                                          <th>Name</th>
                                          <th>Bill Amt</th>
                                          <th>Paid Amt</th>
                                          <th>RMG Amt</th>
                                   </tr>
                            </thead>
                            <tbody>
                                 <?php
                                          require("../dbcon.php");
                                          $name=$_SESSION["cname"];
                                          $sql="select *from tblsale where name='$name' and rmgamt>0";
                                          $res=mysqli_query($link,$sql);
                                          if(mysqli_num_rows($res)>0)
                                          {
                                                 while($row=mysqli_fetch_array($res))
                                                 {
                                                        echo "<td>".$row["billno"]; "</td>";
                                                        echo "<td>".$row["date"]; "</td>";
                                                        echo "<td>".$row["name"]; "</td>";
                                                        echo "<td>".$row["billamt"]; "</td>";
                                                        echo "<td>".$row["paidamt"]; "</td>";
                                                        echo "<td>".$row["rmgamt"]; "</td>";
                                                 }
                                          }
                                  ?>
                            </tbody>
                     </table>
                    </div>
                    
       
                    
                     
              </div>
       </div>
</div>     
              <!-- jQuery -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <!-- Bootstrap JavaScript -->
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       </body>
</html>
