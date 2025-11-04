// 1️⃣ Menampilkan tanggal otomatis
const tanggal = document.getElementById("tanggal");
const today = new Date();
tanggal.textContent = "Tanggal hari ini: " + today.toLocaleDateString("id-ID");

// 2️⃣ Mengubah teks judul saat di-klik
const judul = document.getElementById("judul");
judul.addEventListener("click", function() {
  judul.textContent = "EcoSecure 🌿 (Klik untuk kembali)";
});
judul.addEventListener("dblclick", function() {
  judul.textContent = "EcoSecure";
});

// 3️⃣ Mengubah tema dengan tombol
const tombolTema = document.getElementById("gantiTema");
tombolTema.addEventListener("click", function() {
  document.body.classList.toggle("dark-mode");
});

// 4️⃣ Membuat toast/snackbar sederhana
const toast = document.getElementById("toast");
document.getElementById("showToast").addEventListener("click", function() {
  toast.className = "show";
  setTimeout(() => { toast.className = toast.className.replace("show", ""); }, 3000);
});
