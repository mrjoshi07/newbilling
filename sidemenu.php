
              <!-- jQuery -->
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <!-- Bootstrap JavaScript -->
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
             
              <style>
                     *{
                            padding: 0px 0px;
                            margin: 0px 0px;
                     }
                     div{
                            padding: 0px 0px;
                            margin: 0px 0px;
                     }
                     .sidemenu,.mangmenu,.salesmenu,.labmenu{                          
                            text-align: left;
                            display: flex;
                            padding: 3px 0px;
                            margin: 0px 0px;
                            background-color: rgb(246, 246, 246);
                            z-index: 1;
                         
                     }
                     .s2{
                            padding: 0px 0px;
                     }
                     .sidemenu a{
                            padding: 12px 15px;
                            margin: 0px;
                            text-decoration: none;
                            font-weight: bold;
                            display: flex;
                            /* justify-content:center; */
                            align-items:center;
                            color: rgb(1, 1, 87); 
                     }
                     .mangmenu a{
                            padding: 12px 15px;
                            margin: 0px;
                            text-decoration: none;
                            font-weight: bold;
                            display: flex;
                            /* justify-content:center; */
                            align-items:center;
                            color: rgb(1, 1, 87); 
                     }
                     .salesmenu a{
                            padding: 12px 15px;
                            margin: 0px;
                            text-decoration: none;
                            font-weight: bold;
                            display: flex;
                            /* justify-content:center; */
                            align-items:center;
                            color: rgb(1, 1, 87); 
                     }
                     .labmenu a{
                            padding: 12px 15px;
                            margin: 0px;
                            text-decoration: none;
                            font-weight: bold;
                            display: flex;
                            /* justify-content:center; */
                            align-items:center;
                            color: rgb(1, 1, 87); 
                     }
                     .sidemenu a:hover{
                            background-color:  rgb(221, 216, 216);;      
                     }
                     @media only screen and (max-width: 400px)
                     {
                            .s2{
                                   overflow: scroll;
                                   /* padding: 5px 8px 5px 8px; */
                            }
                           .sidemenu a{                           
                            padding: 10px 10px 10px 10px;
                          }
                          
                          .sidemenu::-webkit-scrollbar{
                            display: none;
                          }
                          .s2::-webkit-scrollbar{
                            display:none;
                          }
                    
                     }
                   

              </style>

              <script>
                     function query(x){
                              if (x.matches) 
                            {
                                   $(function(){
                                          $(".sidemenu3 , .sidemenu5").show();
                                          $(".sidemenu1").click(function(){
                                                 $(".sidemenu3 , .sidemenu5").hide(function(){
                                                        $(".sidemenu1").click(function(){
                                                               
                                                                $(".sidemenu3 , .sidemenu5").show();
                                                        
                                                         });
                                                 }); 
                                          });

                                          $(".sidemenu1 , .sidemenu5").show();
                                          $(".sidemenu3").click(function(){
                                                 $(".sidemenu1 , .sidemenu5").hide(function(){
                                                       $(".sidemenu3").click(function(){
                                                                $(".sidemenu1 , .sidemenu5").show();
                                                               
                                                         });
                                                 }); 
                                          });

                                          $(".sidemenu3 , .sidemenu1").show();
                                          $(".sidemenu5").click(function(){
                                                 $(".sidemenu3 , .sidemenu1").hide(function(){
                                                        $(".sidemenu5").click(function(){
                                                               <?php
                                                                      $user=$_SESSION["user"];
                                                                      if($user=="Staff")
                                                                      {
                                                                      ?>
                                                                             $(function(){
                                                                               $(".sidemenu1 , .sidemenu3").hide(); 
                                                                             });
                                                                      <?php
                                                                      }
                                                                      else
                                                                      {
                                                                      ?>
                                                                             $(".sidemenu3 , .sidemenu1").show();
                                                                      <?php
                                                                      }
                                                               ?>    
                                                              
                                                        
                                                         });
                                                 }); 
                                          });

                                   });

                                 
                            }
                            else
                            {
                               $(function(){
                                  
                               })
                            }
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

                            
                              
              </script>
              <?php
                     // require("dbcon.php");
                     // session_start();
                     $user=$_SESSION["user"];
                     if($user=="Manager")
                     {
                       ?>
                         <script>
                            $(function(){
                                  $(".sidemenu , .salesmenu , .labmenu").hide();  
                               
                            });
                         </script>
                       <?php
                     }
                     else if($user=="Salesman")
                     {
                     ?>
                     <script>
                            $(function(){
                                   $(".mangmenu , .sidemenu , .labmenu").hide();           
                            });
                     </script>
                     <?php  
                     }
                     else if($user=="Labour")
                     {
                     ?>
                     <script>
                            $(function(){
                                   $(".mangmenu, .salesmenu , .sidemenu , .v4 ").hide();           
                            });
                     </script>
                     <?php  
                     }
                     else if($user=="Admin")
                     {
                     ?>
                     <script>
                            $(function(){
                                   $(".mangmenu, .salesmenu , .labmenu").hide();           
                            });
                     </script>
                     <?php  
                     }
              ?>
              <script>
                      $(function () {
                            $("sidemenu1 , .sidemenu2").hide();

                            $(".sidemenu1").click(function() {
                            $(this).children(".sidemenu2").toggle().css("background-color","#ff0");
                            });

                            $("#d1").click(function(){
                                   $(".sidemenu4 , .sidemenu6").hide();
                            });
                     });

                     $(function () {
                            $("sidemenu3 , .sidemenu4").hide();

                            $(".sidemenu3").click(function() {  
                            $(this).children(".sidemenu4").toggle().css("background-color","#ff0");
                            });

                            $("#d2").click(function(){
                                   $(".sidemenu2 , .sidemenu6").hide();
                            });
                     });

                     $(function () {
                            $("sidemenu5 , .sidemenu6").hide();

                            $(".sidemenu5").click(function() {
                            $(this).children(".sidemenu6").toggle().css("background-color","#ff0");
                            });

                            $("#d3").click(function(){
                                   $(".sidemenu2 , .sidemenu4").hide();
                            });
                     });
                   
              </script> 
              
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sidemenu" > 
                      <div class="sidemenu3 sidemenu s2 menu2">
                          
                          <a id="d2">
                                 <span>ACCOUNT</span>
                          </a>
                 
                          <a href="../master/usertype.php" class=" sidemenu4 v1"> 
                                <span>Usertype</span>
                          </a>
                   
                          <a href="../customer/customer.php" class=" sidemenu4 v2">
                                     <span>Coustomer</span>
                          </a>
              
                          <a href="../customer/staff.php" class="s3 sidemenu4 v3"> 
                                    <span>Staff</span>
                          </a>
               
                     </div>

                     <div class="sidemenu5 sidemenu s2 menu3">
                          
                            <a id="d3">
                                   <span>TRANSACTION</span>
                            </a>
                 
                            <a href="../tranjaction/sale.php"  class="sidemenu6 v4"> 
                                          <span>Sale</span>
                            </a>
                  
                            <a href="../tranjaction/reciept.php" class="sidemenu6 v5">
                                     <span>Reciept</span>
                            </a>
                   
                            <a href="../tranjaction/report.php" class="sidemenu6 v6"> 
                                    <span>Report</span>
                            </a>

                            <a href="../tranjaction/photos.php"  class=" sidemenu6 v7"> 
                                   <span>Bill-Images</span>
                            </a>

                            <a href="../tranjaction/report address.php" class="sidemenu6 v8"> 
                                    <span>Salesman</span>
                            </a>

                            <a href="../tranjaction/status.php" id="v9" class="sidemenu6 v9"> 
                                    <span>Approval</span>
                            </a>

                     </div>
                            <a  onclick="logout()" class="logout"> 
                             <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>

                            <script>          
                            function logout(){
                                   ans=confirm("Do you want logout...")
                                   if(ans)
                                   {
                                          open("../savepages/logout.php","_self"); 
                                   }
                                   else
                                   {
                                          alert("You click cancel...");
                                   }
                                   }
                             </script>   
       </div>     
              
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mangmenu" > 

                     <div class="sidemenu5 mangmenu s2 menu3">
                          
                            <a id="d3">
                                   <span>TRANSACTION</span>
                            </a>
                 
                            <a href="../tranjaction/sale.php"  class="sidemenu6 v4"> 
                                          <span>Sale</span>0
                            </a>
                  
                            <a href="../tranjaction/report.php" class="sidemenu6 v6"> 
                                    <span>Report</span>
                            </a>

                     </div>
                            <a  onclick="logout()" class="logout"> 
                             <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>

                            <script>          
                            function logout(){
                                   ans=confirm("Do you want logout...")
                                   if(ans)
                                   {
                                          open("../savepages/logout.php","_self"); 
                                   }
                                   else
                                   {
                                          alert("You click cancel...");
                                   }
                                   }
                             </script>   
       </div> 

       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 salesmenu" > 

              <div class="sidemenu5 salesmenu s2 menu3">
              
                     <a id="d3">
                            <span>TRANSACTION</span>
                     </a>

                     <a href="../tranjaction/reciept.php" class="sidemenu6 v5">
                            <span>Reciept</span>
                     </a>

              </div>
                     <a  onclick="logout()" class="logout"> 
                     <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                     </a>

                     <script>          
                     function logout(){
                            ans=confirm("Do you want logout...")
                            if(ans)
                            {
                                   open("../savepages/logout.php","_self"); 
                            }
                            else
                            {
                                   alert("You click cancel...");
                            }
                            }
                     </script>   
              </div> 
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 labmenu" > 

<div class="sidemenu5 labmenu s2 menu4">

       <a id="d3">
              <span>TRANSACTION</span>
       </a>

       <a href="../tranjaction/photos.php"  class=" sidemenu6 v7"> 
              <span>Bill-Images</span>
       </a>

      
</div>
       <a  onclick="logout()" class="logout"> 
       <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
       </a>

       <script>          
       function logout(){
              ans=confirm("Do you want logout...")
              if(ans)
              {
                     open("../savepages/logout.php","_self"); 
              }
              else
              {
                     alert("You click cancel...");
              }
              }
       </script>   
</div> 