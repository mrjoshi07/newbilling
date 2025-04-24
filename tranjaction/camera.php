<?php
       require("../dbcon.php");
       if(isset($_GET["btndelete"]))
       {
              $trno=$_GET["trno"];
              // $sql="delete from tblstaff where id='$id'";
              // if(mysqli_query($link,$sql))
              // {
              //        echo "<script>alert('Recrod is Deleted')</script>";
              //        echo "<script>open('../customer/staff.php','_self')</script>";          
              // }
       }
?>
<!DOCTYPE html>
<html lang="">
       <head>
              <meta charset="utf-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <title>Title Page</title>

              <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <style>
                     #td3 img{
                            height: 100px;
                            width: 100px;
                     }
                     /* .camera1{
                            margin:20px;
                     } */
                     /* #td3 img:hover{
                            height: 400px;
                            width: 400px;
                            transition-duration: 2s;
                     } */
                     @media only screen and (max-width: 400px)
                     {
                            /* .camera1{
                                   margin:0px;
                            }   */
                     }
              </style>
       </head>
       <body>

       <script>

              function query(x){
                     // if (x.matches) 
                     // {
                     //        $(function(){
                     //               $(".camera1").hide();
                     //               // $(".camera2").hide();
                     //               $(".camera3").hide();
                     //               $(".camera4").show();
                     //               $(".camera5").show();
                     //        });
                     // }
                     // else
                     // {
                     //        $(function(){
                     //               $(".camera1").show();
                     //               $(".camera2").show();
                     //               $(".camera3").show();
                     //               $(".camera4").hide();
                     //               $(".camera5").hide();
                     //        });
                     // }
              }

              var x = window.matchMedia("(max-width: 400px)");

              query(x);

              x.addEventListener("change", function(){
                     query(x);
              }); var x = window.matchMedia("(max-width: 400px)");

              query(x);

              x.addEventListener("change", function(){
                     query(x);
              });

              // $(function(){
              //        $("#td3").hover(function(){
              //               $(this).css("width","400px");
              //               $(this).css("height","400px");
              //        });
              // });
       </script>
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
                     }
              </style>
              <div class="gl1"> 
                    <a href="sale.php" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="top: 30px; left: 50px;">
                     <a href="photos.php" type="button">
                     <button type="button" class="btn btn-primary">< Back</button>
                     </a>  
              </div>
              
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 camera1" style="top:100px">
                     
                     <div class="panel panel-primary">
                              <div class="panel-heading">
                                          <h3 class="panel-title">Panel title</h3>
                              </div>
                              <div class="panel-body">

                                 <form action="../savepages/camerasave.php" method="POST" role="form" enctype="multipart/form-data">
                                          
                                          <div class="form-group">
                                                 <input type="text" class="form-control"  id="txttrno" name="txttrno" placeholder="trno" value="<?php echo $trno; ?>" autocomplete="off" required readonly>
                                          </div>

                                          <div class="form-group">

                                          <?php
                                                 $sql="select * from tblsale where trno='$trno'";
                                                 $res=mysqli_query($link,$sql);
                                                 if(mysqli_num_rows($res)>0)
                                                 {
                                                        while($row=mysqli_fetch_array($res))
                                                        {
                                                               $billno=$row[1];
                                                               $customer=$row[3];
                                                               $paidamt=$row[6];
                                                        }
                                                 }
                                          ?>
                                                 <input type="text" class="form-control"  id="txtbillno" name="txtbillno" placeholder="billno" value="<?php echo $billno; ?>" autocomplete="off" required readonly>
                                          </div>

                                          <div class="form-group">
                                          <?php
                                                  date_default_timezone_set('UTC');
                                                  $today=date("j/m/Y");
                                          ?>    
                                                 <input type="text" class="form-control"  id="txtadate" name="txtadate"  value="<?php echo $today; ?>"  autocomplete="off" required readonly>
                                          </div>

                                          <div class="form-group">
                                                 <input type="text" class="form-control"  id="txtcustomer" name="txtcustomer"  value="<?php echo $customer; ?>"  autocomplete="off" required readonly>
                                          </div>

                                          <div class="form-group">
                                                 <input type="text" class="form-control"  id="txtsalesman" name="txtsalesman"  value="<?php echo $paidamt; ?>"  autocomplete="off" required readonly>
                                          </div>

                                          <div class="form-group">
                                                 <input type="file" class="form-control"  id="txtphoto" name="txtphoto"  autocomplete="off" required >
                                          </div>


                                          <!-- <div  id="camera">

                                          </div> 
                                           <script>
                                                 Webcam.set({
                                                        width:300,
                                                        height: 250,
                                                        image_format: 'jpg',
                                                        jpg_quality: 00
                                                 })

                                                 Webcam.attach("#camera")

                                                 function takesnap(){
                                                        Webcam.snap(function(data_uri){
                                                               $(".imagetag").val(data_uri)
                                                               document.getElementById("result").innerHTML='<img src="' + data_uri + '"/>';
                                                        })
                                                 }
                                          </script> -->

                                          <!-- <div class="form-group">
                                                 <input type="button" class="form-control btn btn-success"  value="take Snap" onclick="takesnap()" id="" placeholder="Input field">
                                          </div> -->
                                          
                                          <!-- <div class="form-group">
                                                 <input type="hidden" class="form-control imagetag" name="image" id="" placeholder="Input field">
                                          </div> -->

                                          <button type="submit" name="savephoto" class="btn btn-primary btn-block">Submit</button>
                                                                                           
                                   </form> 
                              </div>         
                     </div>
              </div>   

           <!-- for mobile use code -->

           <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 camera4" style="margin: 10px 0px">
                     
                     <div class="panel panel-primary">
                              <div class="panel-heading">
                                          <h3 class="panel-title">Panel title</h3>
                              </div>
                              <div class="panel-body">
                                         
                                <form action="../savepages/mobilecamerasave.php" method="POST" role="form" enctype="multipart/form-data">

                                         <div class="form-group">
                                                 <input type="text" class="form-control"  id="txtbillno" name="txtbillno" placeholder="billno" autocomplete="off" required>
                                          </div>

                                          <div class="form-group">
                                                 <input type="text" class="form-control"  id="txtstaffname" name="txtstaffname" value="  autocomplete="off" required readonly>
                                          </div>
                                          
                                          <div class="form-group">
                                                 <input type="file" class="form-control"  id="txtfile" name="txtfile"   required>
                                          </div>
                                       
                                         
                                          <button type="submit" name="savefile" class="btn btn-primary">Submit</button>
                                         </form>
                                         
                              </div>
                     </div>
                     
          </div> -->
     

              
              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 camera3" id="result">
                     
              </div>  
            
     </body>
</html>
