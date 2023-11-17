<?php
include("connect.php");
session_start();
require_once("mailer.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['email'];
    $user_id = $_SESSION['uuid']; 
    $reservation_date = $_POST['date']; 
    $reservation_time = $_POST['time']; 
    $seats = $_POST['party-size']; 
    $notes = $_POST['special-requests']; 

    // echo "User id: '".$user_id."' " ;
    // echo "User mail: '".$email."' " ;
    // echo "date: '".$reservation_date."' " ;
    // echo "time: '".$reservation_time."' " ;
    // echo "seats: '".$seats."' " ;
    // echo "Notes: '".$notes."' " ;

    //Insert the reservation into the 'reservations' table
    $insertQuery = "
    INSERT INTO reservation
    VALUES(
    uuid(),
    '".$user_id."',
    '".$reservation_date."', 
    '".$reservation_time."',
    ".$seats.",
    '".$notes."',
    1
    );" ;
    $insertResult = mysqli_query($conn, $insertQuery);

    // Send a confirmation email to the user
    // $to = $email;
    // $subject = "Reservation Confirmation";
    // $message = "Thank you for your reservation!\n\n";
    // $message .= "Date: $reservation_date\n";
    // $message .= "Time: $reservation_time\n";
    // $message .= "Party Size: $seats\n";
    // $message .= "Special Requests: $notes\n";
    // $message .= "We look forward to serving you!\n";

    // $headers = "From: mlumbibongani@gmail.com";

    // if (mail($to, $subject, $message, $headers)) {
    //     echo "Confirmation email sent.";
    // } else {
    //     echo "Failed to send confirmation email.";
    // }

    if ($insertResult) {
        echo "<script>alert('Reservation recorded successfully. Please wait for confirmation'); window.location.href = '../root/view_reservation.php';</script>";
        $mail = createMailer();
        sendConfirmationEmail($email, $mail, $reservation_date, $reservation_time);

    //     echo "<script>
    //     var confirmation = confirm('Reservation Details:\\nDate: $reservation_date\\nTime: $reservation_time\\nParty Size: $seats\\nSpecial Requests: $notes\\n\\nDo you want to view your reservations?');
    //     if (confirmation) {
    //         window.location.href = '../root/reservation.php';
    //     }
    //   </script>";
      header("Location: ../root/view_reservation.php");
    } else {
        echo "Failed to insert the reservation.";
    }
}

function sendConfirmationEmail($recipientEmail, $mail, $reservation_date, $reservation_time)
{
    //convert formatting from db to be more user frinedly for email
    // Convert database date and time to from string to timestamps
    $reservation_date_timestamp = strtotime($reservation_date);
    $reservation_time_timestamp = strtotime($reservation_time);

    // Convert again to desired format
    $formatted_date = date("l, F j Y", $reservation_date_timestamp);
    $formatted_time = date("g:i A", $reservation_time_timestamp);
    $mail->addAddress($recipientEmail);

    // Set email subject and body
    $mail->Subject = 'Thank You For Reserving A Table at Chef60';
    $mail->Body    = '<p>Thank you for your reservation request for <strong>'.$formatted_date.'</strong> from <strong>'.$formatted_time.'</strong>. Please wait for confirmation.</p>';
    $mail->AltBody  = 'Thank you for your reservation request for '.$formatted_date.' from '.$formatted_time.'. Please wait for confirmation.';

    // Send the email
    $mail->send();
}
