<?php
require_once('connect.php');

if(isset($_POST["submit"])) {
    $name = $_POST["u_name"];
    $eid = $_POST["eid"];
    $uid = $_POST["uid"];


    $sql = "INSERT INTO rso (rso_name) VALUES ('$name')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: home.php");
    }
    else {
        echo "Error:".$sql;
    }
}
?>

