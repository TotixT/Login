<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    if(isset($_POST['registrarse'])){
        require_once("RegistroUser.php");
        $RegistroUser = new RegistroUser();
        $RegistroUser-> setIdCamper(13);
        $RegistroUser-> setEmail($_POST['email']);
        $RegistroUser-> setusername($_POST['username']);
        $RegistroUser-> setpassword($_POST['password']);
        if($RegistroUser->checkUser($_POST['email'])){
            echo "<script> alert('Usuario existente!'); document.location='loginRegister.php' </script>";
        } else{
            $RegistroUser->insertData();
            echo "<script> alert('User creado Satisfactoriamente Satisfactoriamente'); document.location='../Home/home.php' </script>";
        }

    }
?>
