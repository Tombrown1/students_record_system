<?php
    

    function insert_attendance($mysqli,$course_name, $student_id, $admin_id, $arrival_time){
        $query = "INSERT INTO attendance(course_name,student_id,admin_id,arrival_time)
                VALUES('$course_name', '$student_id', '$admin_id', '$arrival_time')";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    }

    function get_attendance($mysqli){
        $query = "SELECT * FROM attendance";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function get_attendance_by_id($mysqli, $attend_id){
        $query = "SELECT * FROM attendance WHERE attend_id = $attend_id";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function update_attendance($mysqli, $course_name, $student_id, $admin_id, $arrival_time,$attend_id){
        $query = "UPDATE attendance SET course_name = '$course_name', student_id = '$student_id', 
                  admin_id = '$admin_id', arrival_time = '$arrival_time' WHERE attend_id = $attend_id";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result

    }

    function delete_attendance($mysqli, $attend_id){
        $query = "DELETE FROM attendance WHERE attend_id = $attend_id";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return true;
    }
?>

