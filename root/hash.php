<?php
    $password = "12345678";
    $hashed_password = password_hash($user_password, PASSWORD_BCRYPT);
    echo $hashed_password;
?>