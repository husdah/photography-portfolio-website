<?php

include("../config/dbcon.php");

function redirect($url, $message){
    $_SESSION['message']= $message;
    header('Location: ' .$url);
    exit();
}

function getAll($table){
    global $con;
    $query= "SELECT * FROM $table";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getByID($table,$id){
    global $con;
    $query= "SELECT * FROM $table WHERE id='$id';";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getAllProjects($type){
    global $con;
    $query= "SELECT * FROM projects WHERE type='$type'";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getAllCategories(){
    global $con;
    $query= "SELECT * FROM categories ORDER BY name";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getProjectsByCategory($catId,$type){
    global $con;
    $query= "SELECT * FROM projects WHERE category_id='$catId' AND type='$type' ORDER BY orderInCategory DESC";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

?>