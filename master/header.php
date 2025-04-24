
              <!-- jQuery -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <!-- Bootstrap JavaScript -->
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
              <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
              <?php
                     require("../dbcon.php");
                     session_start();
                     if(!isset($_SESSION["name"]))
                     {
                            echo"<script>open('../adminlogin.php','_self')</script>";
                     }
                   
              ?>
              <style>
                     body{-
                            padding: 0px 0px;
                            margin: 0px 0px;
                            background-color: rgb(221, 216, 216);
                     }
                     div{
                            /* border: px solid black; */
                     }
                     .header{
                            background-image: url("../images/blue background2.jpg");
                            background-size: 100% 100%;
                            color: white;
                            padding: 20px;
                            text-align: center;
                     }
                     .header h1{
                            font-size:35px;
                            margin: 0px 0px;

                     }
                     .header h1 small{
                            color: black;
                     }
                     .colh2{
                            top: 140px;
                            left: 250px;
                            position: fixed;
                     }
                     .colh2 img{
                            width: auto;
                     }
                     @media only screen and (max-width: 400px)
                     {
                            .header{
                            padding: 15px;
                            }  
                            .header h1{
                            font-size:25px;
                            margin: 0px 0px;
                            }
                            .colh2 img{
                                   display: none;
                            }
                     }
              </style>
       
      
             
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 header">    
                     <h1><?php echo $_SESSION["name"]; ?>|<small><?php echo $_SESSION["user"]; ?></small></h1>
             </div>
             <?php
                     include("../sidemenu.php");
             ?>
             
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 colh2">
                       <img src="../images/krishna1 copy.png" alt="">
             </div>
             
               