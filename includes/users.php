<?php

    function insert_users($mysqli, $name, $email, $password){
        $query = "INSERT INTO users(name, email, password) VALUES('".$name."', '".$email."', '".md5($password)."')";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

        header('Location: login.php');
    }

    function get_users($mysqli){
        $query = "SELECT * FROM users()";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function get_users_by_id($mysqli, $id){
        $query = "SELECT * FROM users WHERE id=".$id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function login($mysqli, $email, $password){
        $query = "SELECT * FROM users WHERE email='".$email."' and password='".md5($password)."'";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function check_email_ID($mysqli, $email){
        $query = "SELECT * FROM users WHERE email = '".$email."'";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }
?>