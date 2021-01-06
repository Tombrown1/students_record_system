<?php    

    function get_gender($mysqli){
        $query = "SELECT * FROM gender";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function get_gender_by_id($mysqli, $gender_id){
        $query = "SELECT * FROM gender WHERE gender_id ='$gender_id'";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result; 
    }
    
?>