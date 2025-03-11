<?php
include '../config/db_connection.php'; // ไฟล์เชื่อมต่อฐานข้อมูล

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // เข้ารหัสรหัสผ่าน
    $prefix_id = $_POST['prefix_id'];
    $full_name = $_POST['full_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $department_id = $_POST['department_id'];
    $role_id = 2; // กำหนดบทบาทเป็น user
    $created_at = date("Y-m-d H:i:s");

    // ใช้ transaction ป้องกันปัญหาข้อมูลไม่ครบ
    $conn->begin_transaction();

    try {
        // เพิ่มข้อมูลในตาราง users
        $sql_users = "INSERT INTO users (username, password, prefix_id, department_id, created_at, role_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_users = $conn->prepare($sql_users);
        $stmt_users->bind_param("ssiisi", $username, $password, $prefix_id, $department_id, $created_at, $role_id);

        if (!$stmt_users->execute()) {
            throw new Exception("เกิดข้อผิดพลาดในการเพิ่มข้อมูลในตาราง users: " . $stmt_users->error);
        }

        $user_id = $stmt_users->insert_id;

        // เพิ่มข้อมูลในตาราง user_profiles
        $sql_profiles = "INSERT INTO user_profiles (user_id, full_name, phone_number, email) VALUES (?, ?, ?, ?)";
        $stmt_profiles = $conn->prepare($sql_profiles);
        $stmt_profiles->bind_param("isss", $user_id, $full_name, $phone_number, $email);

        if (!$stmt_profiles->execute()) {
            throw new Exception("เกิดข้อผิดพลาดในการเพิ่มข้อมูลในตาราง user_profiles: " . $stmt_profiles->error);
        }

        // ถ้าทุกอย่างสำเร็จ, commit การทำงาน
        $conn->commit();
        echo "เพิ่มข้อมูลผู้ใช้สำเร็จ!";
        
    } catch (Exception $e) {
        $conn->rollback(); // ยกเลิกการทำงานถ้ามีปัญหา
        echo $e->getMessage();
    }

    $stmt_users->close();
    $stmt_profiles->close();
    $conn->close();
}
?>
