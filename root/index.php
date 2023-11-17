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
    <title>Chef60 | Home</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css">
</head>
<header>
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
</header>
<body>
    
    <div class="logo">
        <img src="" alt="">
    </div>
    <div class="home_text">
        <h2>Chef60 Foods</h2>
        <p>"A little slice of heaven". Follow me as I share my experiences with food. Donut worry, be happy! 
            It's made with love. 60 Seconds in our kitchen will grant you a gateway to heaven. 
            Heaven is a big place, all I want to give you is just a slice of it.</p>
        <button name="menu" type="submit"><a href="menu.php">Explore Menu</a></button>
   
    </div>
</body>
</html>
