<?php
session_start();
require_once("settings.php");

$error = ""; // to store error messages



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get input and trim spaces (not using the clean_input() function as trim alone works here)
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    // building sql to query the user table
    $query = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Login successful
        $_SESSION['username'] = $user;
        header("Location: manage.php"); // redirect to dashboard
        exit();
    } else {
        // Login failed
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manager Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="login-container">
        <h2>Dashboard Login</h2>
        <?php
        if (!empty($error)) {
            echo "<p style='color: #ff4d4d; text-align:center;'>$error</p>";
        }
        ?>
        <form method="POST" action="login.php">
            <div>
                <label>Username:</label>
                <input type="text" name="username" required>

                <label>Password:</label>
                <input type="password" name="password" required>
               
            </div>

            <input type="submit" value="Login">

             <p><a href="index.php">Return home</a></p>
        </form>
    </div>
</body>

</html>