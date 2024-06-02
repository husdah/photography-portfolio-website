<?php

include("config/dbcon.php");

function getAllCategories(){
    global $con;
    $query= "SELECT * FROM categories ORDER BY name";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getHomeCategories(){
    global $con;
    $query= "SELECT * FROM categories WHERE displayInHomePage='1' ";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getHomeProjects(){
    global $con;
    $query= "SELECT * FROM projects WHERE displayInHomePage='1' ";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getProjectsByCategory($catId){
    global $con;
    $query= "SELECT * FROM projects WHERE category_id='$catId' ORDER BY orderInCategory DESC";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getCatNameById($catId){
    global $con;
    $query= "SELECT c.name FROM categories c WHERE id='$catId' LIMIT 1";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function redirect($url, $message){
    $_SESSION['message']= $message;
    header('Location: ' .$url);
    exit();
}
?>