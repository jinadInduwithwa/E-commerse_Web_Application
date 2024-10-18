<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('Exited successfully');</script>";
echo "<script>window.open('../User.Loging.php','_self')</script>";
        
exit();
