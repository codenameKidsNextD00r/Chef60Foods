<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $user_password = $_POST['password'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $number = $_POST['number'];
    // $f_name, $l_name, $number,
    function registerCheck($email, $user_password, $f_name, $l_name, $number, $conn)
    {
        //first check if that person already exists
        $query = "
        SELECT * 
        FROM 
          users 
        WHERE `email` = '".$email."'
        
        ;";
        // AND `user_password` = '".$user_password."'

        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "That user already exists";
        } else {
            $insert_query = "
            INSERT INTO users
            (uuid, email, user_password, first_name, last_name, phone)
            values(
            uuid(),    
            '".$email."',
            '".$user_password."',
            '".$f_name."',
            '".$l_name."',
            '".$number."')
            ;";

            $result = mysqli_query($conn, $insert_query);

            echo "<script>alert('Account created successfully! Please login'); window.location.href = '../root/login.php';</script>";

        }
    }

    registerCheck($email, $user_password, $f_name, $l_name, $number, $conn);
}
?>
