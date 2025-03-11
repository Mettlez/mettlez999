<?php
include '../config/db_connection.php'; // ไฟล์เชื่อมต่อฐานข้อมูล

$sql = "SELECT department_id, department_name FROM departments";
$result = $conn->query($sql);

$options = "<option value=''>-- เลือกแผนก --</option>"; // เริ่มต้นด้วย option เริ่มต้น

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row["department_id"] . "'>" . $row["department_name"] . "</option>";
    }
} else {
    $options .= "<option value=''>ไม่มีข้อมูลแผนก</option>"; // หากไม่มีข้อมูลแผนก
}

echo $options; // ส่งกลับ options ไปยังหน้า HTML

$conn->close(); // ปิดการเชื่อมต่อฐานข้อมูล
?>