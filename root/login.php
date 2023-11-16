<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chef60 | Log In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css">
</head>

<body class="login-page">
<!-- FIREBASE -->
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyDJMC8MX6HYEsCsV4cr3XczFxKSwt_Cf7g",
    authDomain: "chef60-dfeb6.firebaseapp.com",
    projectId: "chef60-dfeb6",
    storageBucket: "chef60-dfeb6.appspot.com",
    messagingSenderId: "939490139089",
    appId: "1:939490139089:web:34363084755859d7fedef0",
    measurementId: "G-W3XLQGRH4C"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>
<script src="https://www.gstatic.com/firebasejs/9.3.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.3.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.3.0/firebase-database.js"></script>
<!-- Include other Firebase modules you need -->
<script>
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
</script>

<!-- login form -->
<div class="form-container">
  <h2>Welcome to Chef60 Foods</h2>
  <p>Sign in to your account to continue</p>
  <form id="loginForm" method="POST" action="../includes/process_login.php">
    <input type="email" id="email"placeholder="Email" name="email" required>
    <input type="password" id="password" placeholder="Password" name="password" required>
    <button type="submit" id="loginButton" >Login</button>
  </form>
  <p>If you don't already have an account click <a href="register.php">here</a> to register.</p>
</div>

<!--javascript validation -->
<script>
function validateForm() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    if (email === "" || password === "") {
        alert("Email and Password fields are required");
        return false;
    }
    return true; 
}
</script>


<script>
  document.getElementById("loginButton").addEventListener("click", function() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    firebase.auth().signInWithEmailAndPassword(email, password)
      .then(function(user) {
        // User is signed in.
        console.log("Logged in: " + user.uid);
      })
      .catch(function(error) {
        // Handle errors.
        console.error(error.message);
      });
  });
</script>



</body>
</html>
