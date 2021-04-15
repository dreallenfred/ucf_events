<?php
require_once('connect.php');

if(isset($_POST["submit"])) {
    $name = $_POST["u_name"];
    $location = $_POST["location"];
    $description = $_POST["u_description"];
    $enrollment = $_POST["enrollment"];


    $sql = "INSERT INTO university (u_name, l_id, u_description, enrollment) VALUES ('$name', '$location', '$description', '$enrollment')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: home.php");
    }
    else {
        echo "Error:".$sql;
    }
}
?>

