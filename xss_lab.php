<?php
$conn = mysqli_connect("localhost", "root", "", "lab_db");

// Save the comment when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['comment'])) {
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    
    // Now the insert will work even with symbols
    mysqli_query($conn, "INSERT INTO guestbook (comment) VALUES ('$comment')");
}
?>

<h2>Guestbook - Leave a Comment</h2>
<form method="POST">
    <textarea name="comment" rows="4" cols="50"></textarea><br>
    <input type="submit" value="Submit Comment">
</form>

<hr>
<h3>Public Comments:</h3>
<?php
$result = mysqli_query($conn, "SELECT comment FROM guestbook");
while($row = mysqli_fetch_assoc($result)) {
    // TASK 4 VULNERABILITY: The "echo" displays raw HTML/Script tags
    //echo "<div>User Comment: " . $row['comment'] . "</div><br>";
    // Use this to display safely
    echo "<div>User Comment: " . htmlspecialchars($row['comment']) . "</div>";
}
?>