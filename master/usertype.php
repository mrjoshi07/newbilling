
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
              <script>
               $(function(){
                $("#tbldata").on("click","tr",function(event){
                    var values=[];
                    var count=0;
                    $(this).find("td").each(function(){
                        values[count]=$(this).text();
                        count++;
                    });
                    $("#txtid").val(values[0]);
                    $("#txtusertype").val(values[1]);
                });
            });

        </script>
       </head>
       <body onload="hide()">
              <?php
                     include("header.php");
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
                            .allrec{
                            margin: 10px 0px -10px -50px;
                            }
                            #thead #btntd1{
                            padding-left:0px;
                            }
                     }
              </style>
              <div class="gl1"> 
                    <a href="../tranjaction/sale.php" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
              </div>
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                     
              </div>
              
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
       
                     <div class="panel panel-primary" style="margin-top: 20px;">
                       <div class="panel-heading">
                                   <h3 class="panel-title">User Type</h3>
                       </div>
                       <div class="panel-body c5">
                             
                             <form action="../savepages/usersave.php" method="POST" role="form">
                             <?php
                                   require("../dbcon.php");
                                   $sql="select max(id) from tblusertype";
                                   $res=mysqli_query($link,$sql);
                                   $rowcount=0;
                                   if(mysqli_num_rows($res)>0)
                                   {
                                          if($row=mysqli_fetch_array($res))
                                          {
                                                 $rowcount=$row[0]+1;
                                          }
                                   }
                                   else
                                   {
                                          $rowcount=1;
                                   }  
                               ?> 
                                   <div class="form-group" style="display: none;">
                                          <label for="">ID</label>
                                          <input type="text" class="form-control" id="txtid" name="txtid" placeholder="Input field" value= <?php echo $rowcount; ?> readonly>
                                   </div>

                                   <div class="form-group">
                                          <input type="text" class="form-control" id="txtusertype" name="txtusertype" placeholder="User type" autocomplete="off" require>
                                   </div>
                              
                                   <button type="submit" name="btnsave" class="btn btn-primary">Submit</button>
                             </form>
                              
                       </div>
              </div>
              
             </div>
             
           
             <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 " style="margin-top: 20px;">
              
              <div class="panel panel-primary" >
                       <div class="panel-heading c2">
                                   <h3 class="panel-title">user</h3>
                       </div>
                       <div class="panel-body c7">
                                 
                       <table class="table table-bordered table-hover c4">
                                   <thead id="thead">
                                          <tr>
                                                 <th style="display: none;">Id</th>
                                                 <th>User type</th>
                                                 <th>Delete</th>
                                          </tr>
                                   </thead>
                                   <tbody id="tbldata">
                                   <?php
                                $sql="select *from tblusertype";
                                   $res=mysqli_query($link,$sql);
                                   
                                   if(mysqli_num_rows($res)>0)
                                   {
                                          while($row=mysqli_fetch_array($res))
                                          {
                                               echo "<tr>";
                                               echo "<td style='display: none;'>".$row[0]; "</td>";
                                               echo "<td>".$row[1]; "</td>";
                                               ?>
                                               <td id="btntd">
                                               <a href="../savepages/usersave.php?btndelete=delete&id=<?php echo $row["id"]; ?>" type="button" class="btn btn-danger">
                                                   <span class="glyphicon glyphicon-trash glyphicon1" aria-hidden="true"></span>
                                               </a>
   
                                               </td>
                                               </tr>
                                               <?php

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
