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
            echo "Welcome, login was successful";
        } else {
            echo "That user does not exist, login failed";
        }
    }

    loginCheck($email, $user_password, $conn);
}
?>
