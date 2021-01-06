<?php    

    function insert_admin($mysqli, $admin_name, $admin_email, $admin_phone, $gender_id, $created_at){
        //global $mysqli;
        $query = "INSERT INTO admin(admin_name,admin_email,admin_phone,gender_id, created_at )
                VALUES('$admin_name', '$admin_email', '$admin_phone', '$gender_id', '$created_at')";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
        if($result){
            header("location: add_admin.php");
        }
    }

    function get_all_admin($mysqli){
       // global $mysqli;
        $query = "SELECT * FROM admin";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function get_admin_by_id($mysqli, $admin_id){
       // global $mysqli;
        $query = "SELECT * FROM admin WHERE admin_id = $admin_id";
        $result = mysqli_query($mysqli, $query);
    }

    function update_admin($mysqli, $admin_id){
        //global $mysqli;
        $query = "UPDATE users set user_name = $user_name WHERE admin_id = $admin_id";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function delete_admin($mysqli,$admin_id){
        //global $mysqli;
        $query = "DELETE FROM users WHERE admin_id = $admin_id";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    }
?>


