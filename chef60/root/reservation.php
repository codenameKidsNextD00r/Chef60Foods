<?php
    session_start();
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $user_id = $_SESSION['uuid'];
    }else{
        header("Location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chef60 | About</title>
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
        <li><a href="reservation.php">reservation</a></li>
        <li><a href="contact.php">contact</a></li>
    </ul>
    </nav>
  
    <div class="reservation-container">
    <form action="../includes/process_reservation.php" method="post">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
                
                <label for="time">Time:</label>
                <input type="time" id="time" name="time" required>
                
                <label for="party-size">Party Size:</label>
                <input type="number" id="party-size" name="party-size" min="1" max="10" required>
                
                <label for="special-requests">Special Requests:</label>
                <textarea id="special-requests" name="special-requests" rows="4"></textarea>
                
                <button type="submit">Submit Reservation</button>
            </form>
    </div>
</body>
</html>
