<?php
header('Content-Type: text/html; charset=utf-8');
include '../config/db_connection.php';

$sql = "SELECT prefix_id, prefix_name FROM prefixes";
$result = $conn->query($sql);

$options = "<option value=''>-- เลือกคำนำหน้า --</option>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='" . htmlspecialchars($row["prefix_id"]) . "'>" . htmlspecialchars($row["prefix_name"]) . "</option>";
    }
} else {
    $options .= "<option value=''>ไม่มีข้อมูลคำนำหน้า</option>";
}

echo $options;
$conn->close();
?>
