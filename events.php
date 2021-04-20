<html>
<head>
    <title>RSO Events</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Import Bootstrap Library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Import Necessary local CSS Libraries -->
    <link href="/index.css" rel="stylesheet">
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div class="navbar-header">
            <a href="#" class="navbar-brand" style="color: white">Welcome to UCF Events</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navabar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="events.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.html">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signUp.html">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
<h3>College Event Calendar</h3>
<br><br>
<body>
<style type="text/css">
    table {
        margin-left: auto;
        margin-right: auto;
    }
    th {
        text-align: center;
        background-color: black;
        color: white;
    }
    td {
        text-align: center;
    }
</style>   
    <?php
    require_once('connect.php');
    session_start();


    $sql = "SELECT * FROM event";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table table-bordered table-striped table-sm'>";
                echo "<tr>";
                    echo "<th>Event Name</th>";
                    // echo "<th>Category</th>";
                    echo "<th>Date</th>";
                    echo "<th>Location</th>";
                    echo "<th>Phone Number</th>";
                    echo "<th>Email</th>";
                    echo "<th>Comment</th>";
                echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                    echo "<td>" . $row['e_name'] . "</td>";
                    // echo "<td>" . $row['category'] . "</td>";
                    echo "<td>" . $row['e_date'] . "</td>";
                    echo "<td>" . $row['l_name'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>";
                    echo '<a href="read.php?id='. $row['e_id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><i class="fas fa-eye"></i></a>';
                    echo '<a href="update.php?id='. $row['e_id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><i class="fas fa-pencil-alt"></i></a>';
                    echo '<a href="delete.php?id='. $row['e_id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fas fa-trash"></span></a>';
                    echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else {
            echo "No records matching your query were found";
        }
    }
    else {
        echo "Error: Could not execute $sql. " . mysqli_error($conn);
    }
    ?>
    <script src="https://kit.fontawesome.com/75a469ff9b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>



