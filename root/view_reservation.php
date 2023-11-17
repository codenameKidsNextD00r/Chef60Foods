<?php
session_start();
include("../includes/connect.php");

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $user_id = $_SESSION['uuid'];

    // Query the database for reservation details
    $query = "
                SELECT reservation_date, reservation_time, seats, notes, 
                CASE 
                    WHEN status = 1 THEN 'Pending'
                    WHEN status = 2 THEN 'Confirmed'
                    WHEN status = 3 THEN 'Cancelled'
                END as status
                FROM reservation
                WHERE user_uuid = '$user_id'
                ORDER BY reservation_date ASC;
            ";
    $result = mysqli_query($conn, $query);

    // Check if there are reservations
    if ($result && mysqli_num_rows($result) > 0) {
        $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}else{
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chef60 | Reserve</title>
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
   
    <div class="reservation_table">
        <?php if (isset($reservations)) { ?>
            <h2>Your Reservations</h2>
            <table class="floating-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Party Size</th>
                        <th>Special Requests</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservations as $reservation) { ?>
                        <tr>
                            <td><?php echo $reservation['reservation_date']; ?></td>
                            <td><?php echo $reservation['reservation_time']; ?></td>
                            <td><?php echo $reservation['seats']; ?></td>
                            <td><?php echo $reservation['notes']; ?></td>
                            <td><?php echo $reservation['status']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <p>Click <a href="reservation.php">here</a> to make another reservation</p>
        <?php } else { ?>
            <p>No reservations found.</p>
            <p>Click <a href="reservation.php">here</a> to make a reservation</p>
        <?php } ?>
    </div>
    
</body>
</html>
