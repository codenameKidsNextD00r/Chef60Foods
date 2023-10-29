<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $user_password = $_POST['password'];

    function loginCheck($email, $user_password, $conn)
    {
        $query = "
        SELECT * 
        FROM 
          users 
        WHERE `email` = '".$email."'
        AND `user_password` = '".$user_password."'
        ;";

        $result = mysqli_query($conn, $query);

        // echo $result;

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['uuid'];
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['uuid'] = $user_id;
            // echo "Welcome, login was successful";
            // echo "Your user_id is '".$user_id."'";
            header("Location: ../root/index.php");
        } else {
            echo "<script>alert('Incorrect email or password. Please try again.'); window.location.href = '../root/login.php';</script>";
        }
    }

    loginCheck($email, $user_password, $conn);
}
?>
