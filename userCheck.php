<?php
    session_start();

    
        $pwd = $_POST['pwd'];
        $namn = $_POST['fname'];
        

        if($namn=="admin" || $pwd=="pwd"){
            $_SESSION['user']='inloggad';
            header("Location: test.php");
        exit;
        }else{
            $_SESSION['user']=NULL;
            header("Location: test.php");

        }


?>