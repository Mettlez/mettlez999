const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");
let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}
let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}
modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});
sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})
// Logout
document.addEventListener("DOMContentLoaded", function () {
    const logoutButton = document.querySelector(".logout-mode a");

    logoutButton.addEventListener("click", function (e) {
        e.preventDefault(); // ป้องกันการโหลดหน้าใหม่

        // ส่งคำขอไปยังเซิร์ฟเวอร์เพื่อลบ session
        fetch("../Dashboard/logout.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
        })
            .then((response) => {
                if (response.ok) {
                    // นำผู้ใช้ไปยังหน้า login
                    window.location.href = "../login/index.php";
                } else {
                    alert("เกิดข้อผิดพลาดในการออกจากระบบ");
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
});