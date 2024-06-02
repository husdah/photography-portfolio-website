<?php
    $server='localhost';
    $user='root';
    $pass='#Daher@123#123@blizboy@123#';
    $mydb='alaadaherdb';

    $con=mysqli_connect($server, $user, $pass, $mydb);

    if(!$con){
        die("Connection failed:" .mysqli_connect_error());
    }
?>