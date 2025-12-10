<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $quiz_id = $_POST['quiz_id'];
    $nama = $_POST['nama_pengguna'];
    $judul = $_POST['judul_quiz'];
    $skor = $_POST['skor'];
    $tgl = $_POST['tanggal_selesai'];

    $stmt = $conn->prepare("INSERT INTO tb_quiz_completed 
        (user_id, quiz_id, nama_pengguna, judul_quiz, skor, tanggal_selesai)
        VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("iissis", $user_id, $quiz_id, $nama, $judul, $skor, $tgl);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Gagal menambah data!";
    }
}
?>

<form method="POST">
    User ID: <input type="number" name="user_id"><br>
    Quiz ID: <input type="number" name="quiz_id"><br>
    Nama Pengguna: <input type="text" name="nama_pengguna"><br>
    Judul Quiz: <input type="text" name="judul_quiz"><br>
    Skor: <input type="number" name="skor"><br>
    Tanggal Selesai: <input type="date" name="tanggal_selesai"><br>
    <button type="submit">Simpan</button>
</form>
