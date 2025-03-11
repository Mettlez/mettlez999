<?php
session_start();
include '../config/db_connection.php';

// เชื่อมต่อฐานข้อมูล
$conn = new mysqli($host, $user, $password, $database);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับค่าจากฟอร์ม
$username = $_POST['username'];
$password = $_POST['password'];

// ใช้ Prepared Statement เพื่อป้องกัน SQL Injection
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // ตรวจสอบรหัสผ่าน
    if (password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        echo "<script>
                alert('Login Successful! 🎉');
                window.location.href = '../Dashboard/dashboard.php';
              </script>";
    } else {
        echo "<script>
                alert('รหัสผ่านไม่ถูกต้อง ❌');
                window.history.back();
              </script>";
    }
} else {
    echo "<script>
            alert('ไม่พบบัญชีนี้ในระบบ ❌');
            window.history.back();
          </script>";
}

$stmt->close();
$conn->close();
?>