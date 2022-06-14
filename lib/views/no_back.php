<?php 
    include_once("../functions/function.php");

    if(empty($_SESSION['loginSession'])){
        header('location:../auth/login.php');
    }

?>