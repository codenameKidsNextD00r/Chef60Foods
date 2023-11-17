<?php
    session_start();
    include("../includes/connect.php");
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $user_id = $_SESSION['uuid'];
        $is_admin = $_SESSION['is_admin'];
    }

    if($is_admin !== '1') {
        echo "<script>alert('Access Denied. Admins only'); window.location.href = '../root/login.php';</script>";
    }

    $query = "
            SELECT 
                r.uuid as `reservation_id`,
                u.email as `username`,
                r.reservation_date as `date`,
                r.reservation_time as `time`,
                r.seats,
                r.notes,
                r.status
            FROM 
                users u 
            JOIN
                reservation r ON u.uuid = r.user_uuid
            ORDER BY r.reservation_date;";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if ($result && mysqli_num_rows($result) > 0) {
        $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chef60 | Dashboard</title>
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
        <!-- <ul>
            <li><a href="index.php">home</a></li>
            <li><a href="about.php">about</a></li>
            <li><a href="menu.php">menu</a></li>
            <li><a href="reservation.php">reservation</a></li>
            <li><a href="contact.php">contact</a></li>
        </ul> -->
    </nav>
</header>
<body>
    
    <div class="logo">
        <img src="" alt="">
    </div>
    <div class="reservation_table">
        <?php if (isset($reservations)) { ?>
            <h2>Reservations</h2>
            <table class="floating-table">
                <thead>
                    <tr>
                        <th>User</th>
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
                            <td><?php echo $reservation['username']; ?></td>
                            <td><?php echo $reservation['date']; ?></td>
                            <td><?php echo $reservation['time']; ?></td>
                            <td><?php echo $reservation['seats']; ?></td>
                            <td><?php echo $reservation['notes']; ?></td>
                            <td><?php echo $reservation['status']; ?></td>

                            <td>
                                <a href="../includes/admin_action.php?action=confirm&reservation_id=<?php echo $reservation['reservation_id']; ?>">Confirm |</a>
                                 <a href="../includes/admin_action.php?action=cancel&reservation_id=<?php echo $reservation['reservation_id']; ?>">Cancel</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        
        <?php } else { ?>
            <p>No reservations found.</p>
        <?php } ?>
    </div>
</body>
</html>
