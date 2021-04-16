<?php

require_once('connect.php');

if (isset($_POST["submit"])) {

   $username = $_POST["username"];
   $password = $_POST["password"];
   $pwdfinal = MD5($password);

   $sql = "SELECT * FROM user WHERE username='$username' AND password='$pwdfinal'";
   $result = mysqli_query($conn, $sql);
   $num_rows = mysqli_num_rows($result);

   // if ($row = mysqli_fetch_assoc($result)) {
   //    $user_id = $row["user_id"];
   //    $username = $row["username"];
   //    session_start();
   //    $_SESSION['user_id'] = $user_id;
   //    $_SESSION['username'] = $username;
   // }

   $user_id = $row["user_id"];
   $username = $row["username"];
   session_start();
   $_SESSION['user_id'] = $user_id;
   $_SESSION['username'] = $username;
   
   if ($num_rows === 1) {
      $row_array = mysqli_fetch_assoc($result);
      if ($row_array['role'] == 1) {
         header("Location: super_admin.php");
      }
      else if ($row_array['role'] == 2) {
         header("Location: admin.php");
      }
      else if ($row_array['role'] == 3) {
         header("Location: home.php");
      }
   }

   // if (mysqli_num_rows($result) > 0) {
   //    while ($row = mysqli_fetch_assoc($result)) {
   //       $user_id = $row["user_id"];
   //      $username = $row["username"];
   //      session_start();
   //      $_SESSION['user_id'] = $user_id;
   //      $_SESSION['username'] = $username;   
   //    }
   // }
   


 
   else {
      echo "Error:".$sql;
   }
}
?>