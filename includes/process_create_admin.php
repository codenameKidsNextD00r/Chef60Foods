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
        $hashed_password = password_hash($user_password, PASSWORD_BCRYPT);
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
            (uuid, email, user_password, first_name, last_name, phone, is_admin)
            VALUES(
            uuid(),    
            '".$email."',
            '".$hashed_password."',
            '".$f_name."',
            '".$l_name."',
            '".$number."',
            1)
            ;";

            $result = mysqli_query($conn, $insert_query);

            echo "<script>alert('Account created successfully! Please login'); window.location.href = '../root/login.php';</script>";

        }
    }

    registerCheck($email, $user_password, $f_name, $l_name, $number, $conn);
}
?>
