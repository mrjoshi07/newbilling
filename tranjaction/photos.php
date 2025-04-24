
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
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <!-- jQuery -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <!-- Bootstrap JavaScript -->
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
              <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.24/webcam.js"></script>
              <!-- Bootstrap theme -->
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
              <link rel="stylesheet" href="../style.css">
             
       </head>
       <body onload="hide()">
              <?php
                     include("../master/header.php");
                     include("../savepages/search.php");
                     $user=$_SESSION["user"];
                     echo "<script> var user ='$user'</script>"
              ?>
               <script>
                     function hide(){
                        if(user=='Admin')
                            {
                                   document.getElementsByClassName('gl1')[0].
                                   style.visibility = 'visible';
                            }

                        if(user=='Salesman')
                        {
                              document.getElementsByClassName('btntd')[0].
                              style.display = 'none';
                        }
                        else if(user=='Labor')
                        {
                            document.getElementsByClassName('btntd')[0].
                            style.display = 'none';
                            
                        }   
                        else if(user=='Manager')
                        {
                            document.getElementsByClassName('btntd')[0].
                            style.display = 'none';
                        }  
                     }
               </script>
             
              
       <style>
                     .s1{
                            margin:20px 20px 20px 20px;
                     }
                     .gl1{
                            left: 1200px;
                            top: 500px;
                            position:fixed;
                            z-index: 1;
                            visibility:hidden;
                            padding: 8px 10px 0px 12px;
                            border-radius: 180px;
                            background-color: white;
                            box-shadow: 0px 2px 25px  black;
                     }
                     .gl1 a{
                            font-size: 30px;
                     }
                     .btntd{
                            display: show;
                     }
                     @media only screen and (max-width: 400px)
                     {
                            .s1{
                                   margin:20px 0px 0px 0px;
                            }
                            .gl1{
                            left: 300px;
                            top: 550px;
                            position:fixed;
                            z-index: 1;
                            padding: 8px 10px 0px 12px;
                            border-radius: 180px;
                            background-color: white;
                            box-shadow: 0px 2px 25px  black;
                            }
                     }
                     
              </style>
           
              <div class="gl1"> 
                    <a href="sale.php" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
              </div>
              
            <div class="col-xs-0 col-sm-0 col-md-2 col-lg-2">
              
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 s1">

                     <form action="" method="POST" role="form">

                            <div class="form-group">
                                   <input type="text" class="form-control"  id="txtname" name="txtname" placeholder="Search"  autocomplete="off" require>
                            </div>

                     </form>  
            </div>

            


<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 c1">
                     
                     
    <div class="panel panel-primary c2">
              <div class="panel-heading">
                     <h3 class="panel-title">Bill Images</h3>
              </div>
              <div class="panel-body c3">
       
                     <div class="table-responsive table3">
                            <table class="table table-hover table-bordered table-responsive">
                                   <thead>
                                          <tr>
                                                 <th style='display: none;'>trno</th>
                                                 <th>Bill no</th>
                                                 <th>Date</th>
                                                 <th>Customer</th>
                                                 <th>Camera</th>
                                                 <th>Approval</th>
                                          </tr>
                                   </thead>
                                 <tbody id="display">
                                            <?php      
                                                 $sql="select *from tblsale";
                                                 $res=mysqli_query($link,$sql);
                            
                                                 if(mysqli_num_rows($res)>0)
                                                 {
                                                        while($row=mysqli_fetch_array($res))
                                                        {
                                                               
                                                               $billno=$row[2];
                                                               $status=$row[10];
                                                               echo "<script> var status= '$status'</script>";
                                                              
                                                               echo "<tr id='t1'>";
                                                               echo "<td style='display: none;'>".$row[0]; "</td>";
                                                        
                                                               echo "<td>".$row[1]; "</td>";
                                                               echo "<td>".$row[2]; "</td>";
                                                               // echo "<td>".$row[4]; "</td>";
                                                               echo "<td>".$row[3]; "</td>";
                                                       
                                                               echo "<td>"?><a href="
                                                               <?php
                                                                      $result=trim($status);
                                                                      if($result=='Approved')
                                                                      {
                                                                 ?> camera.php?btndelete=delete&trno=<?php echo $row["trno"]; ?>
                                                                 <?php
                                                               }
                                                               else
                                                               {
                                                                  ?>
                                                                      photos.php
                                                                  <?php
                                                               }   
                                                                ?>
                                                              " type="button" class="btn btn-success">
                                                               <span class="glyphicon glyphicon-camera glyphicon1" aria-hidden="true" ></span>
                                                               </a>

                                                               <?php "</td>";
                                                               echo "<td>".$row[10];"</td>";
                                                        echo "</tr>";

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
