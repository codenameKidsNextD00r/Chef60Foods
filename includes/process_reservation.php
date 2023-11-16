<?php
include("connect.php");
session_start();


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
    '".$notes."'
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
        echo "<script>
        var confirmation = confirm('Reservation Details:\\nDate: $reservation_date\\nTime: $reservation_time\\nParty Size: $seats\\nSpecial Requests: $notes\\n\\nDo you want to view your reservations?');
        if (confirmation) {
            window.location.href = '../root/reservation.php';
        }
      </script>";
      header("Location: ../root/view_reservation.php");
    } else {
        echo "Failed to insert the reservation.";
    }
}
?>
