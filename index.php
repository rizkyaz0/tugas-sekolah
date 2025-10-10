<?php
    error_reporting(0);
    include "common/routing.php";
    
    if($_COOKIE['id']!="")
    {
        include("dashboard.php");
    }
    else
    {
        include("stocker.php");
    }

?>


