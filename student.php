<?php
    require_once('connect.php');
    session_start();
    $username = $_SESSION["username"];

    $firstName = $lastName = $email = '';
    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM user WHERE user_id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row["username"];
            $firstName = $row["f_name"];
            $lastName = $row["l_name"];
            $email = $row["email"];
        }
    }
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" class="navbar-brand">Login</a>
        </div>
        <div class="dropdown navbar-right" id="right">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $username;?></button>
            <u1>
                <li><a href="events.php">Event Page</a></li>
                <li><a href="logout.php">Logout</a></li>
            </u1>
        </div>
    </div>
</nav>
<br><br>
<div>
    <h3 style="text-align: center;">Welcome to RSO Events <?php echo $firstName." ".$lastName?></h3>

    <button><a href="ecreate.html">Create Event</a></button>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="css/account.css"> -->
<!-- <script type="text/javascript" src="js/jquery-3.3.1.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>