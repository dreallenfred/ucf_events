<?php
require_once('connect.php');

if(isset($_POST["submit"])) {
    $name = $_POST["u_name"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    $description = $_POST["u_description"];
    $enrollment = $_POST["enrollment"];

    $sql_location = "INSERT INTO location (l_name, latitude, longitude) VALUES ('$name', '$latitude', '$longitude')";
    $result_location = mysqli_query($conn, $sql_location);
    if ($result_location) {
        $sql = "INSERT INTO university (l_name, u_description, enrollment) VALUES ('$name', '$description', '$enrollment')";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            header("Location: super_admin.php");
        }
        else {
            echo "Error:".$sql;
        }
    }
    else {
        echo "Error:".$sql_location;
    }

}
?>

