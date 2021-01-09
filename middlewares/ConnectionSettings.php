<?php
    //$conn = mysqli_connect("localhost", "root", "", "juegopenales");
    $conn = mysqli_connect("remotemysql.com", "ZBftP9nRXd", "iVyRD57gMX", "ZBftP9nRXd");

    if(isset($_COOKIE["login"])){
        $login = $_COOKIE["login"];
    }else{
        $login = 0;
    }

    if(isset($_COOKIE["isadmin"])){
        $isadmin = $_COOKIE["isadmin"]; 
    }else{
        $isadmin = 0;
    }
?>

