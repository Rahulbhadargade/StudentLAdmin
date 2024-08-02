<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: student_login.php');
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'school');
$result = $conn->query("SELECT * FROM notices ORDER BY uploaded_time DESC LIMIT 5");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Page</title>
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            background-color: #f9f9f9;
        }
        marquee {
            width: 100%;
            background-color: #f1f1f1;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .logout {
            text-align: right;
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="logout">
        <a href="logout.php">Logout</a>
    </div>
    <h2>Welcome Student</h2>
    <marquee behavior="scroll" direction="left">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="card"><?php echo $row['notice']; ?></div>
        <?php } ?>
    </marquee>
</body>
</html>

<?php
$conn->close();
?>