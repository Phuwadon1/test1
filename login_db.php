<?php
    session_start(); // เปิดใช้งาน session
    $errors = array();

    include("config.php");
    $conn = connectDB(); // เชื่อมต่อฐานข้อมูล
    $username = mysqli_real_escape_string($conn, $_POST['username']); // รับค่า username
    $password = mysqli_real_escape_string($conn, $_POST['password']); // รับค่า password

    $sql = ("SELECT * FROM user WHERE username = '$username' AND password = '$password'") or die("Select Error");
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    if (is_array($row) && !empty($row)) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
    } else {
        echo "<div class='message'>
        <p>Wrong username or password</p>
        </div> <br>" ;
        echo "<a href='index.php'><button class='btn'>GO Back</button></a>";
    }
    if (isset($_SESSION['email'])) {
        header('Location: Home.php');
    } else {
        echo '<script>alert("username หรือ password ไม่ถูกต้อง!!");window.location="index.php";</script>';
    }
?>