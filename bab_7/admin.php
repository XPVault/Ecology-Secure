<?php
session_start();
include "koneksi.php";

// Proteksi hanya untuk admin
if (!isset($_SESSION['admin_login'])) {
  header("Location: login_admin.php");
  exit();
}

// Ambil semua user
$users = $conn->query("SELECT * FROM tb_user ORDER BY id ASC");
?>



<!DOCTYPE html>
<html lang="id">
<head>
  <title>EcoSecure | Admin Quiz</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body>

  <header>
    <h1>Admin EcoSecure</h1>
    <nav>
      <a href="admin.php?logout=true">Logout</a>
    </nav>
  </header>

  <main>
    <section class="admin-container">
      <h2>Data Quiz yang Telah Diselesaikan</h2>

      <table border="1">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Pengguna</th>
            <th>Judul Quiz</th>
            <th>Skor</th>
            <th>Tanggal Selesai</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>M. Arif Setya Utama</td>
            <td>Keamanan Siber Dasar</td>
            <td>90</td>
            <td>05 Oktober 2025</td>
            <td>
              <button>Edit</button>
              <button>Hapus</button>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Rayyan</td>
            <td>Enkripsi Klasik</td>
            <td>80</td>
            <td>04 Oktober 2025</td>
            <td>
              <button>Edit</button>
              <button>Hapus</button>
            </td>
          </tr>
        </tbody>
      </table>

      <button class="tambah">Tambah Data Quiz</button>

      <main class="dashboard">
        <h2>Data Pengguna</h2>
        <table class="data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pengguna</th>
              <th>Email</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            while ($row = $users->fetch_assoc()): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['email']; ?></td>
                <td>Aktif</td>
                <td>
                  <a href="edit_user.php?id=<?= $row['id']; ?>"><button>Edit</button></a>
                  <a href="hapus_user.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">
                    <button>Hapus</button>
                  </a>
                </td>
              </tr>
            <?php endwhile; ?>
            </tbody>

        </table>
        <a href="tambah_user.php"><button class="tambah">Tambah Data Pengguna</button></a>
    </section>
  </main>

  <footer>
    &copy; 2025 EcoSecure | By M. Arif Setya Utama
  </footer>

</body>
</html>
