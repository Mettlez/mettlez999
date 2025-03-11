<?php
// ข้อมูลสำหรับเชื่อมต่อฐานข้อมูล
$host = 'localhost'; // โฮสต์ของฐานข้อมูล
$user = 'root';      // ชื่อผู้ใช้ฐานข้อมูล (ค่าเริ่มต้นของ XAMPP คือ root)
$password = '';      // รหัสผ่านฐานข้อมูล (ค่าเริ่มต้นของ XAMPP คือว่าง)
$database = 'barri';   // ชื่อฐานข้อมูล

// เชื่อมต่อฐานข้อมูล
$conn = new mysqli($host, $user, $password, $database);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// ตั้งค่า charset เป็น utf8 เพื่อรองรับภาษาไทย
$conn->set_charset("utf8");

// แสดงข้อความถ้าเชื่อมต่อสำเร็จ (สำหรับทดสอบ)
// echo "เชื่อมต่อฐานข้อมูลสำเร็จ!";
?>