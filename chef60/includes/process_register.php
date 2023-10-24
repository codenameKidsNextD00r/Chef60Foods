<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $user_password = $_POST['password'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $number = $_POST['number'];
    // $f_name, $l_name, $number,
    function registerCheck($email, $user_password,  $conn)
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
            echo "That user already exists";
        } else {
            echo "That user does not exist, can create";
        }
    }

    registerCheck($email, $user_password, $conn);
}
?>
