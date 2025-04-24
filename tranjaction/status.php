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
                     $("#txttrno").val(values[0]);
                     let billno=values[1];
                     let index=billno.indexOf('-');
                     let left=billno.substring(0,index);
                     let right=billno.substring(index+1);
                     let status=values[8];
                     $("#txtbillno").val(values[1]);
                     $("#txtsdate").val(values[2]);
                     $("#txtname").val(values[3]);
                     $("#txtarea").val(values[4]);
                     $("#txtbillamt").val(values[5]);
                     $("#txtpam").val(values[6]);
                     $("#txtram").val(values[7]);
                     $("#txtbillno2").val(right);
                     $("#txtbillno1").val(left);
                     $("#txtstatus").val(status);

                            $("#txtbillno").attr('readonly',false);
                            $("#txtdate").attr('readonly',false);
                            $("#txtname").attr('readonly',false);
                            $("#txttrno").attr('readonly',false);
                            $("#txtbillamt").attr('readonly',false);
                            $("#txtsaleman").attr('readonly',false);
                            $("#txtdc").attr('readonly',false);
                            $("#txtstatus").attr('readonly',false);

                            if(user=='Salesman' || user=='Manager' || user=='Labour')
                            {
                                   let res=status.trim();
                                   if(res!='Approved') 
                                      {
                                          $("#txtbillno").attr('readonly',true);
                                          $("#txtdate").attr('readonly',true);
                                          $("#txtname").attr('readonly',true);
                                          $("#txttrno").attr('readonly',true);
                                          $("#txtbillamt").attr('readonly',true);
                                          $("#txtsaleman").attr('readonly',true);
                                          $("#txtdc").attr('readonly',true);
                                          $("#txtstatus").attr('readonly',true);
                                      }
                            }        
                  
              });
              });    


            
              function datalist(){
                     $("status").val("#txtstatus");
                     alert(status);
                            if(user=='Admin')
                            {
                                   if(res!='Not-Approved')
                                    {
                                          ans=confirm("Do you want Approved")
                                          if(ans)
                                          {
                                                 $(function(){
                                                        $("#txtstatus").val('Approved');
                                                 }); 
                                          }
                                          else
                                          {
                                                 $(function(){
                                                        $("#txtstatus").val('Not-Approved');
                                                 }); 
                                          }
                                    }   
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
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                     
                     <form action="status.php" method="POST" class="form-inline form1" role="form">
                     
                            <div class="form-group">
                                   <label class="sr-only" for="">label</label>
                                   <input type="text" class="form-control searchinput" id="txtname" list="clist" placeholder="Search" style="margin-top:20px;" require>

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
                     
                     </form>
                     
              </div>
              
              
              <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                     
              </div>
              
                         
             <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 c1" style="margin-top:20px;" >
                  
                  <div class="panel panel-primary">
                       <div class="panel-heading c2">
                                   <h3 class="panel-title">Sale</h3>
                       </div>
                       <div class="panel-body c8">
                               <table class="table table-bordered table-hover c4" id="display" >
                                          <thead>
                                                 <tr id="thead">
                                                        <th style="display: none;">Tr.No.</th>
                                                        <th >Bill No.</th>
                                                        <th style="display: none;">Sdate</th>
                                                        <th>Name</th>
                                                        <th style="display: none;">Area</th>
                                                        <th >Bill Amt.</th>
                                                        <th style="display: none;">Paid Amt</th>
                                                        <th>Remaining Amt</th>
                                                        <th style="display: none;">Dc</th>
                                                        <th>Status</th>
                                                        <th>Approved</th>
                                                 </tr>
                                          </thead>
                                          <tbody id="tbldata">
                                           
                                            <?php
                                          $sql="select *from tblsale where status='Not-Approved' order by trno";
                                          $res=mysqli_query($link,$sql);
                     
                                                 if(mysqli_num_rows($res)>0)
                                                 {
                                                        while($row=mysqli_fetch_array($res))
                                                        {
                                                        echo "<tr id='t1'>";
                                                        echo "<td style='display: none;''>".$row[0]; "</td>";
                                                        echo "<td>".$row[1]; "</td>";
                                                        echo "<td style='display: none;'>".$row[2]; "</td>";
                                                        echo "<td>".$row[3]; "</td>";
                                                        echo "<td style='display: none;'>".$row[4]; "</td>";
                                                        echo "<td >".$row[5]; "</td>";
                                                        echo "<td style='display: none;'>".$row[6]; "</td>";
                                                        echo "<td>".$row[7]; "</td>";
                                                        echo "<td style='display: none;'>".$row[8]; "</td>";
                                                        echo "<td id='txtstatus' onclick='datalist()' style='color: red' >".$row[10]; "</td>";
                                                        ?>
                                                        <td id="btntd">
                                                        <a href="../savepages/statussave.php?btndelete=delete&trno=<?php echo $row["trno"]; ?>" type="button" class="btn btn-success btnrecord">
                                                        <span class="glyphicon glyphicon-ok glyphicon1" aria-hidden="true"></span>
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
