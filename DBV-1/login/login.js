document.addEventListener("DOMContentLoaded", function () {
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const rememberMeCheckbox = document.getElementById("rememberMe");

    // โหลดค่าที่บันทึกไว้
    if (localStorage.getItem("rememberMe") === "true") {
      emailInput.value = localStorage.getItem("email") || "";
      passwordInput.value = localStorage.getItem("password") || "";
      rememberMeCheckbox.checked = true;
    }

    // เมื่อฟอร์มถูกส่ง
    document.getElementById("loginForm").addEventListener("submit", function (event) {
      event.preventDefault(); // ป้องกันการรีเฟรชหน้า

      if (rememberMeCheckbox.checked) {
        localStorage.setItem("rememberMe", "true");
        localStorage.setItem("email", emailInput.value);
        localStorage.setItem("password", passwordInput.value);
      } else {
        localStorage.setItem("rememberMe", "false");
        localStorage.removeItem("email");
        localStorage.removeItem("password");
      }

      alert("Login Successful! 🎉");
      // ส่งข้อมูลไปยังเซิร์ฟเวอร์ได้ที่นี่
    });
  });