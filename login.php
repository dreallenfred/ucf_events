<?php

require_once('connect.php');

if (isset($_POST["submit"])) {

   $username = $_POST["username"];
   $password = $_POST["password"];
   $pwdfinal = MD5($password);

   $sql = "SELECT * FROM user WHERE username='$username' AND password='$pwdfinal'";
   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
		  $user_id = $row["user_id"];
		  $username = $row["username"];
		  session_start();
		  $_SESSION['user_id'] = $user_id;
		  $_SESSION['username'] = $username;
	  }
	  header("Location: home.php");
   }
   else {
      echo "Error:".$sql;
   }
}
?>