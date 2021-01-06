    <?php
         include_once '../connection/database_conn.php';
        $mysqli = connect_db();

        session_start();

        if(!isset($_SESSION['user_id'])){
                header("Location: login.php");
                exit();
            }
        
        include_once '../includes/students.php';
        include_once '../includes/courses.php';
        include_once '../includes/duration.php';

        if(isset($_POST['submit'])){
            $course_name = $_POST['course_name'];
            $std_id = $_POST['std_id'];
            $duration_id = $_POST['duration_id'];
            
            insert_course($mysqli, $course_name, $std_id, $duration_id);
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
</head>
<body>

    <?php
        include_once '../navbars/menu.php'; 
    ?>      
          <main class="container">
            <div class="welcome text-center py-5 px-3"> <br>
            <h4 align="center">Add Course</h4> <br>           
            </div>             
        </main> 

        <div class="container">
            <div class="col-md-6">
                <?php
                    if(isset($_GET['update'])){
                        $course_id = $_GET['course_id'];
                        $result = get_course_by_id($mysqli, $course_id);
                        $rows = mysqli_fetch_assoc($result);
                    ?>
                      <!-- Update Form begins -->
                      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" name="course_name" class="form-control" value="<?php echo $rows['course_name'] ?>">
            </div>
            <div class="form-group">
                <label for="std_id">Student</label>
                <select class="form-control" name="std_id">
                    <option value="">select student</option>
                    <?php
                        $student = get_all_student($mysqli);
                        if(mysqli_num_rows($student)){
                            while($rows = mysqli_fetch_assoc($student)){
                                $std_id = $rows['std_id'];
                                $std_name = $rows['std_name'];
                    ?>
                        <option value="<?php echo $std_id; ?>"><?php echo $std_name; ?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="duration_id">Course Duration</label>                   
                <select class="form-control" name="duration_id">
                            <option value="">duration</option>
                    <?php
                        $duration = get_duration($mysqli);
                        if(mysqli_num_rows($duration)){
                            while($rows = mysqli_fetch_assoc($duration)){
                                $duration_id = $rows['duration_id'];
                                $duration_name= $rows['duration_name'];
                        ?>
                            <option value="<?php echo $duration_id ?>"><?php echo $duration_name ?></option>
                        <?php
                            }
                        }
                    ?>
                </select>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Add Course</button>
            </form>  
                    <?php
                    }else{
                     ?>
                      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" name="course_name" class="form-control" placeholder="Enter Course">
            </div>
            <div class="form-group">
                <label for="std_id">Student</label>
                <select class="form-control" name="std_id">
                    <option value="">select student</option>
                    <?php
                        $student = get_all_student($mysqli);
                        if(mysqli_num_rows($student)){
                            while($rows = mysqli_fetch_assoc($student)){
                                $std_id = $rows['std_id'];
                                $std_name = $rows['std_name'];
                    ?>
                        <option value="<?php echo $std_id; ?>"><?php echo $std_name; ?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="duration_id">Course Duration</label>                   
                <select class="form-control" name="duration_id">
                            <option value="">duration</option>
                    <?php
                        $duration = get_duration($mysqli);
                        if(mysqli_num_rows($duration)){
                            while($rows = mysqli_fetch_assoc($duration)){
                                $duration_id = $rows['duration_id'];
                                $duration_name= $rows['duration_name'];
                        ?>
                            <option value="<?php echo $duration_id ?>"><?php echo $duration_name ?></option>
                        <?php
                            }
                        }
                    ?>
                </select>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Add Course</button>
            </form>
                <?php
                    }
                ?>                
          
            </div>
            <div class="col-md-6"></div>
        </div>
        <br>

            <div class="container">
                <div class="col-lg-6">
                <table class="table table-stripe">
                <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Course Title</th>
                            <th>Student</th>
                            <th>Course duration</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $courses = get_all_course($mysqli);
                            if(mysqli_num_rows($courses) > 0){
                                while($rows = mysqli_fetch_assoc($courses)){
                            ?>
                                <tr>
                                    <td><?php echo $rows['course_id'];?></td>
                                    <td><?php echo $rows['course_name'];?></td>
                                    <td><?php
                                     $student = get_student_by_id($mysqli, $std_id = $rows['std_id']);
                                        while($row = mysqli_fetch_assoc($student)){
                                            $std_id = $row['std_id'];
                                            $student_name = $row['std_name'];
                                        }
                                        echo $student_name;
                                    ?></td>
                                    <td>
                                    <?php                     
                                        $result=get_duration_by_id($mysqli, $duraion_id = $rows['duration_id']);
                                            while($row = mysqli_fetch_assoc($result)){
                                                $duration_id = $row['duration_id'];
                                                $duration_name = $row['duration_name'];
                                            }    
                                            echo $duration_name;               
                                        ?> 
                                    </td>
                                    <td><a href="add_course.php?update=1&course_id=<?php echo $rows['course_id'] ?>" class="btn btn-info">Edit</a></td>
                                    <td><a href="#" class="btn btn-danger">Delete</a></td>
                                </tr>
                           <?php 
                        }
                        }
                        ?>
                            
                        
                    </tbody>
                </table>

                </div>
            </div>

            <?php
    include_once '../navbars/footer.php';
    ?>