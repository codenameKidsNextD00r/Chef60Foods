<?php
session_start();
include("connect.php");
// require_once("mailer.php");

if (isset($_GET['action'], $_GET['reservation_id'])) {
    $action = $_GET['action'];
    $reservation_id = $_GET['reservation_id'];

    //fetch that user's email address
    // $emailQuery = "
    // SELECT 
    //     u.email, 
    //     r.uuid
    // FROM 
    //     reservation r
    // JOIN 
    //     users u on r.user_uuid = u.uuid
    // WHERE 
    //     r.uuid = '".$reservation_id."';
    // ";

    // $fetchEmail = mysqli_query($conn, $emailQuery);
    // $row = mysqli_fetch_assoc($fetchEmail);
    // $email = $row['email'];


    if ($action === 'confirm') {
        //echo "confirming";
        $updateQuery = "
        UPDATE 
            reservation
        SET
            status = 2
        WHERE 
            uuid = '".$reservation_id."';
        ";
        //echo $updateQuery;
        $updateResult = mysqli_query($conn, $updateQuery);

        // $mail = createMailer();
        // sendConfirmationEmail($email, $mail, $email_subject, $email_body, $alt_body);

        if ($updateResult) {
            echo "<script>alert('Reservation successfully Confirmed.'); window.location.href = '../root/admin.php';</script>";
        } else {
            echo "Failed to update reservation status.";
        }

    } else if($action === 'cancel') {
        $updateQuery = "
        UPDATE 
            reservation
        SET
            status = 3
        WHERE 
            uuid = '".$reservation_id."';
        ";
        //echo $updateQuery;
        $updateResult = mysqli_query($conn, $updateQuery);


        if ($updateResult) {
            echo "<script>alert('Reservation successfully Cancelled.'); window.location.href = '../root/admin.php';</script>";
        } else {
            echo "Failed to update reservation status.";
        }
    }
}