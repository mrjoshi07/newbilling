<?php
       session_start();
       if(!isset($_SESSION["cname"]))
       {
              echo"<script>open('../coustomerlogin.php','_self')</script>";
       }
?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<style>
       body{
              padding: 0px 0px;
              margin: 0px 0px;
              background-color: rgb(221, 216, 216);
       }
       .col1{
              text-align: center;
              padding: 10px;
              background-image: url("../images/blue background2.jpg");
              background-size: 100% 100%;
              color: white;
       }
</style>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col1">
       <h1>
       <?php            
              echo $_SESSION["cname"]; ?>
       </h1>
</div>

