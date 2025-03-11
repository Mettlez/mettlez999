<?php
session_start();
include '../config/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $barrier_id = $_POST['barrier_id'];  
    $user_id = $_SESSION['user_id'] ?? 1; 
    $status_id = $_POST['status_id']; // เปิด = 1, ปิด = 3
    $action_time = date('Y-m-d H:i:s'); 

    // บันทึก log การกดสวิตช์
    $sql_log = "INSERT INTO barrier_logs (barrier_id, user_id, status_id, action_time) VALUES (?, ?, ?, ?)";
    $stmt_log = $conn->prepare($sql_log);
    $stmt_log->bind_param("iiis", $barrier_id, $user_id, $status_id, $action_time);
    $log_success = $stmt_log->execute();
    $stmt_log->close();

    // อัปเดตสถานะล่าสุดของ barrier ในตาราง barrier_status
    $sql_update_status = "UPDATE barrier_status SET status_id = ? WHERE status_id IN (1, 3)";
    $stmt_status = $conn->prepare($sql_update_status);
    $stmt_status->bind_param("i", $status_id);
    $status_success = $stmt_status->execute();
    $stmt_status->close();

    $conn->close();

    if ($log_success && $status_success) {
        echo json_encode(["success" => true, "message" => "บันทึกและอัปเดตสถานะสำเร็จ"]);
    } else {
        echo json_encode(["success" => false, "message" => "เกิดข้อผิดพลาด"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
}
?>
