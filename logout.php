<?php
session_start();
session_unset();
session_destroy();
header('Location: login.php');  // or student_login.php depending on the user type
exit();
?>