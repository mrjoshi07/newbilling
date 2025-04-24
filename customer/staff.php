<?php
       // require("dbcon.php");
       // session_start();
       if(isset($_SESSION["name"]))
       {
              echo"<script>open('../savepages/saveadminlogin.php','_self')</script>";
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
                    $("#txtsname").val(values[2]);
                    $("#txtlogid").val(values[3]);
                    $("#txtpass").val(values[4]);
                    $("#txtemail").val(values[5]);
                    $("#txtcity").val(values[6]);
                });
            });

        </script>
       </head>
       <body>
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
              </style>
              <div class="gl1"> 
                    <a href="../tranjaction/sale.php" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="margin-top: 20px;">
       
               <div class="panel panel-primary">
                       <div class="panel-heading">
                                   <h3 class="panel-title">Staff details</h3>
                       </div>
                       <div class="panel-body c5">
                             
                             <form action="../savepages/staffsave.php" method="POST" role="form">
                                
                              
                                <?php
                                   require("../dbcon.php");
                                   $sql="select max(id) from tblstaff";
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
                                          <input type="text" class="form-control" id="txtid" name="txtid" placeholder="ID" value="<?php echo $rowcount; ?> " require>
                                   </div>

                                   <div class="form-group">
                                          <input type="text" class="form-control" id="txtusertype" name="txtusertype" placeholder="User" list="clist" autocomplete="off" require>
                                          <datalist id="clist">
                                          <?php
                                                 $sql="select usertype from tblusertype order by usertype";
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
                                          <input type="text" class="form-control" id="txtsname" name="txtsname" placeholder="Name" autocomplete="off" require>
                                   </div>

                                   <div class="form-group">
                                          <input type="text" class="form-control" id="txtlogid" name="txtlogid" placeholder="Login-id" readonly autocomplete="off" require>
                                          <script>
                                                 $("#txtsname").keyup(function(){
                                                        let name=$("#txtsname").val();
                                                        $("#txtlogid").val(name);
                                                        let fullid=$("#txtlogid").val()+""+$("#txtid").val();
                                                        // let rfullid=fullid.replaceAll(" ","_").trimEnd();
                                                        $("#txtlogid").val(fullid);
                                                 })
                                          </script>
                                   </div>

                                   <div class="form-group">
                                          <input type="text" class="form-control" id="txtpass" name="txtpass" placeholder="Password" autocomplete="off" require>
                                   </div>
                                   
                                   <div class="form-group">
                                          <input type="text" class="form-control" id="txtemail" name="txtemail" placeholder="Email" autocomplete="off" require>
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
            
              
              <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 c1" style="margin-top: 20px;" >
                      
                      <div class="panel panel-primary">
                              <div class="panel-heading c2">
                                          <h3 class="panel-title">Staff</h3>
                              </div>
                              <div class="panel-body c8">
                                   <table class="table table-bordered table-hover c4">
                                   <thead id="thead">
                                                 <tr>
                                                        <th style="display:none;">ID</th>
                                                        <th>User</th>
                                                        <th>Name</th>
                                                        <th>Log-id</th>
                                                        <th>Password</th>
                                                        <th style='display: none;'>Email</th>
                                                        <th>City</th>
                                                        <th>Delete</th>
                                                        
                                                 </tr>
                                          </thead>
                                          <tbody id="tbldata">
                                          <?php
                                          $sql="select *from tblstaff";
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
                                                      echo "<td>".$row[4]; "</td>";
                                                      echo "<td style='display: none;'>".$row[5]; "</td>";
                                                      echo "<td>".$row[6]; "</td>";
                                             
                                                    
                                                   ?>
                                                      <td id="btntd">
                                                 <a href="../savepages/staffsave.php?btndelete=delete&id=<?php echo $row["id"]; ?>" type="button" class="btn btn-danger">
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
