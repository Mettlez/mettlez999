<?php
session_start(); // เริ่ม session
session_unset(); // ลบตัวแปร session ทั้งหมด
session_destroy(); // ทำลาย session

// ส่งคำตอบกลับให้ JavaScript
echo json_encode(["status" => "success"]);
?>