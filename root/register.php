<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chef60 | Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css">
</head>

<body class="login-page">

<!-- login form -->
<div class="form-container">
  <h2>Welcome to Chef60 Foods</h2>
  <p>Please enter your details to create your account</p>
  <form id="loginForm" method="POST" action="../includes/process_register.php">
    <input type="text" id="f_name" placeholder="First Name" name="f_name" required>
    <input type="text" id="l_name" placeholder="Last Name" name="l_name" required>
    <input type="email" id="email"placeholder="Email" name="email" required>
    <input type="text" id="number" placeholder="Phone Number" name="number" required>
    <input type="password" id="password" placeholder="Password" name="password" required>
    <input type="password" id="password_confirm" placeholder="Confirm Password" name="password_confirm" required>
    <button type="submit" id="registerButton" >Create</button>
  </form>
  <p>If you already have an account click <a href="login.php">here</a> to login.</p>
</div>

<!--javascript validation -->
<script>
function validateForm() {
    var f_name = document.getElementById("f_name").value;
    var l_name = document.getElementById("l_name").value;
    var email = document.getElementById("email").value;
    var number = document.getElementById("number").value;
    var password = document.getElementById("password").value;

    if (f_name === "" || l_name === "" ||
        number === "" ||email === "" || password === "" ) 
    {
        alert("All fields are required");
        return false;
    }
    return true; 
}
</script>

</body>
</html>
