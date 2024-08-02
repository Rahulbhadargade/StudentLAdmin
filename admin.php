<?php
session_start();

if ($_SESSION['username'] != 'admin') {
    header('Location: login.php');
    exit();
}

if (isset($_POST['submit'])) {
    $notice = $_POST['notice'];
    $conn = new mysqli('localhost', 'root', '', 'school');
    $stmt = $conn->prepare("INSERT INTO notices (notice) VALUES (?)");
    $stmt->bind_param("s", $notice);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
</head>
<body>
    <h2>Post a Notice</h2>
    <form method="post" action="">
        <textarea name="notice" rows="10" cols="30"></textarea><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>