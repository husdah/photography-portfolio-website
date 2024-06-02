<?php

include("../functions/myfunctions.php");

if(isset($_SESSION['auth']))
{
    if($_SESSION['role_as'] !=1){
        redirect('../index.php',"You Are Not Authorized To Access This Page!");
    }

}else{
    redirect('../login.php',"Login to continue");
}

?>