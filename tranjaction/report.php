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
              <!-- <script>
                     $(function(){
                            $("#tbldata").on("click","tr",function(event){
                            var values=[];
                            var count=0;
                            $(this).find("td").each(function(){
                                   values[count]=$(this).text();
                                   
                                   count++;
                            });
                            $("#txttrno").val(values[0]);
                            $("#txtdate").val(values[1]);
                            $("#txtname").val(values[3]);
                            });
                     });
               </script> -->
       </head>
       <body onload="hide()">
              <?php
                     
                     include("../master/header.php");
                     include("../savepages/search.php");
                     require("../dbcon.php");
                     $name="";
                     if(isset($_POST["btnsave"]))
                     {
                            $name=$_POST["txtname"];
                     }
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

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0px"> 
                     
                     <div class="col-xs-2 col-sm-2 col-md-1 col-lg-1">
                            
                     </div>
                     
                     <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 report1">
                            <form action="report.php" method="POST" class="form-inline form1" role="form">
                            
                                   <div class="form-group"  style="margin-bottom:0px">
                                         
                                          <input type="text" class="form-control searchinput" name="txtname" id="txtname" placeholder="Enter a Name"  list="clist" autocomplete="off" require>

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

                                   <button type="submit" name="btnsave" id="btnsave" class="btn btn-primary btnreport">Search</button>
                            </form>
                     </div>
               </div>
               <?php
                     $sql="select *from tblsale "
               ?>
             <?php
                     $sql="select sum(billamt) from tblsale where name='$name'";
                     $res=mysqli_query($link,$sql);
                     $billamt=0;
                     if($row=mysqli_num_rows($res)>0)
                     {
                            if($row=mysqli_fetch_array($res)){
                                   $billamt=$billamt+$row[0];
                            }
                
                     }

                     $sql="select sum(paidamt) from tblreciept where name='$name'";
                     $res=mysqli_query($link,$sql);
                     $paid=0;
                            if($row=mysqli_num_rows($res)>0)
                            {
                                   if($row=mysqli_fetch_array($res)){
                                          $paid=$paid+$row[0];
                                   }
                     
                            }
                     $ram=$billamt-$paid;    
             ?>
              
              
                     
          
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 report2 " style="padding:50px 0px 0px 0px" >
                     
                     <form action="#" method="POST" class="form-inline" role="form" >
                     
                            <div class="form-group" style="padding:0px 20px 0px 20px;">
                                          <label for="">Total Sale AMT</label>
                                          
                                          <input type="text" class="form-control" id="txtsaleamt" name="txtsaleamt" placeholder="Input field" value= <?php echo $billamt; ?> readonly require>
                            </div>

                            <div class="form-group" style="padding:0px 20px 0px 20px;">
                                          <label for="">Total Paid AMT</label>
                                          <input type="text" class="form-control" id="txtpaidamt" name="txtpaidamt" value=<?php echo $paid;?>  readonly  require>
                            </div>

                            <div class="form-group"style="padding:0px 20px 0px 20px;">
                                          <label for="">Total RMG AMT</label>
                                          <input type="text" class="form-control" id="txtramt" name="txtramt" 
                                          value=<?php echo $ram;?> readonly require>
                            </div>

                     </form>
                     
              </div>
          
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 c1"  style="padding:5px;"> 

                      <div class="panel panel-primary" style="margin:10px 0px 0px 0px">
                              <div class="panel-heading c2">
                                          <h3 class="panel-title">Salling Data</h3>
                              </div>
                              <div class="panel-body c8">
                               <table class="table table-bordered table-hover c4" id="display">
                                          <thead>
                                                 <tr id="thead">
                                                        <th style="display:none;">Tr No.</th>
                                                        <th>Bill No</th>
                                                        <th>SDate</th>
                                                        <th>Name</th>
                                                        <th style="display:none;">Area</th>
                                                        <th>Bill AMT</th>
                                                        <th style="display:none;">Paid AMT</th>
                                                        <th style="display:none;">Remaining AMT</th>
                                                        <th style="display:none;">Option</th>
                                                 </tr>
                                          </thead>
                                          <tbody id="tbldata">
                                            <?php
                                                 $sql="select * from tblsale where name='$name'";
                                                 $res=mysqli_query($link,$sql);
                                                 if(mysqli_num_rows($res)>0)
                                                 {
                                                        while($row=mysqli_fetch_array($res))
                                                        {
                                                           
                                                               echo "<tr id='t1'>";
                                                               echo "<td style='display:none;' >".$row[0]; "</td>";
                                                               echo "<td>".$row[1]; "</td>";
                                                               echo "<td>".$row[2]; "</td>";
                                                               echo "<td>".$row[3];" </td>";
                                                               echo "<td style='display:none;'>".$row[4];" </td>";
                                                               echo "<td>".$row[5];" </td>";
                                                               echo "<td style='display:none;'>".$row[6];"</td>";
                                                               echo "<td id='t2' style='display:none;'>".$row[7];"</td>";
                                                 
                                                        ?>
                                                        <td style="display:none;">
                                                               <a href="../savepages/recieptsave.php?btndelete=delete&trno=<?php echo $row["trno"]; ?>" type="button" class="btn btn-danger">
                                                               <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
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
 
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 c1"  style="padding:5px;">
                      
                      <div class="panel panel-primary" style="margin:10px 0px 0px 0px">
                              <div class="panel-heading c2">
                                          <h3 class="panel-title">Recipt Data</h3>
                              </div>
                              <div class="panel-body c8">
                               <table class="table table-bordered table-hover c4" id="display">
                                          <thead>
                                                 <tr id="thead">
                                                        <th style="display:none;">Tr No.</th>
                                                        <th >Date</th>
                                                        <th >Bill-No</th>
                                                        <th>BillAMT</th>
                                                        <th>PaidAMT</th>
                                                        <th style="display:none;">Narration</th>
                                                        <th style="display:none;">Option</th>
                                                 </tr>
                                          </thead>
                                          <tbody id="tbldata">
                                            <?php
                                                 require("../dbcon.php");
                                                 $sql="select *from tblreciept where name='$name' order by date";
                                                 $res=mysqli_query($link,$sql);
                     
                                                 if(mysqli_num_rows($res)>0)
                                                 {
                                                        while($row=mysqli_fetch_array($res))
                                                        {
                                                           
                                                               echo "<tr id='t1'>";
                                                               echo "<td style='display:none;'>".$row[0]; "</td>";
                                                               echo "<td>".$row[1]; "</td>";
                                                               echo "<td>".$row[2]; "</td>";
                                                               echo "<td style='display:none;'>".$row[3];" </td>";
                                                               echo "<td>".$row[4];" </td>";
                                                               echo "<td> ".$row[5];" </td>";
                                                 
                                                        ?>
                                                        <td style="display:none;">
                                                               <a href="../savepages/recieptsave.php?btndelete=delete&trno=<?php echo $row["trno"]; ?>" type="button" class="btn btn-danger">
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
