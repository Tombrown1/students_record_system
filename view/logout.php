<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        session_destroy();
        unset($_SESSION['user_id']);

       header("Location: login.php");
    }else{
        header("Location: login.php");
    }


// public function logout(){
//            session_destroy();
//            unset($_SESSION['user']);
//            return true;
//         }
?>

