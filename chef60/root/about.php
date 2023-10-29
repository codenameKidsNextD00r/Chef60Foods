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
   
    <div class="about_text">
        <h2>About Us</h2>
        <p>Welcome to Chef60 Foods, a small restaurant dedicated to serving delicoius and wholesome meals to our valued customers. With a passion for culinary excellence, we take pride in creating memorable dining experiences for all who visit us</p>
        <p>Chef60 Fooods was founded by Chef Benjamin Mutsvangwa, a culinary expert with over 5 years of experience in the industry. His vision was to create a place where people could indulge in flavorful dishes made from the freshest and finest ingredients.</p>
        <p>At Chef60 Foods we belieive that great food starts with quality ingredients. That's why we carefully source our produce, meats and other ingredients from local suppliers and farmers who share our commitment to sustainability and ethical practices.</p>
    </div>
</body>
</html>
