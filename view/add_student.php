<?php 
    
    include_once '../connection/database_conn.php';
    $mysqli = connect_db();

    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
        exit();
    }
    $student_rows = 0;
    //$user_id = $_SESSION['user_id'];

    include_once '../includes/students.php';
    include_once '../includes/courses.php';
    include_once '../includes/courses.php';
    include_once '../includes/gender.php';
    include_once '../includes/sponsor.php';
    include_once '../includes/duration.php';
    include_once '../includes/payment.php';
    include_once '../includes/payment_type.php';

    if(isset($_POST['submit'])){
        $std_id       = $_POST['std_id'];
        $std_name     = $_POST['std_name'];
        $std_email    = $_POST['std_email'];
        $std_phone    = $_POST['std_phone'];
        $course_id    = $_POST['course_id'];        
        $gender_id    = $_POST['gender_id'];
        $sponsor_id   = $_POST['sponsor_id'];
        $duration_id  = $_POST['duration_id'];
        $payment_id   = $_POST['payment_id'];
        $pay_type_id  = $_POST['pay_type_id'];
        $filename     = $_FILES['image'];
        // print_r($filename);
        // exit;
        if(isset($_FILES['image']))
        $filename = $_FILES['image']['name'];
        $filetemp = $_FILES['image']['tmp_name'];
        $filesize = $_FILES['image']['size'];
        $fileError = $_FILES['image']['error'];
        $filetype = $_FILES['image']['type'];

        $fileExt   = explode(".", $filename);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpeg', 'jpg', 'png', 'pdf');
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($filesize < 1000000){
                    $fileNewname = "Profile".$std_id. "_" .  rand(0, 9999999999). ".". $fileActualExt;
                    $filedestination = "images/". $fileNewname;
                    move_uploaded_file($filetemp, $filedestination);
                }else{
                    echo "Your file is too large";
                }
            }else{
                echo "there was an error uploading your file";
            }
        }else{
            echo "You cannot upload this file type";
        }

        // check if file has one of the following extensions
        //$allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');

        insert_student($mysqli, $std_name, $std_email, $std_phone,$course_id,$gender_id,$sponsor_id, $duration_id, $payment_id, $pay_type_id, $filename);

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <?php
        include_once '../navbars/menu.php'; 
    ?>      
          <main class="container">
            <div class="welcome text-center py-5 px-3"> <br>
            <h4 align="center">Add New Student</h4> <br>           
            </div>             
        </main>   
    
        <div class="container">
            <div class="col-md-6">
                <?php
                    if(isset($_GET['update'])){
                        $std_id = $_GET['std_id'];
                        $result = get_student_by_id($mysqli, $std_id);
                        $student_rows = mysqli_fetch_assoc($result);
                    ?>
                        <!-- update Form -->
                        <form action="edit_student.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="std_id" class="form-control" value="<?php echo $student_rows['std_id'] ?>">
            </div>
            <div class="form-group">
                <label for="std_name">Student Name</label>
                <input type="text" name="std_name" class="form-control" value="<?php echo $student_rows['std_name'] ?>">
            </div>
            <div class="form-group">
                <label for="std_email">Student Email</label>
                <input type="email" name="std_email" class="form-control" value="<?php echo $student_rows['std_email'] ?>">
            </div>
            <div class="form-group">
                <label for="std_phone">Student phone</label>
                <input type="text" name="std_phone" class="form-control" value="<?php echo $student_rows['std_phone'] ?>">
            </div>
            <div class="form-group">
                <label for="course_id">Course</label>
                <select class="form-control" name="course_id" value="<?php //echo $rows['course_id'];?>">
                <option value=""><?php
                    $result = get_course_by_id($mysqli, $course_id = $student_rows['course_id']);
                        if($row = mysqli_fetch_assoc($result)){}
                    ?> <?php echo $row['course_name']; ?> </option>
                    <?php
                           $result  = get_all_course($mysqli);
                            if(mysqli_num_rows($result)){
                                while($rows = mysqli_fetch_assoc($result)){
                                    $course_id = $rows['course_id'];
                                    $course_name = $rows['course_name'];                              
                    ?>
                           <option value="<?php echo $course_id ?>"><?php echo $course_name ?></option>

                    <?php 
                    }
                }  
                ?>
                </select>
            
            <div class="form-group">
                <label for="gender_id">Gender</label>
                <select class="form-control" name="gender_id">
                <option value="<?php echo $gender_id; ?>"> <?php $result = get_gender_by_id($mysqli, $gender_id = $student_rows['gender_id']);
                    if($row = mysqli_fetch_assoc($result)){
                        $gender_id = $row['gender_id'];
                        $gender_name = $row['gender_name'];
                    }?> <?php echo $row['gender_name']; ?>
                    </option>
                    <?php                    
                    $gender = get_gender($mysqli);                        
                    if(mysqli_num_rows($gender)){                            
                        while($rows = mysqli_fetch_assoc($gender)){
                            $gender_id = $rows['gender_id'];
                            $gender_name = $rows['gender_name'];                            
                    ?>
                   <option value="<?php echo $gender_id ?>"><?php echo $gender_name ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="sponsor_id">Sponsor</label>
                <!-- <input type="text" name="sponsor_id" class="form-control"> -->
                <select class="form-control" name="sponsor_id">
                    <option value=""><?php $result = get_sponsor_by_id($mysqli, $sponsor_id = $student_rows['sponsor_id']);
                        if($rows = mysqli_fetch_assoc($result)){
                            // $spon_id = $rows['sponsor_id'];
                            // $spon_name = $rows['sponsor_name'];
                        }
                    ?> <?php echo $rows['sponsor_name']; ?> </option>

                        <?php
                        $sponsor = get_all_sponsor($mysqli);
                        if(mysqli_num_rows($sponsor)){
                            while($rows = mysqli_fetch_assoc($sponsor)){
                                $sponsor_id = $rows['sponsor_id'];
                                $sponsor_name = $rows['sponsor_name'];
                        ?>
                        <option value="<?php echo $sponsor_id ?> "><?php echo $sponsor_name ?></option>
                        <?php
                            }
                        }
                        ?>
                </select> 
            </div>
            <div class="form-group">
                <label for="duration_id">Course Duration</label>                   
                <select class="form-control" name="duration_id">
                            <option value=""><?php 
                                $result = get_duration_by_id($mysqli, $duration_id = $student_rows['duration_id']);
                                    $row = mysqli_fetch_assoc($result);
                            ?> <?php echo $row['duration_name']; ?> </option>
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
            <div class="form-group">
                <label for="payment_id">Amount Paid</label>
                <select class="form-control" name="payment_id">
                <option value=""><?php 
                                $result = get_payment_by_id($mysqli, $payment_id = $student_rows['payment_id']);
                                   $row = mysqli_fetch_assoc($result);
                            ?> <?php echo $row['amount']; ?> </option>
                    <?php
                        $amount_payed = get_all_payment($mysqli);
                        if(mysqli_num_rows($amount_payed)){
                            while($rows = mysqli_fetch_assoc($amount_payed)){
                                $payment_id = $rows['payment_id'];
                                $amount= $rows['amount'];
                        ?>
                            <option value="<?php echo $payment_id ?>"><?php echo $amount ?></option>
                        <?php
                            }
                        }
                    ?>
                </select>
            </div>   
            <div class="form-group">
                <label for="pay_type_id">Payment Method</label>
                <select class="form-control" name="pay_type_id">
                <option value=""><?php 
                                $result = get_payment_type_by_id($mysqli, $pay_type_id = $student_rows['pay_type_id']);
                                    $row = mysqli_fetch_assoc($result);
                            ?> <?php echo $row['payment_type']; ?> </option>
                    <?php
                        $pay_type = get_payment_type($mysqli);
                        if(mysqli_num_rows($pay_type)){
                            while($rows = mysqli_fetch_assoc($pay_type)){
                                $pay_type_id = $rows['pay_type_id'];
                                $payment_type= $rows['payment_type'];
                        ?>
                            <option value="<?php echo $pay_type_id ?>"><?php echo $payment_type ?></option>
                        <?php
                            }
                        }
                    ?>
                </select>
            </div>
                
            <div class="form-group">
                <label for="image">Upload Passport</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" name="update" class="btn btn-primary">Submit</button>
            </form>

                    <!-- Add New Student Form begins here ! -->
               <?php
                 }else{
                ?>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="std_name">Student Name</label>
                <input type="text" name="std_name" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="std_email">Student Email</label>
                <input type="email" name="std_email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label for="std_phone">Student phone</label>
                <input type="text" name="std_phone" class="form-control" placeholder="Enter Phone No">
            </div>
            <div class="form-group">
                <label for="course_id">Course</label>
                <!-- <input type="text" name="course_id" class="form-control" placeholder="Enter course"> -->
                <select class="form-control" name="course_id">
                    <option value="">choose course</option>
                    <?php
                           $result  = get_all_course($mysqli);
                            if(mysqli_num_rows($result)){
                                while($rows = mysqli_fetch_assoc($result)){
                                    $course_id = $rows['course_id'];
                                    $course_name = $rows['course_name'];                              
                    ?>
                           <option value="<?php echo $course_id ?>"><?php echo $course_name ?></option>
                    <?php 
                    }
                }  
                ?>
                </select>
            
            <div class="form-group">
                <label for="gender_id">Gender</label>
                <!-- <input type="text" name="gender_id" class="form-control" placeholder="Enter Gender"> -->
                <select class="form-control" name="gender_id">
                    <option value="">Select Gender</option>
                    <?php
                        $gender = get_gender($mysqli);
                        if(mysqli_num_rows($gender)){
                            while($rows = mysqli_fetch_assoc($gender)){
                                $gender_id = $rows['gender_id'];
                                $gender_name = $rows['gender_name'];
                        ?>
                        <option value="<?php echo $gender_id; ?>"><?php echo $gender_name; ?></option>
                        <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="sponsor_id">Sponsor</label>
                <!-- <input type="text" name="sponsor_id" class="form-control"> -->
                <select class="form-control" name="sponsor_id">
                    <option value="">Sponsor</option>
                        <?php
                        $sponsor = get_all_sponsor($mysqli);
                        if(mysqli_num_rows($sponsor)){
                            while($rows = mysqli_fetch_assoc($sponsor)){
                                $sponsor_id = $rows['sponsor_id'];
                                $sponsor_name = $rows['sponsor_name'];
                        ?>
                        <option value="<?php echo $sponsor_id ?>"><?php echo $sponsor_name ?></option>
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
            <div class="form-group">
                <label for="payment_id">Amount Paid</label>
                <select class="form-control" name="payment_id">
                            <option value="">Amount</option>
                    <?php
                        $amount_payed = get_all_payment($mysqli);
                        if(mysqli_num_rows($amount_payed)>0){
                            while($rows = mysqli_fetch_assoc($amount_payed)){
                                $payment_id = $rows['payment_id'];
                                $amount= $rows['amount'];                                
                        ?>
                            <option value="<?php echo $payment_id ?>"><?php echo $amount ?></option>
                        <?php
                            }
                        }
                    ?>
                </select>
            </div>              
            <div class="form-group">
                <label for="pay_type_id">Payment Method</label>
                <select class="form-control" name="pay_type_id">
                            <option value="">Method</option>
                    <?php
                        $pay_type = get_payment_type($mysqli);
                        if(mysqli_num_rows($pay_type)){
                            while($rows = mysqli_fetch_assoc($pay_type)){
                                $pay_type_id = $rows['pay_type_id'];
                                $payment_type= $rows['payment_type'];

                                
                        ?>
                            <option value="<?php echo $pay_type_id ?>"><?php echo $payment_type ?></option>
                        <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Upload Passport</label>
                <input type="file" name="image" class="form-control">
            </div>
            

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
              <?php
              }
                ?>
            
            </div>
            <div class="col-md-6"></div>
        </div></div>
        <br>

    <?php
    include_once '../navbars/footer.php';
    ?>