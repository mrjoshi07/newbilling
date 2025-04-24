
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
       
       </head>
       <body onload="hide()">
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

                            if(user!='Admin')
                            {
                                   document.getElementsByClassName('btntd')[0].
                                   style.display = 'none';
                            }
                            // else if(user=='Labor')
                            // {
                            //        document.getElementsByClassName('btntd')[0].
                            //        style.display = 'none';
                            // }   
                            // else if(user=='Manager')
                            // {
                            //        document.getElementsByClassName('btntd')[0].
                            //        style.display = 'none';
                            // }  
                     }
               </script>

<?php
                if($user=="Admin")
                {
                     ?>
                            <script>
                                   $(function(){
                                          $("#option").show();
                                          $(".btntd").show();
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
                  
            
      
              <script> 
                     $(function(){
                            $("#tbldata").on("click","tr",function(event){
                            var values=[];
                            var count=0;
                            $(this).find("td").each(function(){
                                   values[count]=$(this).text();
                                   count++;
                            });
                            let status=values[11];
                            $("#txttrno").val(values[0]);  
                            $("#txtbillno").val(values[1]);
                            $("#txtdate").val(values[2]);
                            $("#txtname").val(values[3]);
                            // $("#txtsaleman").val(values[4]);
                            $("#txtbillamt").val(values[5]);
                            $("#txtdc").val(values[9]);
                            $("#txtref").val(values[10]);
                            $("#txtstatus").val(values[11]);

                            $("#txtbillno").attr('readonly',false);
                            $("#txtdate").attr('readonly',false);
                            $("#txtname").attr('readonly',false);
                            $("#txttrno").attr('readonly',false);
                            $("#txtbillamt").attr('readonly',false);
                            $("#txtdc").attr('readonly',false);
                            $("#txtstatus").attr('readonly',false);
                            $("#txtref").attr('readonly',false);


                            if( user=='Manager')
                               {          
                                   let res=status.trim();
                                   if(res=='Not-Approved') 
                                      {
                                          $("#txtbillno").attr('readonly',true);
                                          $("#txtdate").attr('readonly',true);
                                          $("#txtname").attr('readonly',true);
                                          $("#txttrno").attr('readonly',true);
                                          $("#txtbillamt").attr('readonly',true);
                                          $("#txtsaleman").attr('readonly',true);
                                          $("#txtdc").attr('readonly',true);
                                          $("#txtstatus").attr('readonly',true);
                                          $("#txtref").attr('readonly',true);
                                      }
                               
                            }  
                           
                         });
                     });

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
                     .allrec{
                            margin: 10px 0px -10px 0px;
                     }
                     #thead #btntd1{
                            padding-left:13px;
                     }
                     #option{
                            display:none;
                     }
                     .btntd{
                            display:none;
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
                    <a href="sale.php" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
              </div>
                     
                     
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                     
                     <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                            
                     </div>
                     
                     <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 allrec">
                            
                            <a type="button" href="salerecord.php" class="btn btn-success">All-Record's</a>
                            
                     </div>
              </div>
              
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 c1" style="margin:20px 0px 0px  0px;">
       
               <div class="panel panel-primary">
                       <div class="panel-heading">
                                   <h3 class="panel-title">Sale Details</h3>
                       </div>
                       <div class="panel-body c6">
                             
                             <form action="../savepages/salesave.php" method="POST" role="form" onsubmit="return cal()">
                                
                                  <?php
                                          require("../dbcon.php");
                                          $sql="select max(trno) from tblsale";
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
                                          <input type="text" class="form-control" id="txttrno" name="txttrno" placeholder="Tranjaction number" value="<?php echo $rowcount;?>" readonly require>
                                   </div>
                              
                             
                                   <div class="form-group" >
                                          <?php
                                                 date_default_timezone_set('UTC');
                                                 $today=date("Y-m-j");
                                          ?>
                                     
                                          <input type="date" class="form-control txtdate" id="txtdate" name="txtdate" placeholder="Date"  value="<?php echo date('Y-m-d'); ?>" require>
                                   </div>

                                   <div class="form-group">
                                          <input type="text" class="form-control" id="txtbillno" name="txtbillno" placeholder="Billno" autocomplete="off" require>
                                   </div>
                                  
                                  
                                   <div class="form-group">
                                          <input type="text" class="form-control txtname" id="txtname" name="txtname" placeholder="Name" list="dlist" autocomplete="off" require>
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
                                                        }
                                                 }
                                          ?> 
                                          </datalist>
                                   </div>
                                
                                   <div class="form-group">
                                          <input type="text" class="form-control" id="txtsaleman" name="txtsaleman" placeholder="Salesman" readonly  autocomplete="off" require>  
                                   </div>
                                  
                                   <div class="form-group">
                                          <input type="text" class="form-control" id="txtbillamt" name="txtbillamt" placeholder="Bill-Amount" autocomplete="off" require>
                                   </div>
                                   <div class="form-group">
                                           <input type="text" class="form-control" id="txtdc" name="txtdc" placeholder="DC" autocomplete="off" list="vlist" require>
                                           <datalist id="vlist">
                                                 <option value="HOL">HOL</option>
                                                 <option value="DC">DC</option>
                                                 <option value="Trading">Trading</option>
                                          </datalist>
                                   </div>

                                   <div class="form-group">
                                           <input type="text" class="form-control" id="txtref" name="txtref" placeholder="Reference by" autocomplete="off" list="glist" require>
                                           <datalist id="glist">
                                                 <option value="Online">Online</option>
                                                 <option value="Check">Check</option>
                                                 <option value="Cash">Cash</option>
                                          </datalist>
                                   </div>
                                   
                              
                                   <!--<div class="form-group">
                                          <input type="text" class="form-control" id="txtdc" name="txtdc" placeholder="DC" autocomplete="off">
                                   </div>-->

                            <script>
                                   function datalist()
                                   {
                                      if(user=='Admin')
                                       {
                                          let value=$("#txtstatus").val();
                                          if(value=="Not-Approved")
                                          {
                                                 ans=confirm("Do you want Approved")
                                                 if(ans)
                                                 {
                                                        $(function(){
                                                               $("#txtstatus").val('Approved');
                                                        }); 
                                                 }
                                         }
                                         else if(value="Approved")
                                         {
                                                  ans=confirm("Do you want Not-Approved")
                                                 if(ans)
                                                 {
                                                        $(function(){
                                                               $("#txtstatus").val('Not-Approved');
                                                        }); 
                                                 }
                                         }
                                     }
                                   }  
                            </script>

                                   <div class="form-group">
                                   <input type="text" class="form-control" id="txtstatus" name="txtstatus"  placeholder="Status" list="plist" autocomplete="off" value="Not-Approved" onclick="datalist()" require>
                                   </div>
                                          
                           
                                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                 <button type="submit" name="btnsave" class="btn btn-primary btn-block" id="b1">Submit</button>
                                 </div>
                                 
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
       <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 c1">
                  
              <div class="panel panel-primary">
                     <div class="panel-heading c2">
                            <h3 class="panel-title">Pending Record's</h3>
                     </div>
                     <div class="panel-body c3">
                            <table class="table table-bordered table-hover c4 display" id="display" >
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

                                                 <th>Ageing</th>
                                                 <th>DC</th>
                                                 <th>Reference</th>
                                                 <th>Status</th>
                                                 <th  id="option">Option</th>
                                          </tr>
                                   </thead>
                                   <tbody id="tbldata">
                                          
                                      <?php
                                          
                                          require("../dbcon.php");
                                          // $user=$_SESSION["user"];
                                          // $name=$_SESSION["name"];
                                          // if()
                                          $sql="select distinct trno,billno,date,name,salesman,billamt,paidamt,rmgamt,dc,ref,status,ageing from tbltemp order by ageing desc";
                                          $res=mysqli_query($link,$sql);
                                          if(mysqli_num_rows($res)>0)
                                          {
                                                 while($row=mysqli_fetch_array($res))
                                                 {
                                                        echo "<tr id='t1' class='t1'>";
                                                        echo "<td style='display: none;''>".$row[0]; "</td>";
                                                        echo "<td>".$row[1]; "</td>";
                                                        echo "<td>".$row[2]; "</td>";
                                                        // $date1=$row[2];
                                                        echo "<td id='chkname'>".$row[3]; "</td>";
                                                        echo "<td id='chk' >".$row[4]; "</td>";
                                                        echo "<td>".$row[5]; "</td>";
                                                        echo "<td>".$row[6]; "</td>";
                                                        echo "<td>".$row[7]; "</td>";
                                                        // echo "<td>".$row[11]; "</td>";
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
                                                        echo "<td>".$row[8]; "</td>";
                                                        echo "<td>".$row[9]; "</td>";
                                                        echo "<td>".$row[10]; "</td>";

                                                 ?>
                                                 <td id="btntd1" class="btntd" >
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
