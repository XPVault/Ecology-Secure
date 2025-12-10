<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['admin_login'])) {
  header("Location: login_admin.php");
  exit();
}

// Ambil semua user
$users = $conn->query("SELECT * FROM tb_user ORDER BY id ASC");

// Hitung jumlah data
$count_user = $conn->query("SELECT COUNT(*) AS total FROM tb_user")->fetch_assoc()['total'];
$count_quiz = $conn->query("SELECT COUNT(*) AS total FROM tb_quiz")->fetch_assoc()['total'];
$count_done = $conn->query("SELECT COUNT(*) AS total FROM tb_quiz_completed")->fetch_assoc()['total'];

// Ambil semua soal quiz
$quiz = $conn->query("SELECT * FROM tb_quiz");

// Ambil semua quiz yang sudah diselesaikan
$done = $conn->query("SELECT * FROM tb_quiz_completed ORDER BY id DESC");
// Hitung jumlah data

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
  <div class="widget-container">

<div class="widget-box">
    <h3>Total User</h3>
    <p><?= $count_user; ?></p>
</div>

<div class="widget-box">
    <h3>Total Soal Quiz</h3>
    <p><?= $count_quiz; ?></p>
</div>

<div class="widget-box">
    <h3>Quiz Diselesaikan</h3>
    <p><?= $count_done; ?></p>
</div>

</div>


    <h2>Data Soal & Kunci Jawaban Quiz</h2>

    <table border="1">
      <thead>
        <tr>
          <th>ID</th>
          <th>Soal</th>
          <th>Jawaban Benar</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
      <?php while ($row = $quiz->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id']; ?></td>
          <td><?= $row['pertanyaan']; ?></td>
          <td><?= $row['jawaban']; ?></td>
          <td>
            <a href="quiz_edit.php?id=<?= $row['id']; ?>"><button>Edit</button></a>
            <a href="quiz_hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">
              <button>Hapus</button>
            </a>
          </td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>

    <a href="quiz_tambah.php"><button class="tambah">Tambah Soal Quiz</button></a>



    <h2>Data Quiz yang Telah Diselesaikan</h2>

    <table border="1">
      <thead>
        <tr>
          <th>ID</th>
          <th>ID User</th>
          <th>ID Quiz</th>
          <th>Nama Pengguna</th>
          <th>Judul Quiz</th>
          <th>Skor</th>
          <th>Tanggal Selesai</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
      <?php while ($row = $done->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id']; ?></td>
          <td><?= $row['user_id']; ?></td>
          <td><?= $row['quiz_id']; ?></td>
          <td><?= $row['nama_pengguna']; ?></td>
          <td><?= $row['judul_quiz']; ?></td>
          <td><?= $row['skor']; ?></td>
          <td><?= $row['tanggal_selesai']; ?></td>
          <td>
            <a href="completed_edit.php?id=<?= $row['id']; ?>"><button>Edit</button></a>
            <a href="completed_hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus data ini?')">
              <button>Hapus</button>
            </a>
          </td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>

    <a href="completed_tambah.php"><button class="tambah">Tambah Data Quiz Selesai</button></a>


    <section class="dashboard">
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
      <a href="print_user.php" target="_blank">
        <button class="tambah">Cetak PDF</button>
      </a>
    </section>

  </section>
</main>


<footer>
  &copy; 2025 EcoSecure | By M. Arif Setya Utama
</footer>

</body>
</html>
