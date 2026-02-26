<h2>Network Ping Test Tool</h2>
<form method="POST">
    Enter IP Address: <input type="text" name="ip">
    <input type="submit" value="Ping">
</form>

<pre>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['ip'])) 
{
    $target = $_POST['ip'];

    // TASK 4 VULNERABILITY: Conceptual logic - system("ping " + user_input);
    // On Windows XAMPP, this runs a shell command directly.
    echo shell_exec("ping -n 1 " . $target);
    // Only allow characters valid for an IP address

    //$target = preg_replace('/[^0-9.]/', '', $_POST['ip']);
    //echo shell_exec("ping -n 1 " . escapeshellarg($target));
}
?>
</pre>