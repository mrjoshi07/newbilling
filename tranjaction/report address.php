
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
                 <link rel="stylesheet" href="../style.css">
            <!-- jQuery -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <!-- Bootstrap JavaScript -->
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       
              <style>
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
                     @media only screen and (max-width: 400px)
                     {
                           
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
       </head>
       <body onload="hide()">
              <?php
                     include("../master/header.php");
                     include("../savepages/search.php");
              ?>
            
              <?php
                     $user=$_SESSION["user"];
                     $name=$_SESSION["name"];
                     $user=$_SESSION["user"];
                     echo "<script> var user= '$user'</script>";
                   
              ?>
                    

               <script>
                     function hide(){
                    if(user=='Admin')
                    {
                      document.getElementsByClassName('gl1')[0].
                      style.visibility = 'visible';
                     }
                     }
               </script>
               <div class="gl1"> 
                    <a href="sale.php" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                    
                     
                     <div class="col-xs-3 col-sm-3 col-md-4 col-lg-4">
                            
                     </div>
                     

                     <div class="col-xs-10 col-sm-10 col-md-4 col-lg-4" style="margin: 10px 0px -10px 0px">
                          
                          <form action="" method="POST" role="form">
                             <div class="form-group">
                                  
                                   <input type="text" class="form-control" id="txtname" name="txtname" placeholder="Search-Name" list="slist" autocomplete="off">

                                   <datalist id="slist">
                                   <?php
                                          $sql="select *from tblstaff where usertype='Salesman'";
                                          $res=mysqli_query($link,$sql);
                                          if(mysqli_num_rows($res)>0)
                                          {
                                                 while($row=mysqli_fetch_array($res))
                                                 {
                                                 ?>
                                                 <option value="<?php echo $row[2]; ?>"> <?php echo $row[2]; ?> </option>
                                                 
                                                 <?php
                                                 $saleman=$row[2];
                                                 }
                                          }
                                   ?> 
                                   </datalist>
                            </div>  
                          </form>
                          
                     </div>
                     
              </div>
              
     
       
       <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
              
       </div>
      
       <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 c1">
                  
              <div class="panel panel-primary">
                     <div class="panel-heading c2">
                            <h3 class="panel-title">Pending Bills</h3>
                     </div>
                     <div class="panel-body c3">
                            <table class="table table-bordered table-hover c4" id="display" >
                                   <thead id="thead">
                                          <tr>
                                                 <th style="display: none;">Tr.No.</th>
                                                 <th>Bill No.</th>
                                                 <th>Date</th>
                                                 <th>Name</th>
                                                 <th>Salesman</th>
                                                 <th>Bill Amt</th>
                                                 <th>Paid Amt</th>
                                                 <th>RMG Amt</th>
                                                 <th style='display: none;'>Ageing</th>
                                                 <th style='display: none;'>DC</th>
                                                 <th style='display: none;'>Status</th>
                                                 <th >Option</th>
                                          </tr>
                                   </thead>
                                   <tbody id="tbldata">
                                          
                                   <?php
                                          
                                          require("../dbcon.php");
                                          $sql="select * from tblsale";
                                          $res=mysqli_query($link,$sql);
                                          
                                          if(mysqli_num_rows($res)>0)
                                          {
                                                 while($row=mysqli_fetch_array($res))
                                                 {
                                                        echo "<tr id='t1'>";
                                                        echo "<td style='display: none;''>".$row[0]; "</td>";
                                                        echo "<td>".$row[1]; "</td>";
                                                        echo "<td>".$row[2]; "</td>";
                                                        echo "<td>".$row[3]; "</td>";
                                                        echo "<td>".$row[4]; "</td>";
                                                        echo "<td>".$row[5]; "</td>";
                                                        echo "<td>".$row[6]; "</td>";
                                                        echo "<td>".$row[7]; "</td>";
                                                        echo "<td style='display: none;'>".$row[8]; "</td>";
                                                        echo "<td style='display: none;'>".$row[9]; "</td>";
                                                 ?>
                                                 <td id="btntd">
                                                 <a href="../savepages/salesave.php?btndelete=delete&trno=<?php echo $row["trno"]; ?>" type="button" class="btn btn-danger" >
                                                 <span class="glyphicon glyphicon-trash glyphicon1" aria-hidden="true"></span>
                                                 </a>
                                                 </td>
                                                 <?php
                                                 echo "</tr>";

                                                 } 
                                          }
                                          ?>
                                   </tbody>
                            </table>
                            </div>
              </div>
                  
       </div>

              <!-- jQuery -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <!-- Bootstrap JavaScript -->
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       </body>
</html>
