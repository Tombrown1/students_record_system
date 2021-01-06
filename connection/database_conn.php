<?php
// Define Database Parameters !
   function connect_db()
   {     
        define('DB_SERVER', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'students');
        // connects us  to a database
        $mysqli = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        return $mysqli;
        // Check for database connection error 
        if(mysqli_connect_errno()){
            echo "Failed to connect to MYSQL: " . mysqli_connect_error();
        }
   }
  // $mysqli = connect_db();
// function doDB(){
//     global $mysqli;

//     $mysqli = mysqli_connect("localhost", "root", "", "students");

//     if(mysqli_connect_errno()){
//         printf("Connection Failed: %s/n", mysqli_connect_error());
//         exit();
//     }
// }
?>