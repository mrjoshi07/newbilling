
<!DOCTYPE html>
<html lang="">
       <head>
              <meta charset="utf-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <title>Title Page</title>

              <!-- Bootstrap CSS -->
              <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

           
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                 <link rel="stylesheet" href="../style.css">
            <!-- jQuery -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <!-- Bootstrap JavaScript -->
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       
       </head>
       <body>
              <?php
                     include("../master/header.php");
                     include("../savepages/search.php");
              ?>
              <!-- <script>
                     var today = new Date();
                     let todaydate1="";
                     todaydate1="" + today.getFullYear() +"-"+ (today.getMonth()+1) +"-"+ today.getDate();
                     $("#h2").html(data1);
              </script> -->
          
              <?php
                     $user=$_SESSION["user"];
                     // echo "<script> var user= '$user'</script>";
              ?>
              <script>
              //        $(function(){
              //               $("#tbldata").on("ready","tr",function(event){
              //               var values=[];
              //               var count=0;
              //               $(this).find("td").each(function(){
              //                      values[count]=$(this).text();
              //                      count++;
                                  
              //               });
              //               if(diff>15)
              //               {
              //                      $("#t1").css("background-color","red");
              //               }
                           
              //        });
              //   });

              </script>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                     
                  
                     
                     <div class="col-xs-1 col-sm-1 col-md-4 col-lg-4" style="margin: 10px 0px -10px 0px">
                            
                            <a type="button" href="sale.php" class="btn btn-success">BACK</a>
                            
                     </div>

                     <div class="col-xs-10 col-sm-10 col-md-4 col-lg-4" style="margin: 10px 0px -10px 0px">
                          
                          <form action="" method="POST" role="form">
                             <div class="form-group">
                                  
                                   <input type="text" class="form-control" id="txtname" name="txtname" placeholder="Search-Name" list="dlist" autocomplete="off" require>

                                   <datalist id="dlist">
                                   <?php
                                          $sql="select distinct name from tblcustomer order by name";
                                          $res=mysqli_query($link,$sql);
                                          if(mysqli_num_rows($res)>0)
                                          {
                                                 while($row=mysqli_fetch_array($res))
                                                 {
                                                 ?>
                                                 <option id="o1"  value="<?php echo $row[0]; ?>"> <?php echo $row[0]; ?> </option>
                                                 
                                                 <?php
                                                 $datename=$row[0];
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
       <?php            
     
              date_default_timezone_set('UTC');
              $today=date("Y-m-j");
                      
       ?>
       <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 c1">
                  
              <div class="panel panel-primary">
                     <div class="panel-heading c2">
                            <h3 class="panel-title">All Record's</h3>
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
                                                 <th>DC</th>
                                                 <th>Ageing</th>
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
                                                        $date=$row[2];
                                                        echo "<td>".$row[3]; "</td>";
                                                        echo "<td>".$row[4]; "</td>";
                                                        echo "<td>".$row[5]; "</td>";
                                                        echo "<td>".$row[6]; "</td>";
                                                        echo "<td>".$row[7]; "</td>";
                                                        echo "<td>".$row[8]; "</td>";

                                                        $sql1="select DATEDIFF('$today','$date') from dual";
                                                        $res1=mysqli_query($link,$sql1);
                                                        if(mysqli_num_rows($res1)>0)
                                                        {
                                                               if($row1=mysqli_fetch_array($res1))
                                                               {
                                                                      $diff=$row1[0];
                                                                      // echo$diff;
                                                               }
                                                        }
                                                        if($diff>30)
                                                        {
                                                               echo "<td style='background-color:red ; color:white;'>".$diff;"</td>";
                                                        }
                                                       else if($diff>15)
                                                        {
                                                               echo "<td style='background-color:blue; color:white;'>".$diff;"</td>";
                                                        }
                                                        else if($diff<15)
                                                        {
                                                               echo "<td>".$diff;"</td>";
                                                        }
                                                        
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
