<?php
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login/index.html");
//     exit();
// }
// echo "ยินดีต้อนรับ " . $_SESSION['username'];
?>

<?php
include '../config/db_connection.php';

// ดึงสถานะล่าสุดจาก barrier_status
$sql_status = "SELECT status_id FROM barrier_status LIMIT 1";
$result_status = $conn->query($sql_status);
$status = ($result_status->num_rows > 0) ? $result_status->fetch_assoc()['status_id'] : 3; // ค่าเริ่มต้น = ปิด (3)

// ดึงข้อมูล Recent Activity
$sql_logs = "SELECT barrier_id, status_id, action_time FROM barrier_logs ORDER BY action_time DESC LIMIT 5";
$result_logs = $conn->query($sql_logs);
$logs = [];
while ($row = $result_logs->fetch_assoc()) {
    $logs[] = $row;
}

$conn->close();
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="dash.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <title>BARRi</title>
</head>
<body>
    <!-- SIDEBAR -->
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="../img/logohos.svg" alt="">
            </div>
            <span class="logo_name">BARRi</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="../Dashboard/dashboard.php"><i class="bi bi-house-door"></i></i><span class="link-name">Dashboard</span></a></li>
                <li><a href="../report/index.php"><i class="bi bi-graph-up"></i></i><span class="link-name">Analytics</span></a></li>
                <li><a href="#"><i class="bi bi-person-plus-fill"></i></i></i><span class="link-name">Admin</span></a></li>
                
            </ul>
            
            <ul class="logout-mode">
                <li><a href="#">
                    <i class="bi bi-box-arrow-left"></i>
                        </i><span class="link-name">Logout</span></a></li>
                <li class="mode">
                    <a href="#">
                        <i class="bi bi-moon-fill"></i>
                        <span class="link-name">Dark Mode</span>
                </a>
                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <!-- O X SIDEBAR -->
        <div class="top">
            <i class="material-icons sidebar-toggle">menu</i>
                <div class="search-box">
                    <i class="material-icons">search</i>
                        <input type="text" placeholder="Search here...">
                </div>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                <i class="bi bi-speedometer2"></i>
                    <span class="text">Dashboard</span>
                </div>
                <div class="boxes">
                    <div class="box box1">
                        <i class="material-icons">door_back</i>
                        <span class="text">สวิตช์</span>
                        <label class="switch">
                            <input class="cb" type="checkbox" <?= ($status == 1) ? 'checked' : '' ?> />
                            <span class="toggle">
                                <span class="left">ปิด</span>
                                <span class="right">เปิด</span>
                            </span>
                        </label>
                    </div>
                    <div class="box box2">
                        <i class="material-icons">switch_left</i>
                        <span class="text">สถานะ</span>
                        <span class="number"><?= ($status == 1) ? 'เปิด' : 'ปิด' ?></span>
                    </div>
                    <div class="box box3">
                        <i class="material-icons">show_chart</i>
                        <span class="text">Total</span>
                        <span class="number">10,120</span>
                    </div>
                </div>
            </div>
            <div class="activity">
                <div class="title">
                    <i class="bi bi-clock"></i>
                    <span class="text">Recent Activity</span>
                </div>
                <div class="activity-data">
                    <?php if (!empty($logs)): ?>
                        <ul>
                            <?php foreach ($logs as $log): ?>
                                <li>Barrier <?= $log['barrier_id'] ?> - <?= ($log['status_id'] == 1) ? 'เปิด' : 'ปิด' ?> (<?= $log['action_time'] ?>)</li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>ไม่มีข้อมูล</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <script src="dash.js"></script>
    <script src="barrilog/log.js"></script>
</body>
</html>