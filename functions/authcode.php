<?php

session_start();
include('../config/dbcon.php');
include("myfunctions.php");

if(isset($_POST['login_btn'])){
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $login_query= "SELECT * FROM admins WHERE email='$email' AND password='$password';";
    $login_query_run= mysqli_query($con,$login_query);

    if(mysqli_num_rows($login_query_run) >0){

        $_SESSION['auth']=true;

        $userdata= mysqli_fetch_array( $login_query_run);
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $userid = $userdata['id'];
        $role_as= $userdata['role_as'];

        $_SESSION['auth_user']=[
            'user_id' =>  $userid,
            'name' => $username,
            'email' => $useremail
        ];

        $_SESSION['role_as']= $role_as;

        if($role_as ==1){
            redirect('../admin/index.php',"Welcome to Dashboard");
        }else{
            redirect('../index.php',"Loged In Successfully");
        }

    }else{
        redirect('../login.php',"Invalid Credentials");
    }
}
?>