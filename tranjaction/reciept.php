
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
               <link rel="stylesheet" href="../style.css">

               <?php
                     include("../master/header.php");
                     include("../savepages/search.php");
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
              
              <script>
               $(function(){
                $("#tbldata").on("click","tr",function(event){
                    var values=[];
                    var count=0;
                    $(this).find("td").each(function(){
                        values[count]=$(this).text();
                        count++;
                    });
              //    $("#txttrno").val(values[0]);  
                     let status=values[11];
                    $("#txtbillno").val(values[1]);
                    $("#txtname").val(values[3]);
                    $("#txtbill").val(values[5]);

                    $("#txtbillno").attr('readonly',false);
                    $("#txtname").attr('readonly',false);
                    $("#txtbill").attr('readonly',false);
                    $("#txtdate").attr('readonly',false);
                    $("#txtpaid").attr('readonly',false);
                  
                    if(user=='Salesman')
                     {
                            let res=status.trim();
                            if(res!='Approved') 
                            {
                                   $("#txtbillno").attr('readonly',true);
                                   $("#txtname").attr('readonly',true);
                                   $("#txtbill").attr('readonly',true);
                                   $("#txtdate").attr('readonly',true);
                                   $("#txtpaid").attr('readonly',true);
                            }
                     }
                     else if(user!='Manager')
                     {
                            let res=status.trim();
                            if(res!='Approved') 
                            {
                                   $("#txtbillno").attr('readonly',true);
                                   $("#txtname").attr('readonly',true);
                                   $("#txtbill").attr('readonly',true);
                                   $("#txtdate").attr('readonly',true);
                                   $("#txtpaid").attr('readonly',true);
                            }
                     }
                     else if(user!='Labour')
                     {
                            let res=status.trim();
                            if(res!='Approved') 
                            {
                                   $("#txtbillno").attr('readonly',true);
                                   $("#txtname").attr('readonly',true);
                                   $("#txtbill").attr('readonly',true);
                                   $("#txtdate").attr('readonly',true);
                                   $("#txtpaid").attr('readonly',true);
                            }
                     }
                });
            });
        </script>

       
       </head>
       <body onload="hide()">
             
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

              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 c1" >
       
               <div class="panel panel-primary" style="margin:10px 0px 0px 0px;">
                       <div class="panel-heading">
                                   <h3 class="panel-title">Reciept</h3>
                       </div>
                       <div class="panel-body c5">
                             
                             <form action="../savepages/recieptsave.php" method="POST" role="form">
                                  <?php
                                          require("../dbcon.php");
                                          $sql="select max(trno) from tblreciept";
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

                                  <div class="form-group" >
                                          <input type="text" class="form-control" id="txttrno" name="txttrno" placeholder="Tranjaction number" autocomplete="off" value="<?php echo $rowcount;?>" readonly  require>
                                   </div>

                                
                                   
                                   <div class="form-group">
                                          <?php
                                                 date_default_timezone_set('UTC');
                                                 $today=date("Y-m-j");
                                          ?>
                                          <input type="string" class="form-control" id="txtdate" name="txtdate" placeholder="Date"  value="<?php echo $today; ?>" autocomplete="off" require>
                                   </div>

                                   <div class="form-group">
                                          <input type="text" class="form-control" id="txtbillno" name="txtbillno" placeholder="Bill NO" value="" autocomplete="off" require>
                                   </div>

                                   <div class="form-group">
                                         
                                          <input type="text" class="form-control" id="txtname" name="txtname" placeholder="Name" list="clist" autocomplete="off" require>
                                          <datalist id="clist">
                                          <?php
                                                 $sql="select name from tblsale order by name";
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
                                          <input type="text" class="form-control" id="txtbill" name="txtbill" placeholder="Bill-AMT" autocomplete="off" require>
                                   </div>

                                   <div class="form-group">
                                          <input type="text" class="form-control" id="txtpaid" name="txtpaid" placeholder="Paid-AMT" autocomplete="off" require>
                                   </div>
                              
                                   <button type="submit" name="btnsave" class="btn btn-primary">Submit</button>
                             </form>
                              
                       </div>
              </div>
              
        </div>
        <?php
               $sql="delete from tbltemp";
               mysqli_query($link,$sql);
               $sql="select * from tblsale";
               $res=mysqli_query($link,$sql);
               
               if(mysqli_num_rows($res)>0)
               {
                     while($row=mysqli_fetch_array($res))
                     {
                            $trno=$row[0];
                            $billno=$row[1];
                            $date=$row[2];
                            $name=$row[3];
                            $salesman=$row[4];
                            $billamt=$row[5];
                            $paidamt=$row[6];
                            $rmgamt=$row[7];
                            $dc=$row[8];
                            $ref=$row[9];
                            $status=$row[10];

                            $sql1="select DATEDIFF('$today','$date') from dual";
                            $res1=mysqli_query($link,$sql1);           
                            if(mysqli_num_rows($res1)>0)
                            {
                                   while($row1=mysqli_fetch_array($res1))
                                   {
                                                 $diff=$row1[0];
                                   }
                            }

                            $sql2="insert into tbltemp values('$trno','$billno','$date','$name','$salesman','$billamt','$paidamt','$rmgamt','$dc','$ref','$status','$diff')";
                            mysqli_query($link,$sql2);
                     }
               }
       ?>

       <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 c1" >
                      
                      <div class="panel panel-primary" style="margin:10px 0px 0px 0px">
                              <div class="panel-heading">
                                          <h3 class="panel-title">Sale Data</h3>
                              </div>
                              <div class="panel-body c3">
                               <table class="table table-bordered table-hover c4" id="display">
                                          <thead id="thead">
                                                 <tr>
                                                        <th style='display:none;'>Tr No.</th>
                                                        <th>Bill No</th>
                                                        <th>Date</th>
                                                        <th>Name</th>
                                                        <th>salesman</th>
                                                        <th>Bill-AMT</th>
                                                        <th>Paid AMT</th>
                                                        <th>RMG AMT</th>
                                                        <th>Ageing</th>
                                                        <th>BillImage</th>
                                                        <th>Reference</th>
                                                        <th>Approval</th>
                                                        <th id="option">Option</th>
                                                 </tr>
                                          </thead>
                                          <tbody id="tbldata">
                                            <?php
                                                 require("../dbcon.php");
                                                 $user=$_SESSION["user"];
                                                 $name=$_SESSION["name"];
                                                 if($user=="Salesman")
                                                 {
                                                        $sql="select *from tbltemp where salesman='$name' and rmgamt>0 or paidamt=0 order by ageing desc";
                                                        $res=mysqli_query($link,$sql);
                            
                                                        if(mysqli_num_rows($res)>0)
                                                        {
                                                               while($row=mysqli_fetch_array($res))
                                                               {
                                                               
                                                                      echo "<tr id='t1'>";
                                                                      echo "<td style='display:none;'>".$row[0]; "</td>";
                                                                      echo "<td>".$row[1]; "</td>";
                                                                      echo "<td>".$row[2]; "</td>";
                                                                      echo "<td>".$row[3];" </td>";
                                                                      echo "<td>".$row[4];" </td>";
                                                                      echo "<td>".$row[5];" </td>";
                                                                      echo "<td>".$row[6];" </td>";
                                                                      echo "<td>".$row[7];" </td>";
                                                                      $diff=$row[11];
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
                                                                      echo "<td>"?>
                                                                      <a href="billimage.php?btndelete=delete&trno=<?php echo $row["trno"]; ?>" type="button" class="btn btn-success">
                                                                     <span class="glyphicon glyphicon-camera glyphicon1" aria-hidden="true"></span>
                                                                     </a>
                                                                     <?php
                                                                     "</td>";
                                                                      echo "<td>".$row[9]; "</td>";
                                                                     
                                                                      echo "<td>".$row[10]; "</td>";
                                                               
                                                               ?> 
                                                               <td id="btntd" style="display:none">
                                                                      <a href="../savepages/recieptsave.php?btndelete=delete&trno=<?php echo $row["trno"]; ?>" type="button" class="btn btn-danger">
                                                                      <span class="glyphicon glyphicon-trash glyphicon1" aria-hidden="true"></span>
                                                                      </a>
                                                               </td>
                                                               <?php
                                                               echo "</tr>";

                                                               }    
                                                        }
                                                  }
                                                  else if($user=="Manager")
                                                  {
                                                        $sql="select distinct  trno,billno,date,name,salesman,billamt,paidamt,rmgamt,dc,ref,status,ageing from tbltemp where rmgamt>0 or paidamt=0 order by ageing desc";
                                                        $res=mysqli_query($link,$sql);
                            
                                                        if(mysqli_num_rows($res)>0)
                                                        {
                                                               while($row=mysqli_fetch_array($res))
                                                               {
                                                               
                                                                      echo "<tr id='t1'>";
                                                                      echo "<td style='display:none;'>".$row[0]; "</td>";
                                                                      echo "<td>".$row[1]; "</td>";
                                                                      echo "<td>".$row[2]; "</td>";
                                                                      echo "<td>".$row[3];" </td>";
                                                                      echo "<td>".$row[4];" </td>";
                                                                      echo "<td>".$row[5];" </td>";
                                                                      echo "<td>".$row[6];" </td>";
                                                                      echo "<td>".$row[7];" </td>";
                                                                      $diff=$row[11];
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
                                                                      echo "<td>"?>
                                                                             
                                                                      <a href="billimage.php?btndelete=delete&trno=<?php echo $row["trno"]; ?>" type="button" class="btn btn-success">
                                                                      <span class="glyphicon glyphicon-camera glyphicon1" aria-hidden="true"></span>
                                                                      </a>
                                                                      <?php  "</td>"; 
                                                                             
                                                                      echo "<td>" .$row[9]; "</td>";
                                                               ?>
                                                               <td id="btntd" style="display:none">
                                                                      <a href="../savepages/recieptsave.php?btndelete=delete&trno=<?php echo $row["trno"]; ?>" type="button" class="btn btn-danger">
                                                                      <span class="glyphicon glyphicon-trash glyphicon1" aria-hidden="true"></span>
                                                                      </a>
                                                               </td>
                                                               <?php
                                                               echo "</tr>";

                                                               }    
                                                        }
                                                  }
                                                  else if($user=="Admin")
                                                  {
                                                        $sql="select trno,billno,date,name,salesman,billamt,paidamt,rmgamt,dc,ref,status,ageing from tbltemp order by ageing desc";                                                   $res=mysqli_query($link,$sql);
                            
                                                        if(mysqli_num_rows($res)>0)
                                                        {
                                                               while($row=mysqli_fetch_array($res))
                                                               {
                                                               
                                                                      echo "<tr id='t1'>";
                                                                      echo "<td style='display:none;'>".$row[0]; "</td>";
                                                                      echo "<td>".$row[1]; "</td>";
                                                                      echo "<td>".$row[2]; "</td>";
                                                                      echo "<td>".$row[3];" </td>";
                                                                      echo "<td>".$row[4];" </td>";
                                                                      echo "<td>".$row[5];" </td>";
                                                                      echo "<td>".$row[6];" </td>";
                                                                      echo "<td>".$row[7];" </td>";
                                                                      $diff=$row[11];
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
                                                                      echo "<td>"?>
                                                                             
                                                                      <a href="billimage.php?btndelete=delete&trno=<?php echo $row["trno"]; ?>" type="button" class="btn btn-success">
                                                                     <span class="glyphicon glyphicon-camera glyphicon1" aria-hidden="true"></span>
                                                                      </a>
                                                                      <?php  "</td>"; 
                                                                             
                                                                      echo "<td>" .$row[9]; "</td>";
                                                                      echo "<td>" .$row[10]; "</td>";

                                                               ?>
                                                               <td id="btntd option">
                                                                      <a href="../savepages/recieptsave.php?btndelete=delete&trno=<?php echo $row["trno"]; ?>" type="button" class="btn btn-danger">
                                                                      <span class="glyphicon glyphicon-trash glyphicon1" aria-hidden="true"></span>
                                                                      </a>
                                                               </td>
                                                               <?php
                                                               echo "</tr>";

                                                               }    
                                                        }
                                                  }
                                           ?>
                                          </tbody>
                               </table>
                              </div>
                      </div>
                      
              </div>
             <?php
                if($user=="Admin")
                {
                     ?>
                            <script>
                                   $(function(){
                                          $("#option").show();
                                   })
                            </script>
                     <?php
                }
                else if($user=="Salesman")
                {
                     ?>
                            <script>
                                   $(function(){
                                          $("#option").hide();
                                   })
                            </script>
                     <?php
                }
                else if($user=="Labour")
                {
                     ?>
                            <script>
                                   $(function(){
                                          $("#option").hide();
                                   })
                            </script>
                     <?php
                }
                else if($user=="Manager")
                {
                     ?>
                            <script>
                                   $(function(){
                                          $("#option").hide();
                                   })
                            </script>
                     <?php
                }
             ?>
              <!-- jQuery -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <!-- Bootstrap JavaScript -->
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       </body>
</html>
