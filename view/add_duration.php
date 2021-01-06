<?php
        include_once '../connection/database_conn.php';
        $mysqli = connect_db();

        session_start();

        if(!isset($_SESSION['user_id'])){
            header("Location: login.php");
            exit();
        }

        include_once '../includes/students.php';

        if(isset($_POST['submit'])){
            $duration = $_POST['duration_name'];
            
            insert_duration($mysqli, $duration);
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Duration</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
</head>
<body>
         
    <?php
        include_once '../navbars/menu.php'; 
    ?>      
          <main class="container">
            <div class="welcome text-center py-5 px-3"> <br>
            <h4 align="center">Add duration</h4> <br>           
            </div>             
        </main> 

        <div class="container">
            <div class="col-md-6">
                
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
                <label for="duration_name">Add Duration</label>
                <input type="text" name="duration_name" class="form-control" placeholder="Enter Duration">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Add Duration</button>
            </form>
            </div>
            <div class="col-md-6"></div>
        </div>
        <br>

        <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>