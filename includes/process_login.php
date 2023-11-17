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
                WHERE 
                    `email` = '".$email."'
                ;";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['user_password'];

        if (password_verify($user_password, $hashed_password)) {
            $user_id = $row['uuid'];
            $is_admin = $row['is_admin'];
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['uuid'] = $user_id;
            $_SESSION['is_admin'] = $is_admin;//create the session variable bro

            if($is_admin != '1'){
                header("Location: ../root/index.php");
            }else{
                header("Location: ../root/admin.php");
            }
            
        } else {
            echo "<script>alert('Incorrect email or password. Please try again.'); window.location.href = '../root/login.php';</script>";
        }
    } else {
        echo "<script>alert('Incorrect email or password. Please try again.'); window.location.href = '../root/login.php';</script>";
    }
}

    loginCheck($email, $user_password, $conn);
}
