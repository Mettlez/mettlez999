<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BARRi Login</title>

  <!-- CSS -->
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <link rel="stylesheet" href="login.css">

</head>
<body>
  <div class="wrapper">
    <form action="login.php" method="POST">
        <div class="logo-image">
            <img src="../img/logohos.svg" alt="">
         </div>
      <h2>Login</h2>
      
      <div class="input-field">
        <input type="text" name="username" required>
        <label>ชื่อผู้ใช้ / Username</label>
      </div>

      <div class="input-field">
        <input type="password" name="password" required>
        <label>รหัสผ่าน / password</label>
        </button>
      </div>

      <!-- Remember me -->
      <div class="flex items-center justify-between text-sm">
        <label class="flex items-center space-x-2">
          <input type="checkbox" id="rememberMe" class="w-4 h-4 text-blue-500 focus:ring-0 focus:ring-offset-0">
          <span>Remember me</span>
        </label>
      </div>

      <button type="submit">Log In</button>

      <div class="register">
        <p>Don't have an account? <a href="../register/index.php">ลงทะเบียน</a></p>
      </div>
      
    </form>
  </div>
  <script src="login.js"></script>
</body>
</html>