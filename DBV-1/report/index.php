<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- TAILWINDCSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="report.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <li><a href="./index.php"><i class="bi bi-graph-up"></i></i><span class="link-name">Analytics</span></a></li>
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
                    <i class="bi bi-graph-up"></i>
                        <span class="text">Report</span>
                </div>
                
                <div class="flex gap-4 w-full h-40">
                    <div class="flex flex-col items-center justify-center bg-sky-300 rounded-xl shadow-xl flex-grow">
                        <i class="bi bi-calendar-event-fill fs-1"></i>
                    </div>
                
                    <div class="flex flex-col items-center justify-center bg-red-300 rounded-xl shadow-xl flex-grow">
                        <i class="bi bi-calendar-event-fill fs-1"></i>
                    </div>
                
                    <div class="flex flex-col items-center justify-center bg-fuchsia-300 rounded-xl shadow-xl flex-grow">
                        <i class="bi bi-calendar-event-fill fs-1"></i>
                    </div>
                </div>
                          
            </div>
        </div>
    <script src="../Dashboard/dash.js"></script>
</body>
</html>