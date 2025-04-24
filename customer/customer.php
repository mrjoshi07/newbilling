
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
              <link rel="stylesheet" href="../style.css">

              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <script>
               $(function(){
                $("#tbldata").on("click","tr",function(event){
                    var values=[];
                    var count=0;
                    $(this).find("td").each(function(){
                        values[count]=$(this).text();
                        count++;
                    });
                    $("#txttrno").val(values[0]);
                    $("#txtname").val(values[1]);
                    $("#txtmno").val(values[2]);
                    $("#txtsaleman").val(values[3])
                    $("#txtemail").val(values[4]);
                    $("#txtsubdis").val(values[5]);
                    $("#txtcity").val(values[6]);
                   
                });
            });

        </script>
       </head>
       <body onload="hide()">
              <?php
                     include("../master/header.php");
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

              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 customer1" >
       
               <div class="panel panel-primary">
                       <div class="panel-heading">
                                   <h3 class="panel-title">Create a Coustomer Information</h3>
                       </div>
                       <div class="panel-body c5">
                             
                             <form action="../savepages/coustomersave.php" method="POST" role="form">
                               
                             
                                 <?php
                                   require("../dbcon.php");
                                   $sql="select max(trno) from tblcustomer";
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
                                          <input type="text" class="form-control" id="txttrno" name="txttrno" placeholder="Input field" value= <?php echo $rowcount; ?> readonly require>
                                    </div>

                                   <div class="form-group">
                                          <input type="text" class="form-control" id="txtname" name="txtname" placeholder="Name" list="clist" autocomplete="off" require>
                                          <datalist id="clist">
                                          <?php
                                                 $sql="select name from tblcustomer order by name";
                                                 $res=mysqli_query($link,$sql);
                                                 
                                                 if(mysqli_num_rows($res)>0)
                                                 {
                                                        while($row=mysqli_fetch_array($res))
                                                        {
                                                               ?>
                                                              <option value="<?php echo $row[0]; ?>"> <?php echo $row[0]; ?> </option>
                                                              <?php
                                                        }
                                                 }
                                          ?>
                                          
                                          </datalist>
                                   </div>
                                  
                                   <div class="form-group">
                                          <input type="text" class="form-control" id="txtmno" name="txtmno" placeholder="Mobile No" autocomplete="off" require>
                                   </div>
                                   
                                   <div class="form-group">
                                          <input type="text" class="form-control" id="txtsaleman" name="txtsaleman" list="slist" placeholder="Salesman" autocomplete="off" require>

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
                                                      
                                                        }
                                                 }
                                           ?> 
                                           </datalist>
                                          
                                   </div>

                                   <div class="form-group">
                                          <input type="text" class="form-control" id="txtemail" name="txtemail" placeholder="E-mail" autocomplete="off" require> 
                                   </div>
                            
                            
                                   <div class="form-group">
                                          <input type="text" class="form-control" id="txtsubdis" name="txtsubdis" placeholder="Sub-District" autocomplete="off" require>
                                   </div>

                                   <div class="form-group">
                                          <input type="text" class="form-control" id="txtcity" name="txtcity" placeholder="City" autocomplete="off" require>
                                   </div>
                             
                                   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <button type="submit" name="btnsave" class="btn btn-primary btn-block">Submit</button>
                                   </div> 
                             </form>
                       </div>
              </div>   
      </div>
                                     
            
              <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 c1" style="margin-top:20px;" >
                     
                     <div class="panel panel-primary" >
                              <div class="panel-heading c2">
                                          <h3 class="panel-title">Customer</h3>
                              </div>
                              <div class="panel-body c8">
                                        
                              <table class="table table-bordered table-hover table-responsive c4" >
                                          <thead id="thead">
                                                 <tr>
                                                        <th style='display: none;'>trno</th>
                                                        <th>Name</th>
                                                        <th>Mobile-No</th>
                                                        <th>Salesman</th>
                                                        <th style='display: none;'>Email</th>
                                                        <th>Sub-District</th>
                                                        <th>City</th>
                                                        <th>Delete</th>
                                                 </tr>
                                          </thead>
                                          <tbody id="tbldata">
                                          <?php
                                $sql="select *from tblcustomer";
                                   $res=mysqli_query($link,$sql);
                                   
                                   if(mysqli_num_rows($res)>0)
                                   {
                                          while($row=mysqli_fetch_array($res))
                                          {
                                               echo "<tr>";
                                               echo "<td style='display: none;'>".$row[0]; "</td>";
                                               echo "<td>".$row[1]; "</td>";
                                               echo "<td>".$row[2]; "</td>";
                                               echo "<td>".$row[3]; "</td>";
                                               echo "<td style='display: none;'>".$row[4]; "</td>";
                                               echo "<td>".$row[5]; "</td>";
                                               echo "<td>".$row[6]; "</td>";
                                             
                                          ?>
                                               <td id="btntd">
                                                 <a href="../savepages/coustomersave.php?btndelete=delete&trno=<?php echo $row["trno"]; ?>" type="button" class="btn btn-danger">
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
