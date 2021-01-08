        <?php
            include_once '../connection/database_conn.php';
            $mysqli = connect_db();

            session_start();
            
            if(!isset($_SESSION['user_id'])){
                header("Location: login.php");
                exit();
            }

            include '../includes/students.php';
            
        ?>

        <?php
            if(isset($_POST['update'])){
                $std_id      = $_POST['std_id'];
                $std_name    = $_POST['std_name'];
                $std_email   = $_POST['std_email'];
                $std_phone   = $_POST['std_phone'];
                $course_id   = $_POST['course_id'];
                $gender_id   = $_POST['gender_id'];
                $sponsor_id  = $_POST['sponsor_id'];
                $duration_id = $_POST['duration_id'];
                $payment_id  = $_POST['payment_id'];
                $pay_type_id = $_POST['pay_type_id'];
                $fileNewname     = $_FILES['image'];
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

          update_student_by_id($mysqli, $std_id, $std_name, $std_email, $std_phone,$course_id,$gender_id,$sponsor_id, $duration_id, $payment_id, $pay_type_id, $fileNewname);
                   
            }
        
        ?>

