<?php
       session_start();
       require("dbcon.php");
       if(isset($_POST["savefile"]))
       {
              // $billno=$_SESSION["id"];
              // $sql="select *from studphoto where id='$id'";
              // $res=mysqli_query($link,$sql);
              // if(mysqli_num_rows($res)>0)
              // {
              //        if($row=mysqli_fetch_array($res))
              //        {
              //               $path=$row[1];
              //               unlink($path);
              //        }
              //        $sql="delete from studphoto where id='$id'";
              //        mysqli_query($link,$sql);
              // }

              $billno=$_POST["txtbillno"];
              $staffname=$_POST["txtstaffname"];
              $fname=$_FILES["txtfile"]["name"];
              $ftempname=$_FILES["txtfile"]["tmp_name"];
              move_uploaded_file($ftempname,"../img/".$fname);
              $path="../img/".$fname;
              $sql="insert into tblphoto values('$billno','$staffname','$path')";
              if(mysqli_query($link,$sql))
              {
                     echo "<script>alert('Photo Uploaded')</script>";
                     echo "<script>open('../tranjaction/camera.php','_self')</script>";    
           }
}
?>
