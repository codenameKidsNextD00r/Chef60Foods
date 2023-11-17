<?php
    session_start();
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $user_id = $_SESSION['uuid'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chef60 | Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css">
    <style>
        
    </style>
</head>
<body>
    <nav class="nav">
        <ul class="login">
            <?php if (isset($email)) { ?>
                <li>Welcome, <?php echo $email; ?> | <a href="../includes/logout.php">Log Out</a></li>
                <?php } else { ?>
                    <li><a href="login.php">Log In</a></li>
                    <li><a href="register.php">Register</a></li>
            <?php } ?>
        </ul>
        <ul>
            <li><a href="index.php">home</a></li>
            <li><a href="about.php">about</a></li>
            <li><a href="menu.php">menu</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">reservations</a>
                <div class="dropdown-content">
                    <a href="view_reservation.php">View Reservations</a>
                    <a href="reservation.php">Make a Reservation</a>
                </div>
             </li>
            <li><a href="contact.php">contact</a></li>
        </ul>
    </nav>
   

</body>
</html>
