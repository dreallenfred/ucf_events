<?php

require_once('connect.php');

if (isset($_POST["submit"])) {

   $username = $_POST["username"];
   $firstName = $_POST["f_name"];
   $lastName = $_POST["l_name"];
   $email = $_POST["email"];
   $password = $_POST["password"];
   $pwdfinal = MD5($password);

   $sql = "INSERT INTO user (username, f_name, l_name, email, password) VALUES ('$username', '$firstName', '$lastName', '$email', '$pwdfinal')";
   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: login.html");
   }
   else {
      echo "Error:".$sql;
   }
}
//    if (emptyInputSignup($username, $firstName, $lastName, $email, $password, $passwordrpt) !== false) {
//       header("location: signUp.php?error=emptyinput");
//       exit();
//    }
//    if (invalidUid($username) !== false) {
//       header("location: signUp.php?error=invaliduid");
//       exit();
//    }
//    if (passwordMatch($password, $passwordrpt) !== false) {
//       header("location: signUp.php?error=passworddoesnotmatch");
//       exit();
//    }
//    if (uidExists($conn, $username) !== false) {
//       header("location: signUp.php?error=invalidemail");
//       exit();
//    }
//    createUser($conn, $username, $firstName, $lastName, $email, $password);
   
// }
// else {
//    header("location: ../index.html");
//    exit();
// }


// function emptyInputSignup($username, $firstName, $lastName, $email, $password, $passwordrpt) {
//    $result = false;
//    if (empty($username)|| empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($passwordrpt)) {
//       $result = true;
//    }
//    else {
//       $result = false;
//    }
//    return $result;
// }

// function invalidUid($username) {
//    $result = false;
//    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
//       $result = true;
//    }
//    else {
//       $result = false;
//    }
//    return $result;
// }

// function passwordMatch($password, $passwordrpt) {
//    $result = false;
//    if ($password !== $passwordrpt) {
//       $result = true;
//    }
//    else {
//       $result = false;
//    }
//    return $result;
// }

// function uidExists($conn, $username) {
//    $sql = "SELECT * FROM user WHERE username = ?;";
//    $stmt = mysqli_stmt_init($conn);
//    if (!mysqli_stmt_prepare($stmt, $sql)) {
//       header("location: signUp.php?error=stmtfailed");
//       exit();
//    }

//    mysqli_stmt_bind_param($stmt, "ss", $username);
//    mysqli_stmt_execute($stmt);

//    $resultData = mysqli_stmt_get_result($stmt);
//    if ($row = mysqli_fetch_assoc($resultData)) {
//       return $row;
//    }
//    else {
//       $result = false;
//       return $result;
//    }
//    mysqli_stmt_close($stmt);
// }

// function createUser($conn, $username, $firstName, $lastName, $email, $password) {
//    $sql = "INSERT INTO user (username, f_name, l_name, password, email) VALUES ($username, $firstName, $lastName, $password, $email)";
//    $stmt = mysqli_stmt_init($conn);
//    if (!mysqli_stmt_prepare($stmt, $sql)) {
//       header("location: signUp.php?error=stmtfailed");
//       exit();
//    }

//    $hashedPass =password_hash($password, PASSWORD_DEFAULT);
//    mysqli_stmt_bind_param($stmt, "sssss", $username, $firstName, $lastName, $email, $hashedPass);
//    mysqli_stmt_execute($stmt);
//    mysqli_stmt_close($stmt);
//    header("location: signUp.php?error=none");
// }
