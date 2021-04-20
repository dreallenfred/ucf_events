<?php
require_once('connect.php');

if(isset($_POST["submit"])) {
    $name = $_POST["e_name"];
    $category = $_POST["category"];
    $e_date = $_POST["date"];
    $lname = $_POST["location"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];


    $sql = "INSERT INTO event (e_name, category, e_date, l_name, phone, email) VALUES ('$name', '$category', '$e_date', '$lname', '$phone', '$email')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: home.php");
    }
    else {
        echo "Error:".$sql;
    }
}
?>

