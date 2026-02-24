<?php
// Connect to the database you created in phpMyAdmin
$conn = mysqli_connect("localhost", "root", "", "lab_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // This is the vulnerable line from your lab scenario
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h2 style='color:green'>Login Successful!</h2>";
    } else {
        echo "<h2 style='color:red'>Login Failed!</h2>";
    }
}
?>

<form method="POST">
    Name: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>