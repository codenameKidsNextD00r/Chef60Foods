<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chef60 | Reservation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css">
</head>
<body class="reservation-page">
    <nav class="nav">
        <ul>
            <li><a href="index.php">home</a></li>
            <li><a href="about.php">about</a></li>
            <li><a href="menu.php">menu</a></li>
            <li><a href="reservation.php">reservation</a></li>
            <li><a href="contact.php">contact</a></li>
        </ul>
    </nav>
    <div class="content-container">
        <div class="reservation-form">
            <h2>Make a Reservation</h2>
            <form action="process_reservation.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required>
                
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
                
                <label for="time">Time:</label>
                <input type="time" id="time" name="time" required>
                
                <label for="party-size">Party Size:</label>
                <input type="number" id="party-size" name="party-size" required>
                
                <label for="special-requests">Special Requests:</label>
                <textarea id="special-requests" name="special-requests" rows="4"></textarea>
                
                <button type="submit">Submit Reservation</button>
            </form>
        </div>
    </div>
</body>
</html>
