<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AddUser</title>
  <!-- CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
    <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">เพิ่มข้อมูลผู้ใช้งาน</h2>
    
    <form action="insert_user.php" method="POST" class="space-y-4">
      <!-- ชื่อผู้ใช้ -->
      <div>
        <label for="username" class="block text-gray-600 font-medium">ชื่อผู้ใช้ / Username :</label>
        <input type="text" id="username" name="username" required class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- รหัสผ่าน -->
      <div class="mb-4 relative">
        <label for="password" class="block text-gray-700 font-medium">รหัสผ่าน / Password :</label>
        <input 
          type="password" 
          id="password" 
          name="password" 
          placeholder="กรอกรหัสผ่าน" 
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
        <!-- ปุ่มกดดูรหัสผ่าน -->
        <button type="button" onclick="togglePassword()" 
          class="absolute right-3 top-9 text-gray-500 hover:text-gray-700">
          <i class="bi bi-eye"></i>
        </button>
      </div>

      <!-- คำนำหน้า -->
      <div>
        <label for="prefix_id" class="block text-gray-600 font-medium">คำนำหน้า :</label>
        <select id="prefix_id" name="prefix_id" required class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500">
          <option value="">-- เลือกคำนำหน้า --</option>
        </select>
      </div>

      <!-- ชื่อ-นามสกุล -->
      <div>
        <label for="full_name" class="block text-gray-600 font-medium">ชื่อ-นามสกุล :</label>
        <input type="text" id="full_name" name="full_name" required class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- เบอร์โทร -->
      <div class="mb-4">
        <label for="phone" class="block text-gray-700 font-medium">เบอร์โทร :</label>
        <input 
          type="text" 
          id="phone" 
          name="phone" 
          maxlength="10" 
          placeholder="เช่น 0812345678" 
          pattern="\d*" 
          required 
          oninput="validatePhoneNumber(this)"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
        <small id="phoneError" class="text-red-500 text-sm"></small>
      </div>

      <!-- อีเมล -->
      <div>
        <label for="email" class="block text-gray-600 font-medium">อีเมล :</label>
        <input type="email" id="email" name="email" required class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- แผนก -->
      <div>
        <label for="department_id" class="block text-gray-600 font-medium">แผนก :</label>
        <select id="department_id" name="department_id" required class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500">
          <option value="">-- เลือกแผนก --</option>
        </select>
      </div>

      <!-- ปุ่มส่งข้อมูล -->
      <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md font-medium hover:bg-blue-600 transition">เพิ่มข้อมูล</button>
    </form>
  </div>

  <script>
    function validatePhoneNumber(input) {
      let phoneError = document.getElementById("phoneError");

      // ลบอักขระที่ไม่ใช่ตัวเลขออก และล็อคให้กรอกได้แค่ตัวเลข
      input.value = input.value.replace(/\D/g, "");

      // ตรวจสอบความยาวเบอร์โทร
      if (input.value.length > 0 && input.value.length < 10) {
          phoneError.textContent = "เบอร์โทรต้องมี 10 หลัก";
      } else {
          phoneError.textContent = "";
      }
    }

    function togglePassword() {
      let passwordInput = document.getElementById("password");
      // เปลี่ยน type ของ input ระหว่าง "password" และ "text"
      passwordInput.type = (passwordInput.type === "password") ? "text" : "password";
    }

    window.onload = function () {
      // ดึงข้อมูลคำนำหน้า
      fetch('get_prefix_options.php')
        .then(response => response.text())
        .then(data => {
          document.getElementById('prefix_id').innerHTML = data;
        })
        .catch(error => {
          console.error('Error fetching prefix options:', error);
          document.getElementById('prefix_id').innerHTML = "<option value=''>โหลดข้อมูลล้มเหลว</option>";
        });

      // ดึงข้อมูลแผนก
      fetch('get_department_options.php')
        .then(response => response.text())
        .then(data => {
          document.getElementById('department_id').innerHTML = data;
        })
        .catch(error => {
          console.error('Error fetching department options:', error);
          document.getElementById('department_id').innerHTML = "<option value=''>โหลดข้อมูลล้มเหลว</option>";
        });
    };
  </script>

</body>
</html>
