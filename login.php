<?php

require_once('connect.php');

if (isset($_POST["submit"])) {
   session_start();
   $username = $_POST["username"];
   $password = $_POST["password"];
   $pwdfinal = MD5($password);

   $sql = "SELECT * FROM user WHERE username='$username' AND password='$pwdfinal'";
   $result = mysqli_query($conn, $sql);
   $num_rows = mysqli_num_rows($result);


   $user_id = $row["user_id"];
   $username = $row["username"];
   $_SESSION['user_id'] = $user_id;
   $_SESSION['username'] = $username;

   
   // if (mysqli_num_rows($result) > 0) {    
   //    while ($row = mysqli_fetch_assoc($result)) {
   //       $user_id = $row["user_id"];
   //      $username = $row["username"];
   //      session_start();
   //      $_SESSION['user_id'] = $user_id;
   //      $_SESSION['username'] = $username;
   //    }
   // }
   // else {
   //    echo "Error:".$sql;
   // }

   if ($num_rows === 1) {
      $row_array = mysqli_fetch_assoc($result);
      if ($row_array['role'] == 1) {
         header("Location: super_admin.php");
      }
      else if ($row_array['role'] == 2) {
         header("Location: admin.php");
      }
      else if ($row_array['role'] == 3) {
         header("Location: student.php");
      }
      else if ($row_array['role'] == 4) {
         header("Location: student_admin.php");
      }
   }
   else {
      $error="username/password combo incorrect";
   }

   
}
?>