<?php
include 'conn.php';
    doDB();
    if(isset($_POST['submit'])){
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_pass = $_POST['user_pass'];
        $user_phone = $_POST['user_phone'];
        $created_at = date('Y-m-d H:i:s');

        //Insert Users Record into Database
        $query = "INSERT INTO users(user_name, user_email, user_pass, user_phone, created_at) 
                VALUES('$user_name', '$user_email', '$user_pass', '$user_phone', '$created_at')";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        
        if($result){
            echo "Record inserted successfully";
        }else{
            echo "Record not inserted";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Portal</title>
</head>
<body>
    <h1>Register an Admin</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <p><label for="user_name">Name :</label><br>
        <input type="text" name="user_name" size="30" maxlength="50" ></p>
        <p><label for="user_email">Email :</label><br>
        <input type="email" name="user_email" size="30" maxlength="50" ></p>        
        <p><label for="user_pass">Password:</label><br>
        <input type="password" name="user_pass" size="30" maxlength="50" ></p>
        <p><label for="user_phone">Phone :</label><br>
        <input type="text" name="user_phone" size="30" maxlength="50" ></p>
        <button type="submit" name="submit" value="submit">Save Record</button>
    </form>
    <hr>
        <div id="record">
        <h2>Record From the Database</h2> 
        <table border="1px">
        <thead>
            <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
            </tr>

            <?php
           insert_student(
               'james',
               'james@gmail.com'
            );
          $student_details = get_student_by_id(123);
          mysqli_num_rows($student_details);
          mysqli_fetch_assoc($student_details);
          foreach

            //Fetch Mysqli Record
            $query = "SELECT * FROM users WHERE suer_id = $user_id";
            $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

            if(mysqli_num_rows($result)< 1){
                 echo "No record found!"."<br/>";
            }else{
                while($rows = mysqli_fetch_assoc($result)){
                $id = $rows['id'];
                $user_name = $rows['user_name'];
                $user_email = $rows['user_email'];
                $user_phone = $rows['user_phone'];
                $created_at = $rows['created_at'];
                           
           
        ?>
        <tbody>
            <tr>
                <td><?php echo  $id; ?></td>
                <td><?php echo  $user_name; ?></td>
                <td><?php echo  $user_email; ?></td>
                <td><?php echo  $user_phone; ?></td>
                <td><?php echo  $created_at; ?></td>
                <td><a href="#">Edit</a></td>
                <td><a href="#">Delete</a></td>
            </tr>
            <?php }  } ?>
        </tbody>
        
    </thead>
 
    </table>       
        </div>
</body>
</html>


SELECT s.std_id, s.std_name, s.std_email, s.std_phone, c.course_name, g.gender_name, sp.sponsor_name, d.duration_name, p.payment_type FROM student s
LEFT JOIN course c ON s.course_id = c.course_id,
LEFT JOIN gender g ON s.gender_id = g.gender_id,
LEFT JOIN sponsor sp ON s.sponsor_id = sp.sponsor_id,
LEFT JOIN duration d ON s.duration_id = d.duration_id AND
LEFT JOIN payment_type p ON s.pay_type_id = p.pay_type_id;

SELECT s.std_id, s.std_name, s.std_email, s.std_phone, c.course_name, g.gender_name, sp.sponsor_name, d.duration_name, p.payment_type FROM student s LEFT JOIN course c ON s.course_id = c.course_id LEFT JOIN gender g ON s.gender_id = g.gender_id LEFT JOIN sponsor sp ON s.sponsor_id = sp.sponsor_id LEFT JOIN duration d ON s.duration_id = d.duration_id LEFT JOIN payment_type p ON s.pay_type_id = p.pay_type_id 


SELECT s.std_id, s.std_name, s.std_email, s.std_phone, c.course_name
FROM student s
JOIN course c ON s.course_id = c.course_id;