window.addEventListener("load", () => {
  alert("Selamat datang di EcoSecure!");

  const nama = prompt("Masukkan nama Anda:", "Admin");
  if (nama) {
    localStorage.setItem("namaPengguna", nama);
  }

  const welcome = document.querySelector(".awal h1");
  const namaUser = localStorage.getItem("namaPengguna") || "Pengunjung";
  welcome.innerText = `Selamat datang kembali di EcoSecure, ${namaUser}!`;
});

// EVENT 1: Hover pada section lingkungan → ubah warna latar
const lingkunganSection = document.querySelector(".lingkungan");
lingkunganSection.addEventListener("mouseenter", () => {
  lingkunganSection.style.backgroundColor = "#7CFC00";
});
lingkunganSection.addEventListener("mouseleave", () => {
  lingkunganSection.style.backgroundColor = "#34a737e9";
});

// EVENT 2: Klik di area keamanan → munculkan tips lewat confirm
const keamananSection = document.querySelector(".keamanan");
keamananSection.addEventListener("click", () => {
  const yakin = confirm("Ingin tahu tips keamanan tambahan?");
  if (yakin) {
    showToast("Gunakan password unik dan aktifkan autentikasi dua langkah!");
  }
});

// EVENT 3: Tekan tombol keyboard → munculkan pesan async
document.addEventListener("keydown", (e) => {
  if (e.key.toLowerCase() === "e") {
    showToast("Shortcut terdeteksi: Kamu menekan huruf E!");
  }
});

// ==== TOAST / SNACKBAR ====
function showToast(message) {
  const toast = document.createElement("div");
  toast.className = "toast";
  toast.textContent = message;
  document.body.appendChild(toast);

  setTimeout(() => toast.classList.add("show"), 100);
  setTimeout(() => toast.classList.remove("show"), 3000);
  setTimeout(() => toast.remove(), 3500);
}

// Tambahkan style toast secara dinamis agar tidak di HTML
const toastStyle = document.createElement("style");
toastStyle.textContent = `
.toast {
  visibility: hidden;
  min-width: 250px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 5px;
  padding: 12px;
  position: fixed;
  bottom: 30px;
  left: 50%;
  transform: translateX(-50%);
  transition: opacity 0.5s, visibility 0.5s;
  opacity: 0;
  z-index: 9999;
}
.toast.show {
  visibility: visible;
  opacity: 1;
}`;
document.head.appendChild(toastStyle);

// EVENT 4 (tambahan nilai): Klik tombol "Lihat selengkapnya"
const btn = document.querySelector(".btn");
btn.addEventListener("click", (event) => {
  event.preventDefault();
  showToast("Memuat halaman edukasi...");
  // Simulasi async pakai Promise dan setTimeout
  new Promise((resolve) => {
    setTimeout(() => resolve("Halaman edukasi siap dibuka!"), 2500);
  }).then((msg) => {
    showToast(msg);
    setTimeout(() => (window.location.href = "edukasi.html"), 1000);
  });
});

// BONUS NILAI: Fetch data sederhana dari JSON Placeholder
// hanya untuk menunjukkan contoh async fetch
fetch("https://jsonplaceholder.typicode.com/posts/1")
  .then((response) => response.json())
  .then((data) => {
    console.log("Data dari Fetch:", data.title);
  })
  .catch((error) => console.error("Terjadi kesalahan saat fetch:", error));

