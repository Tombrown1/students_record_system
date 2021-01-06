<?php

    function insert_student($mysqli, $std_name, $std_email, $std_phone,$course_id,$gender_id,$sponsor_id, $duration_id, $payment_id, $pay_type_id, $filename){
         //global $mysqli;
        $query = "INSERT INTO student(std_name, std_email, std_phone, course_id, gender_id, sponsor_id, duration_id, payment_id, pay_type_id, image)
                        VALUES('$std_name', '$std_email', '$std_phone','$course_id', '$gender_id', '$sponsor_id', '$duration_id', '$payment_id', '$pay_type_id', '$filename')";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

        header("Location: home.php");
    }

    function get_all_student($mysqli){
        //global $mysqli;  
       $query = "SELECT * FROM student ORDER BY std_id DESC";
       $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
       return $result;
    }

    function get_student_by_id($mysqli, $std_id){
        //global $mysqli;
        $query = "SELECT * FROM student WHERE std_id =". $std_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));        
        return $result;
    }

    function update_student_by_id($mysqli, $std_id, $std_name, $std_email, $std_phone,$course_id, $gender_id, $sponsor_id, $duration_id, $payment_id, $pay_type_id, $filename){
       // global $mysqli;
        $query = "UPDATE student SET std_name ='".$std_name."', std_email ='".$std_email."', std_phone ='". $std_phone."', course_id ='".$course_id."', gender_id ='".$gender_id."', sponsor_id ='". $sponsor_id."', duration_id ='".$duration_id."', payment_id ='".$payment_id."', pay_type_id ='".$pay_type_id."', image='".$filename."' WHERE std_id=".$std_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

            header("Location: student_profile.php?view=1&std_id=".$std_id);
                 
    }

    function delete_student_by_id($mysqli, $std_id){
        $query = "DELETE FROM student WHERE std_id =". $std_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return true;
    }
?>