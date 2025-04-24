<?php
    session_start();
    session_destroy();
    echo "<script>open('../coustomerlogin.php','_self')</script>";

?>