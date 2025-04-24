
 <?php  
//    {
    
       // $img=$_POST['image'];
       // $folderPath="../photos/";
       // $image_parts=explode("base64,",$img);
       // $image_type_aux=explode("image/",$image_parts[0]);
       // $image_type=$image_type_aux[1]; 
       // $image_base64=base64_decode($image_parts[0]);
       // $filename=uniqid().'.jpg';
       // $file=$folderPath.$filename;
       // file_put_contents($file,$image_base64);

       // session_start();
       // require("dbcon.php");
     
              // $billno=$_POST["txtbillno"];
              // $sql="select *from tblphoto where billno='$billno'";
              // $res=mysqli_query($link,$sql);
              // if(mysqli_num_rows($res)>0)
              // {
              //        if($row=mysqli_fetch_array($res))
              //        {
              //               $path=$row[1];
              //               unlink($path);
              //        }
              //        $sql="delete from tblphoto where billno='$billno'";
              //        echo "<script>alert('Photo updated')</script>";
              //        mysqli_query($link,$sql);
              // }
              // $path="../img/".$filename;
              // $sql="insert into tblphoto values('$billno','$path')";
              // if(mysqli_query($link,$sql))
              // {
              //        echo "<script>alert('Photo Uploaded')</script>";
              //        echo "<script>open('../tranjaction/camera.php','_self')</script>";    
              // }

   
//     $img = $_POST['image'];
//     $folderPath = "../img/";
  
//     $image_parts = explode(";base64,", $img);
//     $image_type_aux = explode("image/", $image_parts[0]);
//     $image_type = $image_type_aux[1];
  
//     $image_base64 = base64_decode($image_parts[1]);
//     $fileName = uniqid() . '.jpg';
  
//     $file = $folderPath . $fileName;
//     file_put_contents($file, $image_base64);
    
   
//       $billno=$_POST["txtbillno"];
//       $staffname=$_POST["txtstaffname"];
//       $name=$_POST["txtname"];
      // $sql="select * from studphoto where id='$id' and name='$name'";
      // $res=mysqli_query($link,$sql);
      // if(mysqli_num_rows($res)>0)
      // {
      //   if($row=mysqli_fetch_array($res))
      //   {
      //     $path=$row[1];
      //     unlink($path);
      //   }
      //   $sql="delete from studphoto where id='$id'";
      //   mysqli_query($link,$sql);
      // }
  
      // $fname=$_FILES["file"] ["filename"];
      // $ftempname=$_FILES["file"] ["tmp_name"];
      // move_uploaded_file($ftempname,"../img/".$fname);
//       $staffname=$_SESSION["logid"];
//       $path="../img/".$fileName;
//       echo "<script>alert('$staffname')</script>";
//       $sql="insert into tblphoto values('$billno','$staffname','$path')";
//       if(mysqli_query($link,$sql))
//       {
//         echo "<script>alert('Record uploaded')</script>";
//         echo "<script>open('../tranjaction/camera.php','_self')</script>";
//        }
//    }
//   else if(isset($_GET["btndelete"]))
//    {
//       $billno=$_GET["billno"];
//       $sql="select *from tblphoto where billno='$billno'";
//       $res=mysqli_query($link,$sql);
//       if(mysqli_num_rows($res)>0)
//       {
//              if($row=mysqli_fetch_array($res))
//              {
//                      $path=$row[2];
//                      unlink($path);
//               }
//               $sql="delete from tblphoto where billno='$billno'";
//               mysqli_query($link,$sql);
//               echo "<script>alert('Recrod is Deleted')</script>";
//               echo "<script>open('../tranjaction/camera.php','_self')</script>";      
//        }
// }
// 
?>
<?php
 session_start();
 require("../dbcon.php");
 if(isset($_POST["savephoto"]))
 {
       $trno=$_POST['txttrno'];
       $billno=$_POST['txtbillno'];
       $adate=$_POST['txtadate'];
       $customer=$_POST['txtcustomer'];
       $saleman=$_POST['txtsalesman'];  
       $fname=$_FILES["txtphoto"]["name"];
       $ftempname=$_FILES["txtphoto"]["tmp_name"];
       move_uploaded_file($ftempname,"../img/".$fname);
       $path="../img/".$fname;
       $sql="insert into tblphoto values('$trno','$billno','$adate','$customer','$saleman','$path')";
       if(mysqli_query($link,$sql))
       {
              echo "<script>alert('Photo Uploaded')</script>";
              echo "<script>open('../tranjaction/photos.php','_self')</script>";    
       }
 }
 else if(isset($_GET["btndelete"]))
 {
    $trno=$_GET["trno"];
    $sql="select *from tblphoto where trno='$trno'";
    $res=mysqli_query($link,$sql);
    if(mysqli_num_rows($res)>0)
    {
           if($row=mysqli_fetch_array($res))
           {
                   $path=$row["path"];
                   unlink($path);
            }
            $sql="delete from tblphoto where trno='$trno'";
            mysqli_query($link,$sql);
            echo "<script>alert('Recrod is Deleted')</script>";
            echo "<script>open('../tranjaction/photos.php','_self')</script>";      
     }
}
?>