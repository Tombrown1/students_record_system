<?php
    function get_payment_type($mysqli){
        //global $mysqli;
        $query = "SELECT * FROM payment_type";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function get_payment_type_by_id($mysqli, $pay_type_id){
        //global $mysqli;
        $query = "SELECT * FROM payment_type WHERE pay_type_id =".$pay_type_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }
?>