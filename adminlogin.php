<?php
       require("dbcon.php");
       session_start();
       if(isset($_SESSION["name"]))
       {
              echo"<script>open('savepages/saveadminlogin.php','_self')</script>";
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
              <!-- jQuery -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <!-- Bootstrap JavaScript -->
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
              <link rel="styles heet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
              <style>
                     .login{
                            margin: 0px 0px;
                            padding: 0px 0px;
                            border: 15px solid rgb(144, 225, 225);
                            border-bottom-color: #32de84;
                            border-right-color: #32de84;
                     }
                     .login1{
                            background: linear-gradient(to bottom, rgb(144, 225, 225), #32de84);
                            height: 580px;
                     }
                     .login1 img{
                            
                            height: 50%;
                     }
                     
                     .login11 h1{
                            font-family: Luminari;
                     }
                     .login11 a{
                            background-color: teal;
                            border: 0px solid transparent;
                            color: white;
                            border-radius: 0px;
                            padding: 10px 30px;
                            margin: 20px -10px;
                     }
                     .login21{
                            top: 150px;
                            left: 260px;
                     }
                     .login21 h3{
                            text-align: center;
                            padding: 20px 0px;
                     }
                     .login21 button{
                            background-color: rgb(144, 225, 225);
                            border: 0px solid transparent;
                            color: white;
                            border-radius: 0px;
                            padding: 10px 30px;
                            margin: 10px 110px;
                     }
                     @media only screen and (max-width: 400px)
                     {
                            .login1{
                            background: none;
                            height: 445px;
                            } 
                             
                            .login21{
                            top: -230px;
                            left: 0px;
                            }
                            .login21 button{
                            padding: 10px 30px;
                            margin: 10px 95px;
                            }
                           
                             .login11{
                                   display:none;
                             }
                     }
              </style>
            
       </head>
       <body>  
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 login">
                   
                   <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 login1">
                       <img src="images/krishna1 copy.png" alt="">
                   </div>

                   
                   <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 login2">
                     <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 login21">

                     <form action="savepages/saveadminlogin.php" method="POST" role="form">
                            
                            <h3><b>Login</b></h3>
                            <div class="form-group">
                                   <input type="text" class="form-control" id="txtname" name="txtname" placeholder="Username">
                            </div>
                            
                            

                            <div class="form-group">
                                   <input type="password" class="form-control txtpass" id="txtpass" 
                                   name="txtpass" placeholder="Password">
                                   <span class="glyphicon glyphicon-eye-open eyespan" id="eyespan" style="top: -25px; left: 280px; border: 1px solid black;" ></span>
                                   
                            </div>

                            <script>
                                  $(function(){ 
                                   $(document).ready(function (){
                                          $(".eyespan").click(function(){
                                                 alert("hiii");
                                                 let pass=document.getElementById("txtpass");
                                                 let type=$("#txtpass").attr('type');

                                                 if(type=="password")
                                                 {
                                                      pass.attr("type","text");
                                                      $("#eyespan").css("color":"skyblue");  
                                                 }
                                                 else
                                                 {
                                                        pass.attr("type","password");
                                                        $("#eyespan").css("color":"black");
                                                 }
                                          });
                                   });
                            });
                            </script>
                            <button type="submit"  name="savelogin" id="savelogin" class="btn btn-primary"><b>Login</b></button>
                     </form>  
                     </div>
                     
                   </div>
                   
                     
              </div>
              
              

              <!-- jQuery -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <!-- Bootstrap JavaScript -->
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       </body>
</html>
